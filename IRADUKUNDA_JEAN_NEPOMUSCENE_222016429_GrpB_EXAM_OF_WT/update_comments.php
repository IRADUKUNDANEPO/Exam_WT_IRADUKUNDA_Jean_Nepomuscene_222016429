<?php
include('Database_Connection.php');

// Initialize variables to avoid potential errors
$commentId = $documentId = $authorId = $userId = $commentText = $dateAdded = $commentDate = '';

// Check if CommentID is set
if(isset($_REQUEST['CommentID'])) {
    $commentId = $_REQUEST['CommentID'];
    
    $stmt = $connection->prepare("SELECT * FROM Comments WHERE CommentID=?");
    $stmt->bind_param("i", $commentId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $documentId = $row['DocumentID'];
        $authorId = $row['AuthorID'];
        $userId = $row['UserID'];
        $commentText = $row['CommentText'];
        $dateAdded = $row['DateAdded'];
        $commentDate = $row['CommentDate'];
    } else {
        echo "Comment not found.";
    }
    // Close statement after fetching data
    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Record in Comments Table</title>
    <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body>
    <center>
        <!-- Update Comments form -->
        <h2><u>Update Form of Comments</u></h2>
        <form method="POST" onsubmit="return confirmUpdate();">

            <label for="documentId">Document ID:</label>
            <input type="number" name="documentId" value="<?php echo $documentId; ?>">
            <br><br>

            <label for="authorId">Author ID:</label>
            <input type="number" name="authorId" value="<?php echo $authorId; ?>">
            <br><br>

            <label for="userId">User ID:</label>
            <input type="number" name="userId" value="<?php echo $userId; ?>">
            <br><br>

            <label for="commentText">Comment Text:</label>
            <input type="text" name="commentText" value="<?php echo $commentText; ?>">
            <br><br>

            <label for="dateAdded">Date Added:</label>
            <input type="date" name="dateAdded" value="<?php echo $dateAdded; ?>">
            <br><br>

            <label for="commentDate">Comment Date:</label>
            <input type="datetime-local" name="commentDate" value="<?php echo $commentDate; ?>">
            <br><br>

            <input type="submit" name="update" value="Update">
            
        </form>
    </center>
</body>
</html>

<?php
if(isset($_POST['update'])) {
    // Retrieve updated values from form
    $documentId = $_POST['documentId'];
    $authorId = $_POST['authorId'];
    $userId = $_POST['userId'];
    $commentText = $_POST['commentText'];
    $dateAdded = $_POST['dateAdded'];
    $commentDate = $_POST['commentDate'];
    
    // Update the comment in the database
    $stmt = $connection->prepare("UPDATE Comments SET DocumentID=?, AuthorID=?, UserID=?, CommentText=?, DateAdded=?, CommentDate=? WHERE CommentID=?");
    $stmt->bind_param("iiissii", $documentId, $authorId, $userId, $commentText, $dateAdded, $commentDate, $commentId);
    if ($stmt->execute()) {
        echo "Comment updated successfully! <br><br>
             <a href='view_comments.php'>OK</a>";
        // Consider redirecting to a success page or displaying confirmation
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    $stmt->close();
}

$connection->close();
?>
