<?php
require_once '../includes/db.php';
require_once '../includes/auth.php';
require_login();

$post_id = intval($_GET['id'] ?? 0);
if ($post_id === 0) {
    die("Invalid post ID.");
}

$error = '';
$success = '';

// Fetch existing post data
$stmt = $conn->prepare("SELECT * FROM blog_posts WHERE id = ?");
$stmt->bind_param('i', $post_id);
$stmt->execute();
$post = $stmt->get_result()->fetch_assoc();

if (!$post) die("Post not found.");

// Fetch tags
$tagRes = $conn->query("SELECT t.name FROM blog_tags t INNER JOIN blog_post_tags pt ON pt.tag_id = t.id WHERE pt.post_id = $post_id");
$tags = array_column($tagRes->fetch_all(MYSQLI_ASSOC), 'name');

// Handle update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $slug = strtolower(trim(preg_replace('/[^a-z0-9]+/', '-', $title)));
    $category_id = intval($_POST['category']);
    $content = $_POST['content'];
    $status = $_POST['status'];
    $updated_at = date('Y-m-d H:i:s');
    $tags_new = explode(',', $_POST['tags']);

    $imagePath = $post['featured_img'];
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
        $stmt = $conn->prepare("UPDATE blog_posts SET title=?, slug=?, category_id=?, content=?, status=?, updated_at=?, featured_img=? WHERE id=?");
        $stmt->bind_param('ssissssi', $title, $slug, $category_id, $content, $status, $updated_at, $imagePath, $post_id);
        $stmt->execute();

        $conn->query("DELETE FROM blog_post_tags WHERE post_id = $post_id");
        foreach ($tags_new as $tag) {
            $tag = trim($tag);
            if (!$tag) continue;
            $slug_tag = strtolower(preg_replace('/[^a-z0-9]+/', '-', $tag));
            $conn->query("INSERT IGNORE INTO blog_tags (name, slug) VALUES ('$tag', '$slug_tag')");
            $tag_id = $conn->insert_id ?: $conn->query("SELECT id FROM blog_tags WHERE slug = '$slug_tag'")->fetch_assoc()['id'];
            $conn->query("INSERT INTO blog_post_tags (post_id, tag_id) VALUES ($post_id, $tag_id)");
        }

        $success = 'Post updated successfully.';
        $post = array_merge($post, $_POST);
        $post['featured_img'] = $imagePath;
    }
}

// Fetch categories
$catRes = $conn->query("SELECT id, name FROM blog_categories ORDER BY name");
$categories = $catRes->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Post - BSERI Blog</title>
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
</head>
<body>
<h2>Edit Blog Post</h2>
<?php if ($success): ?><p style="color:green;"><?php echo $success; ?></p><?php endif; ?>
<?php if ($error): ?><p style="color:red;"><?php echo $error; ?></p><?php endif; ?>
<form method="POST" enctype="multipart/form-data">
    <input type="text" name="title" value="<?= htmlspecialchars($post['title']) ?>" required><br><br>

    <select name="category" required>
        <option value="">-- Select Category --</option>
        <?php foreach ($categories as $cat): ?>
            <option value="<?= $cat['id'] ?>" <?= $cat['id'] == $post['category_id'] ? 'selected' : '' ?>>
                <?= htmlspecialchars($cat['name']) ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>

    <textarea name="content" id="editor"><?= htmlspecialchars($post['content']) ?></textarea>
    <script>CKEDITOR.replace('editor');</script><br><br>

    <input type="text" name="tags" value="<?= htmlspecialchars(implode(', ', $tags)) ?>"><br><br>

    <label>Status:</label>
    <select name="status">
        <option value="draft" <?= $post['status'] == 'draft' ? 'selected' : '' ?>>Draft</option>
        <option value="published" <?= $post['status'] == 'published' ? 'selected' : '' ?>>Published</option>
    </select><br><br>

    <label>Replace Featured Image:</label><br>
    <?php if ($post['featured_img']): ?>
        <img src="../<?= $post['featured_img'] ?>" style="max-width:150px;"><br>
    <?php endif; ?>
    <input type="file" name="featured_img"><br><br>

    <button type="submit">Update Post</button>
</form>
</body>
</html>
