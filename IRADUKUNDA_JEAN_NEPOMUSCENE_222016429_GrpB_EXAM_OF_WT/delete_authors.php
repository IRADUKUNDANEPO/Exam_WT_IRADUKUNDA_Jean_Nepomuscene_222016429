<?php
include('Database_Connection.php');

// Check if AuthorID is set
if(isset($_REQUEST['AuthorID'])) {
    $authorId = $_REQUEST['AuthorID'];
    
    // Prepare and execute the DELETE statement
    $stmt = $connection->prepare("DELETE FROM Authors WHERE AuthorID=?");
    $stmt->bind_param("i", $authorId);
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
            <input type="hidden" name="authorId" value="<?php echo $authorId; ?>">
            <input type="submit" value="Delete">
        </form>

        <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($stmt->execute()) {
        echo "Record deleted successfully.<br><br>
             <a href='view_authors.php'>OK</a>";
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
    echo "AuthorID is not set.";
}

$connection->close();
?>
