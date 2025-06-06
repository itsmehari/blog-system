<?php
require_once 'includes/db.php';

$slug = $_GET['slug'] ?? '';
if (!$slug) die("Tag not specified.");

$stmt = $conn->prepare("SELECT id, name FROM blog_tags WHERE slug = ?");
$stmt->bind_param("s", $slug);
$stmt->execute();
$tag = $stmt->get_result()->fetch_assoc();

if (!$tag) die("Tag not found.");

$posts = $conn->query("
  SELECT p.*, a.name AS author
  FROM blog_posts p
  JOIN blog_post_tags pt ON pt.post_id = p.id
  JOIN blog_tags t ON pt.tag_id = t.id
  LEFT JOIN blog_authors a ON p.author_id = a.id
  WHERE t.id = {$tag['id']} AND p.status = 'published'
  ORDER BY p.created_at DESC
")->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
<head><title>#<?= htmlspecialchars($tag['name']) ?> - BSERI Blog</title></head>
<body>
<h1>Posts tagged: #<?= htmlspecialchars($tag['name']) ?></h1>
<?php foreach ($posts as $post): ?>
  <div>
    <h3><a href="post.php?slug=<?= $post['slug'] ?>"><?= htmlspecialchars($post['title']) ?></a></h3>
    <p>By <?= htmlspecialchars($post['author']) ?> on <?= date('M d, Y', strtotime($post['created_at'])) ?></p>
  </div>
<?php endforeach; ?>
</body>
</html>
    