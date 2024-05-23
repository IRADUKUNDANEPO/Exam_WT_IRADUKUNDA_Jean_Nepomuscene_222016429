<?php
include('Database_Connection.php');

// Initialize variables
$docId = $userId = $accessDate = '';

// Check if AccessHistoryID is set
if(isset($_REQUEST['AccessHistoryID'])) {
    $accessId = $_REQUEST['AccessHistoryID'];
    
    // Prepare and execute SQL query
    $stmt = $connection->prepare("SELECT * FROM AccessHistory WHERE AccessHistoryID=?");
    $stmt->bind_param("i", $accessId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    // Fetch data if found
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $docId = $row['DocumentID'];
        $userId = $row['UserID'];
        $accessDate = $row['AccessDate'];
    } else {
        echo "Access history not found.";
    }
}

// Close statement
$stmt->close();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Record in Access History Table</title>
    <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body>
    <center>
        <!-- Update Access History form -->
        <h2><u>Update Form of Access History</u></h2>
        <form method="POST" onsubmit="return confirmUpdate();">

            <label for="docId">Document ID:</label>
            <input type="number" name="docId" value="<?php echo $docId; ?>">
            <br><br>

            <label for="userId">User ID:</label>
            <input type="number" name="userId" value="<?php echo $userId; ?>">
            <br><br>

            <label for="accessDate">Access Date:</label>
            <input type="date" name="accessDate" value="<?php echo $accessDate; ?>">
            <br><br>

            <input type="submit" name="up" value="Update">
            
        </form>
    </center>
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $docId = $_POST['docId'];
    $userId = $_POST['userId'];
    $accessDate = $_POST['accessDate'];
    
    // Update the access history in the database
    $stmt = $connection->prepare("UPDATE AccessHistory SET DocumentID=?, UserID=?, AccessDate=? WHERE AccessHistoryID=?");
    $stmt->bind_param("iisi", $docId, $userId, $accessDate, $accessId);
    if ($stmt->execute()) {
        echo "Access history updated successfully! <br><br>
             <a href='view_accesshistory.php'>OK</a>";
        // Consider redirecting to a success page or displaying confirmation
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    $stmt->close();
}

$connection->close();
?>  
