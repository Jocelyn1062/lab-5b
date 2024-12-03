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

    $sql = "SELECT * FROM users WHERE matric = '$matric'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
    } else {
        echo "User not found.";
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $matric = $_POST['matric'];
    $name = $_POST['name'];
    $role = $_POST['role'];

    $updateSql = "UPDATE users SET name = '$name', role = '$role' WHERE matric = '$matric'";
    if ($conn->query($updateSql) === TRUE) {
        echo "User updated successfully.";
        header("Location: displayuser.php");
    } else {
        echo "Error updating user: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
</head>
<body>
    <h2>Update User</h2>
    <form method="POST" action="update_user.php">
        <input type="hidden" name="matric" value="<?php echo $user['matric']; ?>">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" value="<?php echo $user['name']; ?>" required><br><br>
        
        <label for="role">Role:</label><br>
        <select id="role" name="role" required>
            <option value="student" <?php echo ($user['role'] == 'student') ? 'selected' : ''; ?>>Student</option>
            <option value="lecturer" <?php echo ($user['role'] == 'lecturer') ? 'selected' : ''; ?>>Lecturer</option>
        </select><br><br>
        
        <button type="submit">Update</button>
    </form>
</body>
</html>
