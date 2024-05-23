<?php
include('Database_Connection.php');

// Check if AnnotationID is set
if(isset($_REQUEST['AnnotationID'])) {
    $annotationId = $_REQUEST['AnnotationID'];
    
    $stmt = $connection->prepare("SELECT * FROM Annotations WHERE AnnotationID=?");
    $stmt->bind_param("i", $annotationId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $documentId = $row['DocumentID'];
        $pageNumber = $row['PageNumber'];
        $text = $row['Text'];
        $authorId = $row['AuthorID'];
        $annotationDate = $row['AnnotationDate'];
    } else {
        echo "Annotation not found.";
    }
}

// Close statement
$stmt->close();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Record in Annotations Table</title>
    <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body>
    <center>
        <!-- Update Annotations form -->
        <h2><u>Update Form of Annotations</u></h2>
        <form method="POST" onsubmit="return confirmUpdate();">

            <label for="documentId">Document ID:</label>
            <input type="number" name="documentId" value="<?php echo isset($documentId) ? $documentId : ''; ?>">
            <br><br>

            <label for="pageNumber">Page Number:</label>
            <input type="number" name="pageNumber" value="<?php echo isset($pageNumber) ? $pageNumber : ''; ?>">
            <br><br>

            <label for="text">Text:</label>
            <input type="text" name="text" value="<?php echo isset($text) ? $text : ''; ?>">
            <br><br>

            <label for="authorId">Author ID:</label>
            <input type="number" name="authorId" value="<?php echo isset($authorId) ? $authorId : ''; ?>">
            <br><br>

            <label for="annotationDate">Annotation Date:</label>
            <input type="datetime-local" name="annotationDate" value="<?php echo isset($annotationDate) ? date('Y-m-d\TH:i:s', strtotime($annotationDate)) : ''; ?>">
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
    $pageNumber = $_POST['pageNumber'];
    $text = $_POST['text'];
    $authorId = $_POST['authorId'];
    $annotationDate = $_POST['annotationDate'];
    
    // Update the annotation in the database
    $stmt = $connection->prepare("UPDATE Annotations SET DocumentID=?, PageNumber=?, Text=?, AuthorID=?, AnnotationDate=? WHERE AnnotationID=?");
    $stmt->bind_param("iisisi", $documentId, $pageNumber, $text, $authorId, $annotationDate, $annotationId);
    if ($stmt->execute()) {
        echo "Annotation updated successfully! <br><br>
             <a href='view_annotations.php'>OK</a>";
        // Consider redirecting to a success page or displaying confirmation
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    $stmt->close();
}

$connection->close();
?>  
