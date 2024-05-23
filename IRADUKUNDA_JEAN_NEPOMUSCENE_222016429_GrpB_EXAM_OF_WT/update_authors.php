<?php
include('Database_Connection.php');

// Check if AuthorID is set
if(isset($_REQUEST['AuthorID'])) {
    $authorId = $_REQUEST['AuthorID'];
    
    $stmt = $connection->prepare("SELECT * FROM Authors WHERE AuthorID=?");
    $stmt->bind_param("i", $authorId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $authorName = $row['Name'];
        $email = $row['Email'];
        $gender = $row['Gender'];
    } else {
        echo "Author not found.";
    }
    // Close statement after fetching data
    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Record in Authors Table</title>
    <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body>
    <center>
        <!-- Update Author form -->
        <h2><u>Update Form of Author</u></h2>
        <form method="POST" onsubmit="return confirmUpdate();">

            <label for="authorName">Author Name:</label>
            <input type="text" name="authorName" value="<?php echo isset($authorName) ? $authorName : ''; ?>">
            <br><br>

            <label for="email">Email:</label>
            <input type="email" name="email" value="<?php echo isset($email) ? $email : ''; ?>">
            <br><br>

            <label for="gender">Gender:</label>
            <select name="gender">
                <option value="Male" <?php if(isset($gender) && $gender == 'Male') echo 'selected'; ?>>Male</option>
                <option value="Female" <?php if(isset($gender) && $gender == 'Female') echo 'selected'; ?>>Female</option>
            </select>
            <br><br>

            <input type="submit" name="up" value="Update">
            
        </form>
    </center>
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $authorName = $_POST['authorName'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    
    // Update the author in the database
    $stmt = $connection->prepare("UPDATE Authors SET Name=?, Email=?, Gender=? WHERE AuthorID=?");
    $stmt->bind_param("sssi", $authorName, $email, $gender, $authorId);
    if ($stmt->execute()) {
        echo "Author updated successfully! <br><br>
             <a href='view_authors.php'>OK</a>";
        // Consider redirecting to a success page or displaying confirmation
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    $stmt->close();
}

$connection->close();
?>  
