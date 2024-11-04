CREATE TABLE ArtGallery (
    GalleryID INT PRIMARY KEY,
    GalleryName VARCHAR(255) NOT NULL,
    Location VARCHAR(255)
);

CREATE TABLE Artwork (
    ArtworkID INT PRIMARY KEY AUTO_INCREMENT,
    Title VARCHAR(255) NOT NULL,
    Artist VARCHAR(255) NOT NULL,
    YearCreated INT,
    GalleryID INT,
    FOREIGN KEY (GalleryID) REFERENCES ArtGallery(GalleryID)
);
