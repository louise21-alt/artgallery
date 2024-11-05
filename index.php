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
    <style>
        h1 {
            color: #3b2e2e;
            font-size: 2rem;
        }

        .header-actions a {
            color: #3b2e2e;
            font-size: 1.2rem;
        }
    </style>
</head>

<body>
    <header>
        <h1>Art Gallery</h1>
        <div class="header-actions">
            <a href="addArtwork.php">Add New Artwork</a>
        </div>
    </header>

    <main>
        <h2>Artworks</h2>
        <table>
            <thead>
                <tr>
                    <!-- <th>ID</th> -->
                    <th>Title</th>
                    <th>Artist</th>
                    <th>Year Created</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($artworks as $row): ?>
                    <tr>
                        <!-- <td><?php echo htmlspecialchars($row['ArtworkID']); ?></td> -->
                        <td><?php echo htmlspecialchars($row['Title']); ?></td>
                        <td><?php echo htmlspecialchars($row['Artist']); ?></td>
                        <td><?php echo htmlspecialchars($row['YearCreated']); ?></td>
                        <td>
                            <a href="viewGallery.php?ArtworkID=<?php echo $row['ArtworkID']; ?>">View</a>
                            <a href="editArtwork.php?ArtworkID=<?php echo $row['ArtworkID']; ?>">Edit</a>
                            <a href="deleteArtwork.php?ArtworkID=<?php echo $row['ArtworkID']; ?>">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>

</body>

</html>