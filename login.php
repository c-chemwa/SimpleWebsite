<?php
require 'includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        if (password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['username'] = $user['username'];
            header("Location: dashboard.html");
        } else {
            $error = "Invalid password!";
            header("Location: login.html?error=password");
        }
    } else {
        $error = "No user found!";
        header("Location: login.html?error=user");
    }

    $stmt->close();
    $conn->close();
}
?>
