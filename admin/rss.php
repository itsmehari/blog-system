<?php
require_once 'includes/db.php';

header("Content-Type: application/rss+xml; charset=UTF-8");

$siteTitle = "BSERI Blog";
$siteLink = "https://www.bseri.net/blog/";
$siteDescription = "Latest insights from BSERI on ISO, audits, and compliance.";
$items = $conn->query("
  SELECT title, slug, content, created_at
  FROM blog_posts
  WHERE status = 'published'
  ORDER BY created_at DESC
  LIMIT 10
")->fetch_all(MYSQLI_ASSOC);

echo "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>";
?>

<rss version="2.0">
<channel>
  <title><?= htmlspecialchars($siteTitle) ?></title>
  <link><?= htmlspecialchars($siteLink) ?></link>
  <description><?= htmlspecialchars($siteDescription) ?></description>
  <language>en-us</language>
  <lastBuildDate><?= date(DATE_RSS) ?></lastBuildDate>

  <?php foreach ($items as $item): ?>
    <item>
      <title><?= htmlspecialchars($item['title']) ?></title>
      <link><?= $siteLink . 'post.php?slug=' . $item['slug'] ?></link>
      <description><![CDATA[<?= substr(strip_tags($item['content']), 0, 300) ?>...]]></description>
      <pubDate><?= date(DATE_RSS, strtotime($item['created_at'])) ?></pubDate>
      <guid><?= $siteLink . 'post.php?slug=' . $item['slug'] ?></guid>
    </item>
  <?php endforeach; ?>
</channel>
</rss>
