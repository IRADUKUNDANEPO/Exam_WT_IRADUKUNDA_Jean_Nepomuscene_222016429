<?php
include('Database_Connection.php');

// Initialize variables to avoid potential errors
$categoryId = $categoryName = '';

// Check if CategoryID is set
if(isset($_REQUEST['CategoryID'])) {
    $categoryId = $_REQUEST['CategoryID'];
    
    $stmt = $connection->prepare("SELECT * FROM Categories WHERE CategoryID=?");
    $stmt->bind_param("i", $categoryId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $categoryName = $row['CategoryName'];
    } else {
        echo "Category not found.";
    }
    // Close statement after fetching data
    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Record in Category Table</title>
    <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body>
    <center>
        <!-- Update Category form -->
        <h2><u>Update Form of Category</u></h2>
        <form method="POST" onsubmit="return confirmUpdate();">

            <label for="categoryName">Category Name:</label>
            <input type="text" name="categoryName" value="<?php echo htmlspecialchars($categoryName); ?>">
            <br><br>

            <input type="submit" name="update" value="Update">
            
        </form>
    </center>
</body>
</html>

<?php
if(isset($_POST['update'])) {
    // Retrieve updated values from form
    $categoryName = $_POST['categoryName'];
    
    // Update the category in the database
    $stmt = $connection->prepare("UPDATE Categories SET CategoryName=? WHERE CategoryID=?");
    $stmt->bind_param("si", $categoryName, $categoryId);
    if ($stmt->execute()) {
        echo "Category updated successfully! <br><br>
             <a href='view_categories.php'>OK</a>";
        // Consider redirecting to a success page or displaying confirmation
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    $stmt->close();
}

$connection->close();
?>  
