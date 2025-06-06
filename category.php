<?php
require_once 'includes/db.php';

$slug = $_GET['slug'] ?? '';
if (!$slug) die("Category not specified.");

$stmt = $conn->prepare("SELECT id, name FROM blog_categories WHERE slug = ?");
$stmt->bind_param("s", $slug);
$stmt->execute();
$category = $stmt->get_result()->fetch_assoc();

if (!$category) die("Category not found.");

$pageTitle = "Category: " . $category['name'] . " - BSERI Blog";
$pageHeading = "Category: " . $category['name'];
$og = [
  'title' => $pageTitle,
  'description' => 'Read articles under the ' . $category['name'] . ' category.',
  'image' => '',
  'url' => 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']
];

include 'includes/head.php';
include 'includes/header.php';

$posts = $conn->query("SELECT p.*, a.name AS author FROM blog_posts p LEFT JOIN blog_authors a ON p.author_id = a.id WHERE p.category_id = {$category['id']} AND p.status = 'published' ORDER BY p.created_at DESC");
?>

<main class="container">
  <?php if ($posts->num_rows > 0): ?>
    <div class="blog-grid four-col">
      <?php foreach ($posts as $post): ?>
        <div class="blog-card">
          <?php if (!empty($post['featured_img'])): ?>
            <img src="uploads/<?= basename($post['featured_img']) ?>" class="blog-thumbnail" alt="<?= $post['title'] ?>">
          <?php endif; ?>
          <div class="blog-content">
            <h2><?= htmlspecialchars($post['title']) ?></h2>
            <p class="blog-excerpt"><?= substr(strip_tags($post['content']), 0, 100) ?>...</p>
            <a href="post.php?slug=<?= $post['slug'] ?>" class="read-more-btn">Read More →</a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  <?php else: ?>
    <p>No posts in this category yet.</p>
  <?php endif; ?>
</main>

<?php include 'includes/footer.php'; ?>
