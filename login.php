<?php
session_start();
include 'config.php';  ]

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Database query to find the user
    $sql = "SELECT id, email, password FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {  //  the password is hashed
            $_SESSION['user_id'] = $user['id'];
            header("Location: home.php");
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found with that email address.";
    }
}
?>
