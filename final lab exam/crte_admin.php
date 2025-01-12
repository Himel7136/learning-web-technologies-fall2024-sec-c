
<?php
require_once 'config.php';

$username = 'admin';
$password = 'your_chosen_password'; 
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

try {

    $stmt = $pdo->prepare("DELETE FROM admin WHERE username = ?");
    $stmt->execute([$username]);


    $stmt = $pdo->prepare("INSERT INTO admin (username, password) VALUES (?, ?)");
    $stmt->execute([$username, $hashed_password]);

    echo "Admin created successfully!\n";
    echo "Username: " . $username . "\n";
    echo "Password: " . $password . "\n";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>