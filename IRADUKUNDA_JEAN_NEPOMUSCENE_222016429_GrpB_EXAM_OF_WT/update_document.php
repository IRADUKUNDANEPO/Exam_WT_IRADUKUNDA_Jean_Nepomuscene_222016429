<?php
include('Database_Connection.php');

// Check if DocumentID is set
if(isset($_REQUEST['DocumentID'])) {
    $docId = $_REQUEST['DocumentID'];
    
    $stmt = $connection->prepare("SELECT * FROM Documents WHERE DocumentID=?");
    $stmt->bind_param("i", $docId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $title = $row['Title'];
        $content = $row['Content'];
        $authorId = $row['AuthorID'];
        $categoryId = $row['CategoryID'];
        $metadataId = $row['MetadataID'];
        $createdAt = $row['CreatedAt'];
    } else {
        echo "Document not found.";
    }
    // Close statement after fetching data
    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Record in Document Table</title>
    <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body>
    <center>
        <!-- Update document form -->
        <h2><u>Update Form of Document</u></h2>
        <form method="POST" onsubmit="return confirmUpdate();">

            <label for="title">Title:</label>
            <input type="text" name="title" value="<?php echo isset($title) ? $title : ''; ?>">
            <br><br>

            <label for="content">Content:</label>
            <input type="text" name="content" value="<?php echo isset($content) ? $content : ''; ?>">
            <br><br>

            <label for="authorId">Author ID:</label>
            <input type="number" name="authorId" value="<?php echo isset($authorId) ? $authorId : ''; ?>">
            <br><br>

            <label for="categoryId">Category ID:</label>
            <input type="number" name="categoryId" value="<?php echo isset($categoryId) ? $categoryId : ''; ?>">
            <br><br>

            <label for="metadataId">Metadata ID:</label>
            <input type="number" name="metadataId" value="<?php echo isset($metadataId) ? $metadataId : ''; ?>">
            <br><br>

            <label for="createdAt">Created At:</label>
            <input type="datetime-local" name="createdAt" value="<?php echo isset($createdAt) ? date('Y-m-d\TH:i:s', strtotime($createdAt)) : ''; ?>">
            <br><br>

            <input type="submit" name="up" value="Update">
            
        </form>
    </center>
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $title = $_POST['title'];
    $content = $_POST['content'];
    $authorId = $_POST['authorId'];
    $categoryId = $_POST['categoryId'];
    $metadataId = $_POST['metadataId'];
    $createdAt = $_POST['createdAt'];
    
    // Update the document in the database
    $stmt = $connection->prepare("UPDATE Documents SET Title=?, Content=?, AuthorID=?, CategoryID=?, MetadataID=?, CreatedAt=? WHERE DocumentID=?");
    $stmt->bind_param("ssiiisi", $title, $content, $authorId, $categoryId, $metadataId, $createdAt, $docId);
    if ($stmt->execute()) {
        echo "Document updated successfully! <br><br>
             <a href='view_document.php'>OK</a>";
        // Consider redirecting to a success page or displaying confirmation
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    $stmt->close();
}

$connection->close();
?>  
