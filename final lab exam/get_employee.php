<?php
require_once 'config.php';
header('Content-Type: application/json');

$id = $_GET['id'] ?? '';

try {
    $stmt = $pdo->prepare("SELECT id, name, contact, username FROM employees WHERE id = ?");
    $stmt->execute([$id]);
    $employee = $stmt->fetch(PDO::FETCH_ASSOC);

    echo json_encode(['success' => true, 'data' => $employee]);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
?>