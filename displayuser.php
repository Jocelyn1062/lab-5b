<?php
session_start();  // Start session

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    header("Location: login.php");  // Redirect to login if not logged in
    exit;
}

// Database connection details
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "lab_5b"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT matric, name, role AS accessLevel FROM users";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <style>
        table {
            width: 70%;
            border-collapse: collapse;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        .btn {
            padding: 5px 10px;
            margin: 2px;
            text-decoration: none;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
        }
        .btn.delete {
            background-color: #dc3545;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center;">User Management</h2>
    <table>
        <thead>
            <tr>
                <th>Matric</th>
                <th>Name</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['matric'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['accessLevel'] . "</td>";
                echo "<td>
                        <a class='btn' href='update_user.php?matric=" . $row['matric'] . "'>Update</a>
                        <a class='btn delete' href='delete_user.php?matric=" . $row['matric'] . "' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No data available</td></tr>";
        }
        ?>
        </tbody>
    </table>
</body>
</html>
