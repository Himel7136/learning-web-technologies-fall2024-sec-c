<?php
require_once 'config.php';
header('Content-Type: application/json');

$id = $_POST['id'] ?? '';
$name = $_POST['name'] ?? '';
$contact = $_POST['contact'] ?? '';
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

try {
    if ($id) {

        $sql = "UPDATE employees SET name = ?, contact = ?, username = ? WHERE id = ?";
        $params = [$name, $contact, $username, $id];
        if ($password) {
            $sql = "UPDATE employees SET name = ?, contact = ?, username = ?, password = ? WHERE id = ?";
            $params = [$name, $contact, $username, password_hash($password, PASSWORD_DEFAULT), $id];
        }
    } else {
   
        $sql = "INSERT INTO employees (name, contact, username, password) VALUES (?, ?, ?, ?)";
        $params = [$name, $contact, $username, password_hash($password, PASSWORD_DEFAULT)];
    }

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);

    echo json_encode([
        'success' => true,
        'message' => $id ? 'Employee updated successfully' : 'Employee added successfully'
    ]);
} catch (PDOException $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Error: ' . $e->getMessage()
    ]);
}
?>