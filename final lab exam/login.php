<?php
require_once 'config.php';
header('Content-Type: application/json');

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

$stmt = $pdo->prepare("SELECT * FROM admin WHERE username = ?");
$stmt->execute([$username]);
$admin = $stmt->fetch();

if ($admin && password_verify($password, $admin['password'])) {
    session_start();
    $_SESSION['admin_id'] = $admin['id'];
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false]);
}
?>