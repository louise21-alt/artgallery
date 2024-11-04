<td>
    <a href="viewArtwork.php?id=<?php echo $row['ArtworkID']; ?>">View</a>
    <a href="editArtwork.php?id=<?php echo $row['ArtworkID']; ?>">Edit</a>
    <form method="POST" style="display:inline;">
        <input type="hidden" name="artworkID" value="<?php echo $row['ArtworkID']; ?>">
        <input type="submit" name="delete" value="Delete" onclick="return confirm('Are you sure?');">
    </form>
</td>
