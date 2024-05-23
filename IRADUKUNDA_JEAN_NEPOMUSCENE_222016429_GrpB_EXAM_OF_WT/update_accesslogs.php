<?php
include('Database_Connection.php');

// Initialize variables
$logId = $documentId = $userId = $accessTime = $accessType = '';

// Check if LogID is set
if(isset($_REQUEST['LogID'])) {
    $logId = $_REQUEST['LogID'];
    
    // Prepare and execute SQL query
    $stmt = $connection->prepare("SELECT * FROM AccessLogs WHERE LogID=?");
    $stmt->bind_param("i", $logId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    // Fetch data if found
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $documentId = $row['DocumentID'];
        $userId = $row['UserID'];
        $accessTime = $row['AccessTime'];
        $accessType = $row['AccessType'];
    } else {
        echo "Access log not found.";
    }
}

// Close statement
$stmt->close();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Record in Access Logs Table</title>
    <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body>
    <center>
        <!-- Update Access Logs form -->
        <h2><u>Update Form of Access Logs</u></h2>
        <form method="POST" onsubmit="return confirmUpdate();">

            <label for="documentId">Document ID:</label>
            <input type="number" name="documentId" value="<?php echo $documentId; ?>">
            <br><br>

            <label for="userId">User ID:</label>
            <input type="number" name="userId" value="<?php echo $userId; ?>">
            <br><br>

            <label for="accessTime">Access Time:</label>
            <input type="datetime-local" name="accessTime" value="<?php echo isset($accessTime) ? date('Y-m-d\TH:i:s', strtotime($accessTime)) : ''; ?>">
            <br><br>

            <label for="access">Access Type:</label>
            <select name="access">
                <option value="Write" <?php if($accessType == 'Write') echo 'selected'; ?>>Write</option>
                <option value="Read" <?php if($accessType == 'Read') echo 'selected'; ?>>Read</option>
                <option value="Edit" <?php if($accessType == 'Edit') echo 'selected'; ?>>Edit</option>
                <option value="Delete" <?php if($accessType == 'Delete') echo 'selected'; ?>>Delete</option>
            </select>
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
    $userId = $_POST['userId'];
    $accessTime = $_POST['accessTime'];
    $accessType = $_POST['access'];
    
    // Update the access log in the database
    $stmt = $connection->prepare("UPDATE AccessLogs SET DocumentID=?, UserID=?, AccessTime=?, AccessType=? WHERE LogID=?");
    $stmt->bind_param("iissi", $documentId, $userId, $accessTime, $accessType, $logId);
    if ($stmt->execute()) {
        echo "Access log updated successfully! <br><br>
             <a href='view_accesslogs.php'>OK</a>";
        // Consider redirecting to a success page or displaying confirmation
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    $stmt->close();
}

$connection->close();
?>  
