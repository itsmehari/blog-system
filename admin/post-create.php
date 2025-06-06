<?php
require_once '../includes/db.php';
require_once '../includes/auth.php';
require_login();

$success = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $slug = strtolower(trim(preg_replace('/[^a-z0-9]+/', '-', $title)));
    $category_id = intval($_POST['category']);
    $content = $_POST['content'];
    $status = $_POST['status'];
    $tags = explode(',', $_POST['tags']);
    $author_id = 1; // Assuming single-admin usage
    $created_at = date('Y-m-d H:i:s');

    $imagePath = '';
    if ($_FILES['featured_img']['name']) {
        $targetDir = '../uploads/';
        $filename = time() . '_' . basename($_FILES['featured_img']['name']);
        $targetFile = $targetDir . $filename;

        if (move_uploaded_file($_FILES['featured_img']['tmp_name'], $targetFile)) {
            $imagePath = 'uploads/' . $filename;
        } else {
            $error = 'Image upload failed.';
        }
    }

    if (!$error) {
        $stmt = $conn->prepare("INSERT INTO blog_posts (title, slug, category_id, content, status, author_id, created_at, featured_img) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('ssisssis', $title, $slug, $category_id, $content, $status, $author_id, $created_at, $imagePath);
        $stmt->execute();
        $post_id = $stmt->insert_id;

        // Insert tags
        foreach ($tags as $tag) {
            $tag = trim($tag);
            if (!$tag) continue;

            $slug_tag = strtolower(preg_replace('/[^a-z0-9]+/', '-', $tag));
            $conn->query("INSERT IGNORE INTO blog_tags (name, slug) VALUES ('$tag', '$slug_tag')");

            $tag_id = $conn->insert_id ?: $conn->query("SELECT id FROM blog_tags WHERE slug = '$slug_tag'")->fetch_assoc()['id'];
            $conn->query("INSERT INTO blog_post_tags (post_id, tag_id) VALUES ($post_id, $tag_id)");
        }

        $success = 'Post created successfully!';
    }
}

// Fetch categories
$catRes = $conn->query("SELECT id, name FROM blog_categories ORDER BY name");
$categories = $catRes->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Post - BSERI Blog</title>
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
</head>
<body>
<h2>Create New Blog Post</h2>
<?php if ($success): ?><p style="color:green;"><?php echo $success; ?></p><?php endif; ?>
<?php if ($error): ?><p style="color:red;"><?php echo $error; ?></p><?php endif; ?>
<form method="POST" enctype="multipart/form-data">
    <input type="text" name="title" placeholder="Post Title" required><br><br>

    <select name="category" required>
        <option value="">-- Select Category --</option>
        <?php foreach ($categories as $cat): ?>
            <option value="<?= $cat['id'] ?>"><?= htmlspecialchars($cat['name']) ?></option>
        <?php endforeach; ?>
    </select><br><br>

    <textarea name="content" id="editor"></textarea>
    <script>CKEDITOR.replace('editor');</script><br><br>

    <input type="text" name="tags" placeholder="Tags (comma separated)"><br><br>

    <label>Status:</label>
    <select name="status">
        <option value="draft">Draft</option>
        <option value="published">Published</option>
    </select><br><br>

    <label>Featured Image:</label>
    <input type="file" name="featured_img"><br><br>

    <button type="submit">Publish Post</button>
</form>
</body>
</html>
