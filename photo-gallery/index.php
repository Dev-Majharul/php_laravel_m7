<?php
require_once 'includes/config.php';
require_once 'includes/header.php';


// to show error message ised getmessage 
try {
    $stmt = $pdo->query("SELECT * FROM images ORDER BY upload_date DESC");
    $images = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error fetching images: " . $e->getMessage());
}
?>

<div class="cyber-title glitch-effect">CYBER GALLERY</div>

<?php if (empty($images)): ?>
    <div class="alert text-center">
        <h4 class="mb-0">NO IMAGES FOUND</h4>
        <p class="mb-0">Be the first to <a href="upload.php" class="text-decoration-none" style="color: var(--neon-pink);">upload</a> to the cyber space!</p>
    </div>
<?php else: ?>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php foreach ($images as $image): ?>
            <div class="col">
                <div class="card h-100">
                    <div class="position-relative">
                        <img src="assets/images/<?php echo htmlspecialchars($image['filename']); ?>" 
                             class="card-img-top gallery-img" 
                             alt="<?php echo htmlspecialchars($image['title']); ?>">
                        <div class="position-absolute top-0 end-0 p-2">
                            <span class="badge" style="background-color: var(--neon-purple);">
                                <?php echo date('M d', strtotime($image['upload_date'])); ?>
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($image['title']); ?></h5>
                        <?php if (!empty($image['description'])): ?>
                            <p class="card-text"><?php echo htmlspecialchars($image['description']); ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">
                            <span style="color: var(--neon-blue);">UPLOADED:</span> 
                            <?php echo date('F j, Y', strtotime($image['upload_date'])); ?>
                        </small>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<?php require_once 'includes/footer.php'; ?> 