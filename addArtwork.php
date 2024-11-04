<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Artwork</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <header>
        <h1>Add New Artwork</h1>
    </header>

    <main>
        <form method="POST" action="core/handleForms.php">
            <input type="hidden" name="ArtworkID" id="ArtworkID">
            <label for="title">Title:</label>
            <input type="text" name="title" required>
            <label for="artist">Artist:</label>
            <input type="text" name="artist" required>
            <label for="yearCreated">Year Created:</label>
            <input type="number" name="yearCreated" required>
            <input type="submit" name="submitArtworkButton" value="Add Artwork">
        </form>
        <a href="index.php">Back to Gallery</a>
    </main>
</body>

</html>