<?php
include('Database_Connection.php');

// Check if CategoryID is set
if(isset($_REQUEST['CategoryID'])) {
    $categoryId = $_REQUEST['CategoryID'];
    
    // Prepare and execute the DELETE statement
    $stmt = $connection->prepare("DELETE FROM Categories WHERE CategoryID=?");
    $stmt->bind_param("i", $categoryId);
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
            <input type="hidden" name="categoryId" value="<?php echo $categoryId; ?>">
            <input type="submit" value="Delete">
        </form>

        <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($stmt->execute()) {
        echo "Record deleted successfully.<br><br>
             <a href='view_categories.php'>OK</a>";
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
    echo "CategoryID is not set.";
}

$connection->close();
?>
