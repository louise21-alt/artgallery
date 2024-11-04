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
    <title>Edit Artwork</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Edit Artwork</h1>
    </header>
    
    <main>
        <form method="POST" action="core/handleForms.php">
            <input type="hidden" name="artworkID" value="<?php echo $artwork['ArtworkID']; ?>">
            <input type="hidden" name="edit" value="1">
            <label for="title">Title:</label>
            <input type="text" name="title" value="<?php echo htmlspecialchars($artwork['Title']); ?>" required>
            <label for="artist">Artist:</label>
            <input type="text" name="artist" value="<?php echo htmlspecialchars($artwork['Artist']); ?>" required>
            <label for="yearCreated">Year Created:</label>
            <input type="number" name="yearCreated" value="<?php echo $artwork['YearCreated']; ?>" required>
            <input type="submit" value="Update Artwork">
        </form>
        <a href="index.php">Back to Gallery</a>
    </main>
</body>
</html>
