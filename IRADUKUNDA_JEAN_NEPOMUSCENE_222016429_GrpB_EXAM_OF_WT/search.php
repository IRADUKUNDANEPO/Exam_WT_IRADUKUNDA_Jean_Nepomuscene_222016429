<?php
// Check if the 'query' GET parameter is set
if (isset($_GET['query']) && !empty($_GET['query'])) {
  
  include('Database_Connection.php');

    // Sanitize input to prevent SQL injection
    $searchTerm = $connection->real_escape_string($_GET['query']);

    // Queries for different tables
    $queries = [
        'Documents' => "SELECT DocumentID FROM Documents WHERE DocumentID LIKE '%$searchTerm%'",
        'Categories' => "SELECT CategoryName FROM Categories WHERE CategoryName LIKE '%$searchTerm%'",
        'Tags' => "SELECT TagName FROM Tags WHERE TagName LIKE '%$searchTerm%'",
        'AccessLogs' => "SELECT AccessType FROM AccessLogs WHERE AccessType LIKE '%$searchTerm%'",
        'Versions' => "SELECT VersionNumber FROM Versions WHERE VersionNumber LIKE '%$searchTerm%'",
        'Comments' => "SELECT CommentID FROM Comments WHERE CommentID LIKE '%$searchTerm%'",
        'Authors' => "SELECT Name FROM Authors WHERE Name LIKE '%$searchTerm%'",

        'Metadata' => "SELECT MetadataID FROM Metadata WHERE MetadataID LIKE '%$searchTerm%'",
        'AccessHistory' => "SELECT AccessHistoryID FROM AccessHistory WHERE AccessHistoryID LIKE '%$searchTerm%'",
        'Annotations' => "SELECT PageNumber FROM Annotations WHERE PageNumber LIKE '%$searchTerm%'"
    ];

    // Output search results
    echo "<h2><u>Search Results:</u></h2>";

    foreach ($queries as $table => $sql) {
        $result = $connection->query($sql);
        echo "<h3>Table of $table:</h3>";
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<p>" . $row[array_keys($row)[0]] . "</p>"; // Dynamic field extraction from result
            }
        } else {
            echo "<p>No results found in $table matching the search term: '$searchTerm'</p>";
        }
    }

    // Close the connection
    $connection->close();
} else {
    echo "<p>No search term was provided.</p>";
}
?>

<a href='home.html'>BACK TO HOME</a>