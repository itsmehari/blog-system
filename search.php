<?php
require_once 'includes/db.php';

$q = trim($_GET['q'] ?? '');
if (!$q) die('No search query provided.');

$stmt = $conn->prepare("
  SELECT p.*, a.name AS author, c.name AS category
  FROM blog_posts p
  LEFT JOIN blog_authors a ON p.author_id = a.id
  LEFT JOIN blog_categories c ON c.id = p.category_id
  WHERE p.status = 'published' AND (p.title LIKE ? OR p.content LIKE ?)
  ORDER BY created_at DESC
");
$searchTerm = '%' . $q . '%';
$stmt->bind_param("ss", $searchTerm, $searchTerm);
$stmt->execute();
$posts = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
<head><title>Search Results - BSERI Blog</title></head>
<body>
<h1>Search Results for “<?= htmlspecialchars($q) ?>”</h1>
<?php if (count($posts) === 0): ?>
  <p>No results found.</p>
<?php else: ?>
  <ul>
    <?php foreach ($posts as $p): ?>
      <li><a href="post.php?slug=<?= $p['slug'] ?>"><?= htmlspecialchars($p['title']) ?></a></li>
    <?php endforeach; ?>
  </ul>
<?php endif; ?>
</body>
</html>
