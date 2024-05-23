<?php
include('Database_Connection.php');

// Check if AccessHistoryID is set
if(isset($_REQUEST['AccessHistoryID'])) {
    $accessHistoryID = $_REQUEST['AccessHistoryID'];
    
    // Prepare and execute the DELETE statement
    $stmt = $connection->prepare("DELETE FROM AccessHistory WHERE AccessHistoryID=?");
    $stmt->bind_param("i", $accessHistoryID);
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
            <input type="hidden" name="accessHistoryID" value="<?php echo $accessHistoryID; ?>">
            <input type="submit" value="Delete">
        </form>

        <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($stmt->execute()) {
        echo "Record deleted successfully.<br><br>
             <a href='view_accesshistory.php'>OK</a>";
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
    echo "AccessHistoryID is not set.";
}

$connection->close();
?>
