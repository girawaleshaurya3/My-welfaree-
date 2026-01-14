<?php
$servername = "localhost";
$username = "root";  // default in XAMPP
$password = "";      // default in XAMPP is blank
$dbname = "subsidy_db";  // make sure DB name is correct

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data safely
$name = $conn->real_escape_string($_POST['name']);
$email = $conn->real_escape_string($_POST['email']);
$mobile = $conn->real_escape_string($_POST['mobile']);

// Insert into table
$sql = "INSERT INTO users (name, email, mobile) VALUES ('$name', '$email', '$mobile')";

if ($conn->query($sql) === TRUE) {
    // Redirect to home page
    header("Location: index.html");
    exit(); // always call exit after header redirect
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
