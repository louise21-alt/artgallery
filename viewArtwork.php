<?php
require_once 'core/models.php';

if (isset($_GET['id'])) {
    $artwork = getArtworkById($conn, $_GET['id']);
} else {
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Artwork</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Artwork Details</h1>
    </header>
    
    <main>
        <h2><?php echo htmlspecialchars($artwork['Title']); ?></h2>
        <p><strong>Artist:</strong> <?php echo htmlspecialchars($artwork['Artist']); ?></p>
        <p><strong>Year Created:</strong> <?php echo $artwork['YearCreated']; ?></p>
        <a href="editArtwork.php?id=<?php echo $artwork['ArtworkID']; ?>">Edit Artwork</a>
        
        <form method="POST" action="core/handleForms.php" style="display:inline;">
            <input type="hidden" name="artworkID" value="<?php echo $artwork['ArtworkID']; ?>">
            <input type="hidden" name="delete" value="1">
            <input type="submit" value="Delete Artwork" onclick="return confirm('Are you sure you want to delete this artwork?');">
        </form>
        
        <a href="index.php">Back to Gallery</a>
    </main>
</body>
</html>
