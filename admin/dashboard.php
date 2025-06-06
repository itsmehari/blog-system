<?php
require_once '../includes/db.php';
require_once '../includes/auth.php';
require_login();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin Dashboard - BSERI Blog</title>
</head>
<body>
<h1>Welcome to BSERI Blog Admin</h1>

<nav>
  <ul>
    <li><a href="post-create.php">➕ Create New Post</a></li>
    <li><a href="media-upload.php">🖼️ Media Upload</a></li>
    <li><a href="user-profile.php">👤 Profile</a></li>
    <li><a href="logout.php">🚪 Logout</a></li>
  </ul>
</nav>

<section>
  <h3>Dashboard Features (To Be Extended)</h3>
  <ul>
    <li>Total Posts</li>
    <li>Recent Drafts</li>
    <li>Tags/Categories Overview</li>
  </ul>
</section>
</body>
</html>
