<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= $pageTitle ?? 'BSERI Blog' ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/style.css">
  <script src="assets/js/blog.js" defer></script>

  <?php if (!empty($og)): ?>
    <meta property="og:title" content="<?= $og['title'] ?>" />
    <meta property="og:description" content="<?= $og['description'] ?>" />
    <meta property="og:image" content="<?= $og['image'] ?>" />
    <meta property="og:url" content="<?= $og['url'] ?>" />
    <meta name="twitter:card" content="summary_large_image" />
  <?php endif; ?>
</head>
<body>
