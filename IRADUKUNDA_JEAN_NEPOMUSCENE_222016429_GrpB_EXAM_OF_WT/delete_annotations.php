<?php
include('Database_Connection.php');

// Check if AnnotationID is set
if(isset($_REQUEST['AnnotationID'])) {
    $annotationId = $_REQUEST['AnnotationID'];
    
    // Prepare and execute the DELETE statement
    $stmt = $connection->prepare("DELETE FROM Annotations WHERE AnnotationID=?");
    $stmt->bind_param("i", $annotationId);
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
            <input type="hidden" name="annotationId" value="<?php echo $annotationId; ?>">
            <input type="submit" value="Delete">
        </form>

        <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($stmt->execute()) {
        echo "Record deleted successfully.<br><br>
             <a href='view_annotations.php'>OK</a>";
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
    echo "AnnotationID is not set.";
}

$connection->close();
?>
