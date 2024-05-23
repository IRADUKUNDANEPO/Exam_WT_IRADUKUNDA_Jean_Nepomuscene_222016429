<?php
include('Database_Connection.php');

// Check if VersionID is set
if(isset($_REQUEST['VersionID'])) {
    $versionId = $_REQUEST['VersionID'];
    
    $stmt = $connection->prepare("SELECT * FROM Versions WHERE VersionID=?");
    $stmt->bind_param("i", $versionId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $documentId = $row['DocumentID'];
        $versionNumber = $row['VersionNumber'];
        $dateModified = $row['DateModified'];
    } else {
        echo "Version not found.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Record in Versions Table</title>
    <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body>
    <center>
        <!-- Update Versions form -->
        <h2><u>Update Form of Versions</u></h2>
        <form method="POST" onsubmit="return confirmUpdate();">

            <label for="documentId">Document ID:</label>
            <input type="number" name="documentId" value="<?php echo isset($documentId) ? $documentId : ''; ?>">
            <br><br>

            <label for="versionNumber">Version Number:</label>
            <input type="number" name="versionNumber" value="<?php echo isset($versionNumber) ? $versionNumber : ''; ?>">
            <br><br>

            <label for="dateModified">Date Modified:</label>
            <input type="datetime-local" name="dateModified" value="<?php echo isset($dateModified) ? $dateModified : ''; ?>">
            <br><br>

            <input type="submit" name="up" value="Update">
            
        </form>
    </center>
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $documentId = $_POST['documentId'];
    $versionNumber = $_POST['versionNumber'];
    $dateModified = $_POST['dateModified'];
    
    // Update the version in the database
    $stmt = $connection->prepare("UPDATE Versions SET DocumentID=?, VersionNumber=?, DateModified=? WHERE VersionID=?");
    $stmt->bind_param("iiii", $documentId, $versionNumber, $dateModified, $versionId);
    if ($stmt->execute()) {
        echo "Version updated successfully! <br><br>
             <a href='view_versions.php'>OK</a>";
        // Consider redirecting to a success page or displaying confirmation
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    $stmt->close();
}

$connection->close();
?>  
