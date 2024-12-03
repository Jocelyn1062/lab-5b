<?php
session_start();  // Start session

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lab_5b";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve and sanitize form data
$matric = trim($_POST['matric']);
$password = trim($_POST['password']);

// Query to check if the user exists
$sql = "SELECT * FROM users WHERE matric = '$matric'";
$result = $conn->query($sql);

// Check if the user exists
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    // Directly compare plain text password
    if ($password == $user['password']) {
        // Successful login
        $_SESSION['user'] = $user['matric'];  // Store user matric in session
        $_SESSION['role'] = $user['role'];    // Store user role in session
        
        // Redirect to displayuser.php after successful login
        header("Location: displayuser.php");
        exit();  // Ensure no further code is executed
    } else {
        echo "<p class='error'>Invalid password. Please try again.</p>";
        echo '<a href="login.php">Back to Login</a>';
    }
} else {
    echo "<p class='error'>Invalid username. Please try login again.</p>";
    echo '<a href="login.php">Login</a>';
}

$conn->close();
?>

