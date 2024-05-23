<?php
include('Database_Connection.php');

// Check if DocumentID is set
if(isset($_REQUEST['DocumentID'])) {
    $docId = $_REQUEST['DocumentID'];
    
    // Prepare and execute the DELETE statement
    $stmt = $connection->prepare("DELETE FROM Documents WHERE DocumentID=?");
    $stmt->bind_param("i", $docId);
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
            <input type="hidden" name="docId" value="<?php echo $docId; ?>">
            <input type="submit" value="Delete">
        </form>

        <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($stmt->execute()) {
        echo "Record deleted successfully.<br><br>
             <a href='view_document.php'>OK</a>";
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
    echo "DocumentID is not set.";
}

$connection->close();
?>
