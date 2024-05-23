<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Linking to external stylesheet -->
  <link rel="stylesheet" type="text/css" href="styles.css" title="style 1" media="screen, tv, projection, handheld, print"/>
  <!-- Defining character encoding -->
  <meta charset="utf-8">
  <!-- Setting viewport for responsive design -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Our Document's Metadata</title>

<link rel="stylesheet" type="text/css" href="styles.css" title="style 1" media="screen, tv, projection, handheld, print">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        /* Normal link */
        .nav-link {
            padding: 10px;
            color: white;
            background-color: greenyellow;
            text-decoration: none;
            margin-right: 30px;
            text-align: center;
        }

        /* Visited link */
        .nav-link:visited {
            color: purple;
        }

        /* Unvisited link */
        .nav-link:link {
            color: brown; /* Changed to lowercase */
        }

        /* Hover effect */
        .nav-link:hover {
            background-color: deeppink;
        }

        /* Active link */
        .nav-link:active {
            background-color: red;
        }

        /* Extend margin left for search button */
        button.btn {
            margin-left: 1px; /* Adjust this value as needed */
            margin-top: 4px;
        }

        /* Extend margin left for search button */
        input.form-control {
            margin-left: 1200px; /* Adjust this value as needed */
            padding: 8px;
        }
        /* Updated CSS for social media links without background color */
        .social-link {
            display: inline-block;
            padding: 10px;
            margin-right: 5px;
            text-align: center;
        }

                /* Header */
   header {
    background-color: darkslategray;
    padding: 10px;
}

        /* Extend dropdown menu item styling */
.dropdown-menu .dropdown-item {
    background-color: black;
    color: white;
}

/* Hover effect for dropdown menu items */
.dropdown-menu .dropdown-item:hover {
    background-color: brown; /* Change background color on hover */
    color: white;
}

    </style>

 <!-- JavaScript validation and content load for insert data-->
        <script>
            function confirmInsert() {
                return confirm('Are you sure you want to insert this record?');
            }
        </script>


</head>
<body style="background-color: violet;">

<header>
    <!-- Search form -->
    <form class="d-flex" role="search" action="search.php" method="GET">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="query">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>

    <!-- Logo and navigation links -->
    <ul style="list-style-type: none; padding: 0;">
        <li style="display: inline; margin-right: 10px;">
           <a href="home.html"> 
            <img src="./Images/Logo.jpeg" width="100" height="70" alt="Logo"> </a>
        </li>
    </ul>
    <div class="container">
        <div class="row">
            <div class="col-auto">
                <div class="box">
                    <nav class="navbar navbar-expand-lg bg-body-tertiary">
                        <div class="container-fluid">
                            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="home.html">HOME</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="about.html">ABOUT</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="contact.html">CONTACT</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="services.html">SERVICES</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#"  data-bs-toggle="dropdown" aria-expanded="false">FORMS</a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="document.php">Documents</a></li>
                                            <li><a class="dropdown-item" href="categories.php">Categories</a></li>
                                            <li><a class="dropdown-item" href="tags.php">Tags</a></li>
                                            <li><a class="dropdown-item" href="accesslogs.php">Access Logs</a></li>
                                            <li><a class="dropdown-item" href="versions.php">Versions</a></li>
                                            <li><a class="dropdown-item" href="comments.php">Comments</a></li>
                                            <li><a class="dropdown-item" href="authors.php">Authors</a></li>
                                            <li><a class="dropdown-item" href="metadata.php">Metadata</a></li>
                                            <li><a class="dropdown-item" href="accesshistory.php">Access History</a></li>
                                            <li><a class="dropdown-item" href="annotations.php">Annotations</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">VIEW-TABLES</a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="view_document.php">Documents table</a></li>
                                            <li><a class="dropdown-item" href="view_categories.php">Categories table</a></li>
                                            <li><a class="dropdown-item" href="view_tags.php">Tags table</a></li>
                                            <li><a class="dropdown-item" href="view_accesslogs.php">Access Logs table</a></li>
                                            <li><a class="dropdown-item" href="view_versions.php">Versions table</a></li>
                                            <li><a class="dropdown-item" href="view_comments.php">Comments table</a></li>
                                            <li><a class="dropdown-item" href="view_authors.php">Authors table</a></li>
                                            <li><a class="dropdown-item" href="view_metadata.php">Metadata table</a></li>
                                            <li><a class="dropdown-item" href="view_accesshistory.php">Access History table</a></li>
                                            <li><a class="dropdown-item" href="view_annotations.php">Annotations table</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown" style="display: inline; margin-right: 10px;">
                                        <a href="#" class="nav-link dropdown-toggle" style="padding: 10px; color: white; background-color: skyblue; text-decoration: none; margin-right: 15px;">Settings</a>
                                        <div class="dropdown-contents">
                                            <!-- Links inside the dropdown menu -->
                                            <a class="dropdown-item" href="#">Profile</a>
                                            <a class="dropdown-item" href="login.html">Change Other Account</a>
                                            <a class="dropdown-item" href="logout.php">Logout</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<section>

    <!-- Metadata form for insertion into the Metadata table -->
<h1><u>Metadata Form</u></h1>
<form method="post" onsubmit="return confirmInsert();">
        
    <label for="metadataId">Metadata ID:</label>
    <input type="number" id="metadataId" name="metadataId"><br><br>

    <label for="creationDate">Creation Date:</label>
    <input type="datetime-local" id="creationDate" name="creationDate" required><br><br>

    <label for="lastModifiedDate">Last Modified Date:</label>
    <input type="datetime-local" id="lastModifiedDate" name="lastModifiedDate" required><br><br>

    <input type="submit" name="add" value="Insert">
   
</form>

<!-- PHP code for inserting data into the Metadata table -->
<?php
include('Database_Connection.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare and bind the parameters
    $stmt = $connection->prepare("INSERT INTO Metadata(MetadataID, CreationDate, LastModifiedDate) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $metadataId, $creationDate, $lastModifiedDate);
    
    // Set parameters and execute
    $metadataId = $_POST['metadataId'];
    $creationDate = $_POST['creationDate'];
    $lastModifiedDate = $_POST['lastModifiedDate'];
   
    if ($stmt->execute() == TRUE) {
        echo "New record has been added successfully. <br><br>
             <a href='view_metadata.php'>OK</a>";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
$connection->close();
?>


</body>

    </section>
<footer>
 <marquee behavior='alternate'> 
<b><h2>UR CBE BIT &copy, 2024 &reg, Designer by: @Jean Nepo IRADUKUNDA</h2></b>
</marquee>
<center><b style="color: white;"><i>&copy 2024 All Rights Reserved</i></b></center>
</footer>

</body>
</html>