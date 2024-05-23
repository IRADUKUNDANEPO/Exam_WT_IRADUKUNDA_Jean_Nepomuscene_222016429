<?php
include('Database_Connection.php');

// Check if TagID is set
if(isset($_REQUEST['TagID'])) {
    $tagId = $_REQUEST['TagID'];
    
    $stmt = $connection->prepare("SELECT * FROM Tags WHERE TagID=?");
    $stmt->bind_param("i", $tagId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $tagName = $row['TagName'];
    } else {
        echo "Tag not found.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Record in Tags Table</title>
    <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body>
    <center>
        <!-- Update Tags form -->
        <h2><u>Update Form of Tags</u></h2>
        <form method="POST" onsubmit="return confirmUpdate();">

            <label for="tagName">Tag Name:</label>
            <input type="text" name="tagName" value="<?php echo isset($tagName) ? $tagName : ''; ?>">
            <br><br>

            <input type="submit" name="up" value="Update">
            
        </form>
    </center>
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $tagName = $_POST['tagName'];
    
    // Update the tag in the database
    $stmt = $connection->prepare("UPDATE Tags SET TagName=? WHERE TagID=?");
    $stmt->bind_param("si", $tagName, $tagId);
    if ($stmt->execute()) {
        echo "Tag updated successfully! <br><br>
             <a href='view_tags.php'>OK</a>";
        // Consider redirecting to a success page or displaying confirmation
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    $stmt->close();
}

$connection->close();
?>  
