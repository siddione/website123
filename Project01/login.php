<?php
require 'db.php'; // Include the database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user inputs from the login form
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    try {
        // Get user record from database by user_name
        $stmt = $conn->prepare("SELECT * FROM user_account WHERE user_name = :user_name");
        $stmt->bindParam(':user_name', $user_name);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Check if password matches
            if ($password === $user['password']) { // Since you are storing plain text password
                // Start the session and store user info
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['user_name'];

                // Redirect to homepage
                header("Location: homepage.php");
                exit(); // Always call exit after redirect
            } else {
                echo "Incorrect password.";
            }
        } else {
            // User not found
            echo "No user found with that username.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
