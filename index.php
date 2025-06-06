<?php
require_once 'includes/db.php';

$pageTitle = "BSERI Blog";
$pageHeading = "Latest Posts";
$og = null;
include 'includes/head.php';
include 'includes/header.php';

$perPage = 8;
$page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
$offset = ($page - 1) * $perPage;

$sql = "SELECT p.*, a.name AS author FROM blog_posts p
        LEFT JOIN blog_authors a ON p.author_id = a.id
        WHERE p.status = 'published'
        ORDER BY p.created_at DESC
        LIMIT $offset, $perPage";
$posts = $conn->query($sql);
?>

<main class="container">
  <?php if ($posts && $posts->num_rows > 0): ?>
    <div class="blog-grid four-col">
      <?php while ($post = $posts->fetch_assoc()): ?>
        <div class="blog-card">
          <?php if (!empty($post['featured_img'])): ?>
            <img src="uploads/<?= basename($post['featured_img']) ?>" class="blog-thumbnail" alt="<?= $post['title'] ?>">
          <?php endif; ?>
          <div class="blog-content">
            <h2><?= htmlspecialchars($post['title']) ?></h2>
            <p class="blog-excerpt"><?= substr(strip_tags($post['content']), 0, 100) ?>...</p>
            <a href="post.php?slug=<?= $post['slug'] ?>" class="read-more-btn">Read Full Article →</a>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
  <?php else: ?>
    <p>No blog posts found.</p>
  <?php endif; ?>
</main>

<?php include 'includes/footer.php'; ?>
