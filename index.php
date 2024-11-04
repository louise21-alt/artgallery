<?php
require_once 'core/dbConfig.php';
require_once 'core/models.php';

$artworks = fetchArtworks($pdo); // Fetch all artworks with gallery names
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Art Gallery</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <header>
        <h1>Art Gallery</h1>
        <a href="addArtwork.php">Add New Artwork</a>
    </header>

    <main>
        <h2>Artworks</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Artist</th>
                    <th>Year Created</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($artworks as $row): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['ArtworkID']); ?></td>
                        <td><?php echo htmlspecialchars($row['Title']); ?></td>
                        <td><?php echo htmlspecialchars($row['Artist']); ?></td>
                        <td><?php echo htmlspecialchars($row['YearCreated']); ?></td>
                        <td>
                            <a href="editArtwork.php?id=<?php echo $row['ArtworkID']; ?>">Edit</a>
                            <form method="POST" action="handleForms.php" style="display:inline;">
                                <input type="hidden" name="artworkID" value="<?php echo $row['ArtworkID']; ?>">
                                <input type="submit" name="deleteArtworkBtn" value="Delete" onclick="return confirm('Are you sure?');">
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Art Gallery</p>
    </footer>
</body>

</html>