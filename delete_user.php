<?php
session_start();  // Start session

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    header("Location: login.php");  // Redirect to login if not logged in
    exit;
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lab_5b";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['matric'])) {
    $matric = $_GET['matric'];

    $deleteSql = "DELETE FROM users WHERE matric = '$matric'";
    if ($conn->query($deleteSql) === TRUE) {
        echo "User deleted successfully.";
        header("Location: displayuser.php");
    } else {
        echo "Error deleting user: " . $conn->error;
    }
}

$conn->close();
?>
