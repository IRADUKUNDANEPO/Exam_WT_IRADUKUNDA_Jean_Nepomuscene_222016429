<?php
include('Database_Connection.php');

// Check if VersionID is set
if(isset($_REQUEST['VersionID'])) {
    $versionId = $_REQUEST['VersionID'];
    
    // Prepare and execute the DELETE statement
    $stmt = $connection->prepare("DELETE FROM Versions WHERE VersionID=?");
    $stmt->bind_param("i", $versionId);
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Delete Record</title>
        <script>
            function confirmDelete() {
                return confirm("Are you sure you want to delete this record?");
            }
        </script>
    </head>
    <body>
        <form method="post" onsubmit="return confirmDelete();">
            <input type="hidden" name="versionId" value="<?php echo $versionId; ?>">
            <input type="submit" value="Delete">
        </form>

        <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($stmt->execute()) {
        echo "Record deleted successfully.<br><br>
             <a href='view_versions.php'>OK</a>";
    } else {
        echo "Error deleting data: " . $stmt->error;
    }
}
?>
    </body>
    </html>
    <?php
    $stmt->close();
} else {
    echo "VersionID is not set.";
}

$connection->close();
?>
