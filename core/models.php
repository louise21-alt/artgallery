<?php
require_once 'dbConfig.php';

// Function to get all artworks
function getAllArtworks($pdo)
{
    $stmt = $pdo->query("SELECT * FROM Artwork"); // Assuming 'Artwork' is the correct table name
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function fetchArtworks($pdo)
{
    $sql = "
        SELECT 
            Artwork.ArtworkID, 
            Artwork.Title, 
            Artwork.Artist, 
            Artwork.YearCreated, 
            ArtGallery.GalleryName 
        FROM Artwork
        LEFT JOIN ArtGallery ON Artwork.GalleryID = ArtGallery.GalleryID
    ";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function addArtwork($pdo, $Title, $Artist, $YearCreated)
{
    $sql = "INSERT INTO Artwork (Title, Artist, YearCreated) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(1, $Title);
    $stmt->bindParam(2, $Artist);
    $stmt->bindParam(3, $YearCreated);
    return $stmt->execute();
}

// Function to get a specific artwork by ID
function getArtworkById($pdo, $id)
{
    $sql = "SELECT * FROM Artwork WHERE ArtworkID = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(1, $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Function to update an artwork
function updateArtwork($pdo, $id, $Title, $Artist, $YearCreated)
{
    $sql = "UPDATE Artwork SET Title = ?, Artist = ?, YearCreated = ? WHERE ArtworkID = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(1, $Title);
    $stmt->bindParam(2, $Artist);
    $stmt->bindParam(3, $YearCreated);
    $stmt->bindParam(4, $id);
    return $stmt->execute();
}

// Function to delete an artwork
function deleteArtwork($pdo, $id)
{
    $sql = "DELETE FROM Artwork WHERE ArtworkID = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(1, $id);
    return $stmt->execute();
}
