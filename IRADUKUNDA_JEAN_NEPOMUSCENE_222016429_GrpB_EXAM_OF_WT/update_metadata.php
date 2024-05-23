<?php
include('Database_Connection.php');

// Check if MetadataID is set
if(isset($_REQUEST['MetadataID'])) {
    $metadataId = $_REQUEST['MetadataID'];
    
    $stmt = $connection->prepare("SELECT * FROM Metadata WHERE MetadataID=?");
    $stmt->bind_param("i", $metadataId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $creationDate = $row['CreationDate'];
        $lastModifiedDate = $row['LastModifiedDate'];
    } else {
        echo "Metadata not found.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Record in Metadata Table</title>
    <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body>
    <center>
        <!-- Update Metadata form -->
        <h2><u>Update Form of Metadata</u></h2>
        <form method="POST" onsubmit="return confirmUpdate();">

            <label for="creationDate">Creation Date:</label>
            <input type="datetime-local" name="creationDate" value="<?php echo isset($creationDate) ? $creationDate : ''; ?>">
            <br><br>

            <label for="lastModifiedDate">Last Modified Date:</label>
            <input type="datetime-local" name="lastModifiedDate" value="<?php echo isset($lastModifiedDate) ? $lastModifiedDate : ''; ?>">
            <br><br>

            <input type="submit" name="up" value="Update">
            
        </form>
    </center>
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $creationDate = $_POST['creationDate'];
    $lastModifiedDate = $_POST['lastModifiedDate'];
    
    // Update the metadata in the database
    $stmt = $connection->prepare("UPDATE Metadata SET CreationDate=?, LastModifiedDate=? WHERE MetadataID=?");
    $stmt->bind_param("ssi", $creationDate, $lastModifiedDate, $metadataId);
    if ($stmt->execute()) {
        echo "Metadata updated successfully! <br><br>
             <a href='view_metadata.php'>OK</a>";
        // Consider redirecting to a success page or displaying confirmation
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    $stmt->close();
}

$connection->close();
?>  
