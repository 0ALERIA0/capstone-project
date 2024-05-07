<?php
// MySQL database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "castelo";

// Make connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection and throw error if not available
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if an image file was uploaded
$sql = "SELECT * FROM `images`";

$result = mysqli_query($conn, $sql);

if ($result) {
    // Fetch data as an array
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    // Handle the error, if any
    echo "Error: " . mysqli_error($conn);
}

// Close the database connection
$conn->close();




?>

<!DOCTYPE html>
<html>

<head>
  <title>PHP - Upload image to database - Example</title>
  <link href="style.css" rel="stylesheet" type="text/css" />
  <link href="form.css" rel="stylesheet" type="text/css" />
</head>

<body>
  <div>
    <?php echo $data['image'] ?>
  </div>
</body>

</html>