<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 50px;
        }
        form {
            display: inline-block;
            text-align: left;
        }
        input {
            margin: 10px 0;
            padding: 8px;
            width: 250px;
        }
        button {
            padding: 8px 15px;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <h2>Login Page</h2>
    <form action="authenticate.php" method="POST">
        <label for="matric">Matric:</label><br>
        <input type="text" id="matric" name="matric" required><br>
        
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br>
        
        <button type="submit">Login</button><br><br>
        <a href="registration.php">New User? Register Here</a>
    </form>
</body>
</html>
