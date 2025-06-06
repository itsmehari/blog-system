<?php
require_once 'includes/db.php';

$slug = $_GET['slug'] ?? '';
if (!$slug) die('Post not specified.');

$stmt = $conn->prepare("SELECT p.*, a.name AS author_name, a.bio, a.profile_img, c.name AS category_name, c.slug AS category_slug
                        FROM blog_posts p
                        LEFT JOIN blog_authors a ON p.author_id = a.id
                        LEFT JOIN blog_categories c ON p.category_id = c.id
                        WHERE p.slug = ? AND p.status = 'published'
                        LIMIT 1");
$stmt->bind_param("s", $slug);
$stmt->execute();
$post = $stmt->get_result()->fetch_assoc();
if (!$post) die('Post not found.');

$readTime = ceil(str_word_count(strip_tags($post['content'])) / 200);
$pageTitle = $post['title'] . " - BSERI Blog";
$pageHeading = "Article";
$og = [
  'title' => $post['title'],
  'description' => substr(strip_tags($post['content']), 0, 150),
  'image' => 'https://' . $_SERVER['HTTP_HOST'] . '/uploads/' . basename($post['featured_img']),
  'url' => 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']
];

include 'includes/head.php';
include 'includes/header.php';
?>

<style>
  .breadcrumb {
    margin: 20px 0;
    font-size: 14px;
    color: #555;
  }

  .breadcrumb a {
    text-decoration: none;
    color: #0c2d6b;
  }

  .post-title {
    font-size: 32px;
    margin: 0 0 10px;
    color: #0c2d6b;
  }

  .post-meta {
    font-size: 14px;
    margin-bottom: 20px;
    color: #777;
  }

  .post-cover {
    max-width: 100%;
    margin: 30px 0;
    border-radius: 12px;
    box-shadow: 0 6px 20px rgba(0,0,0,0.08);
  }

  .post-content {
    font-size: 17px;
    line-height: 1.7;
    color: #333;
    padding-bottom: 30px;
  }

  .post-content img {
    max-width: 100%;
    margin: 20px 0;
    border-radius: 8px;
  }

  .tags {
    margin-top: 20px;
  }

  .tags a {
    display: inline-block;
    margin: 4px;
    padding: 6px 12px;
    background: #e8eef7;
    color: #0c2d6b;
    border-radius: 20px;
    font-size: 13px;
    text-decoration: none;
  }

  .share {
    margin-top: 20px;
    font-size: 14px;
  }

  .share button, .share a {
    margin-right: 10px;
    padding: 6px 12px;
    border: none;
    background: #0c2d6b;
    color: #fff;
    border-radius: 5px;
    text-decoration: none;
    cursor: pointer;
  }

  .author-box {
    display: flex;
    align-items: center;
    margin-top: 40px;
    padding: 20px;
    background: #f5f5f5;
    border-radius: 12px;
  }

  .author-box img {
    height: 70px;
    width: 70px;
    border-radius: 50%;
    object-fit: cover;
    margin-right: 20px;
    border: 2px solid #0c2d6b;
  }

  .related-posts {
    margin-top: 40px;
  }

  .related-posts h3 {
    margin-bottom: 20px;
    font-size: 22px;
  }

  .blog-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 24px;
  }

  .blog-card {
    background: #fff;
    border: 1px solid #eee;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    transition: transform 0.2s ease;
  }

  .blog-card:hover {
    transform: translateY(-4px);
  }

  .blog-card img {
    width: 100%;
    height: 160px;
    object-fit: cover;
  }

  .blog-card .blog-content {
    padding: 16px;
  }

  .blog-card h4 {
    font-size: 16px;
    margin: 0 0 8px;
  }

  .read-more-btn {
    background: #0c2d6b;
    color: #fff;
    padding: 6px 12px;
    border-radius: 6px;
    text-decoration: none;
    font-size: 14px;
    display: inline-block;
    margin-top: 10px;
  }
</style>

<main class="container">
  <nav class="breadcrumb">
    <a href="index.php">Home</a> ›
    <a href="category.php?slug=<?= $post['category_slug'] ?>"><?= $post['category_name'] ?></a> ›
    <span><?= htmlspecialchars($post['title']) ?></span>
  </nav>

  <h1 class="post-title"><?= htmlspecialchars($post['title']) ?></h1>
  <div class="post-meta">
    By <?= htmlspecialchars($post['author_name']) ?> |
    <?= date('M d, Y', strtotime($post['created_at'])) ?> |
    <?= $readTime ?> min read |
    Category: <a href="category.php?slug=<?= $post['category_slug'] ?>"><?= $post['category_name'] ?></a>
  </div>

  <?php if ($post['featured_img']): ?>
    <img src="uploads/<?= basename($post['featured_img']) ?>" class="post-cover" alt="<?= htmlspecialchars($post['title']) ?>">
  <?php endif; ?>

  <article class="post-content"><?= $post['content'] ?></article>

  <!-- Tags -->
  <?php
    $tags = $conn->query("
      SELECT t.name, t.slug
      FROM blog_tags t
      JOIN blog_post_tags pt ON pt.tag_id = t.id
      WHERE pt.post_id = {$post['id']}
    ")->fetch_all(MYSQLI_ASSOC);
    if ($tags): ?>
      <div class="tags">
        <strong>Tags:</strong>
        <?php foreach ($tags as $tag): ?>
          <a href="tag.php?slug=<?= $tag['slug'] ?>">#<?= htmlspecialchars($tag['name']) ?></a>
        <?php endforeach; ?>
      </div>
  <?php endif; ?>

  <!-- Share Buttons -->
  <div class="share">
    <strong>Share:</strong>
    <button onclick="navigator.clipboard.writeText(window.location.href)">Copy Link</button>
    <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?= urlencode($og['url']) ?>" target="_blank">LinkedIn</a>
    <a href="https://twitter.com/intent/tweet?url=<?= urlencode($og['url']) ?>" target="_blank">Twitter</a>
  </div>

  <!-- Author Box -->
  <div class="author-box">
    <img src="<?= $post['profile_img'] ?: 'assets/images/default-user.png' ?>" alt="Author" onerror="this.src='assets/images/default-user.png';">
    <div>
      <strong><?= htmlspecialchars($post['author_name']) ?></strong>
      <p><?= htmlspecialchars($post['bio']) ?></p>
    </div>
  </div>

  <!-- Related Posts -->
  <?php
    $related = $conn->query("
      SELECT title, slug, featured_img
      FROM blog_posts
      WHERE category_id = {$post['category_id']} AND id != {$post['id']} AND status = 'published'
      ORDER BY created_at DESC LIMIT 3
    ")->fetch_all(MYSQLI_ASSOC);

    if ($related): ?>
      <section class="related-posts">
        <h3>Related Posts</h3>
        <div class="blog-grid">
          <?php foreach ($related as $r): ?>
            <div class="blog-card">
              <?php if (!empty($r['featured_img'])): ?>
                <img src="uploads/<?= basename($r['featured_img']) ?>" alt="<?= $r['title'] ?>">
              <?php endif; ?>
              <div class="blog-content">
                <h4><?= htmlspecialchars($r['title']) ?></h4>
                <a href="post.php?slug=<?= $r['slug'] ?>" class="read-more-btn">Read More →</a>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </section>
  <?php endif; ?>
</main>

<?php include 'includes/footer.php'; ?>
