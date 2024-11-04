<?php

require_once 'dbConfig.php';
require_once 'models.php';

if (isset($_POST['submitArtworkButton'])) {
    // Ensure the names match the form fields
    $query = addArtwork($pdo, $_POST['title'], $_POST['artist'], $_POST['yearCreated']);

    if ($query) {
        echo "Artwork added successfully!<br><br>";
        echo "<a href='../index.php'>Return Home</a>";
    } else {
        echo "Failed to add artwork!";
    }
}


if (isset($_POST['editArtworkBtn'])) {
    $artworkID = $_POST['ArtworkID'];
    $title = $_POST['title'];
    $artist = $_POST['artist'];
    $yearCreated = $_POST['yearCreated'];

    $query = updateArtwork($pdo, $artworkID, $title, $artist, $yearCreated);

    if ($query) {
        echo "Artwork updated successfully!<br><br>";
        echo "<a href='../index.php'>Return Home</a>";
    } else {
        echo "Failed to update artwork!";
    }
}

if (isset($_POST['deleteArtworkBtn'])) {
    $artworkID = $_POST['ArtworkID'];

    $query = deleteArtwork($pdo, $artworkID);

    if ($query) {
        echo "Artwork deleted successfully!<br><br>";
        echo "<a href='../index.php'>Return Home</a>";
    } else {
        echo "Failed to delete artwork!";
    }
}
?>