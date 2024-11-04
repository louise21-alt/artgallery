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
    $query = updateArtwork($pdo, $_GET['artwork_id'], $_POST['title'], $_POST['artist'], $_POST['YearCreated'], $_POST['GalleryID']);
    if ($query) {
        echo "Artwork updated successfully!<br><br>";
        echo "<a href='../index.php'>Return Home</a>";
    } else {
        echo "Failed to update artwork!";
    }
}

if (isset($_POST["deleteArtworkBtn"])) {
    $query = deleteArtwork($pdo, $_GET['artwork_id']);
    if ($query) {
        echo "Artwork deleted successfully!<br><br>";
        echo "<a href='../index.php'>Return Home</a>";
    } else {
        echo "Failed to delete artwork!";
    }
}
?>