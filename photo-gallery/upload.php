<?php
require_once 'includes/config.php';
require_once 'includes/header.php';

$message = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $description = $_POST['description'] ?? '';
    $file = $_FILES['image'] ?? null;

    if (empty($title) || empty($file)) {
        $error = 'Title and image are required.';
    } else {
        // Validate file
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
        $max_size = 5000000; // 5MB

        if (!in_array($file['type'], $allowed_types)) {
            $error = 'Invalid file type. Only JPG, PNG, and GIF are allowed.';
        } elseif ($file['size'] > $max_size) {
            $error = 'File size must be less than 5MB.';
        } else {
            // Generate unique filename
            $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
            $filename = uniqid() . '.' . $extension;
            $upload_path = 'assets/images/' . $filename;

            if (move_uploaded_file($file['tmp_name'], $upload_path)) {
                try {
                    $stmt = $pdo->prepare("INSERT INTO images (title, description, filename) VALUES (?, ?, ?)");
                    $stmt->execute([$title, $description, $filename]);
                    $message = 'Image uploaded successfully!';
                } catch (PDOException $e) {
                    $error = 'Database error: ' . $e->getMessage();
                    // Delete the uploaded file if database insert fails
                    unlink($upload_path);
                }
            } else {
                $error = 'Failed to upload file.';
            }
        }
    }
}
?>

<div class="cyber-title">UPLOAD TO CYBERSPACE</div>

<div class="row justify-content-center">
    <div class="col-md-6">
        <?php if ($message): ?>
            <div class="alert text-center" style="border-color: var(--neon-blue);">
                <h4 class="mb-0" style="color: var(--neon-blue);">SUCCESS</h4>
                <p class="mb-0"><?php echo $message; ?></p>
            </div>
        <?php endif; ?>

        <?php if ($error): ?>
            <div class="alert text-center" style="border-color: var(--neon-pink);">
                <h4 class="mb-0" style="color: var(--neon-pink);">ERROR</h4>
                <p class="mb-0"><?php echo $error; ?></p>
            </div>
        <?php endif; ?>

        <div class="card">
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="mb-4">
                        <label for="title" class="form-label" style="color: var(--neon-blue);">TITLE</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>

                    <div class="mb-4">
                        <label for="description" class="form-label" style="color: var(--neon-blue);">DESCRIPTION</label>
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                    </div>

                    <div class="mb-4">
                        <label for="image" class="form-label" style="color: var(--neon-blue);">SELECT IMAGE</label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                        <div class="form-text" style="color: var(--neon-purple);">
                            MAXIMUM FILE SIZE: 5MB | ALLOWED FORMATS: JPG, PNG, GIF
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-lg">
                            UPLOAD TO CYBERSPACE
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?> 