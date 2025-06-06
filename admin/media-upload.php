<?php
require_once '../includes/db.php';
require_once '../includes/auth.php';
require_login();

$uploadSuccess = '';
$uploadError = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['media_file'])) {
    $allowedTypes = ['image/jpeg', 'image/png', 'image/webp', 'image/svg+xml'];
    $fileType = $_FILES['media_file']['type'];

    if (in_array($fileType, $allowedTypes)) {
        $targetDir = '../uploads/';
        $filename = time() . '_' . basename($_FILES['media_file']['name']);
        $targetPath = $targetDir . $filename;

        if (move_uploaded_file($_FILES['media_file']['tmp_name'], $targetPath)) {
            $uploadSuccess = "Uploaded successfully!";
        } else {
            $uploadError = "File upload failed. Try again.";
        }
    } else {
        $uploadError = "Invalid file type. Allowed: JPG, PNG, WEBP, SVG.";
    }
}

// Scan media directory
$mediaFiles = array_filter(scandir('../uploads'), function($f) {
    return !in_array($f, ['.', '..']) && preg_match('/\\.(jpe?g|png|webp|svg)$/i', $f);
});
?>

<!DOCTYPE html>
<html>
<head>
    <title>Media Upload - BSERI Blog</title>
    <style>
        .gallery img { max-width: 150px; height: auto; margin: 5px; border: 1px solid #ccc; padding: 4px; }
        .gallery { display: flex; flex-wrap: wrap; }
    </style>
</head>
<body>
<h2>Upload Media</h2>

<?php if ($uploadSuccess): ?><p style="color:green;"><?php echo $uploadSuccess; ?></p><?php endif; ?>
<?php if ($uploadError): ?><p style="color:red;"><?php echo $uploadError; ?></p><?php endif; ?>

<form method="POST" enctype="multipart/form-data">
    <input type="file" name="media_file" required>
    <button type="submit">Upload</button>
</form>

<hr>
<h3>Media Library</h3>
<div class="gallery">
    <?php foreach ($mediaFiles as $file): ?>
        <div>
            <img src="../uploads/<?php echo $file ?>" alt="<?php echo $file ?>">
            <p style="font-size:12px;">uploads/<?php echo $file ?></p>
        </div>
    <?php endforeach; ?>
</div>
</body>
</html>
