<?php
// CRUD operations for users table

// Database connection
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create user
function createUser($username, $password) {
    global $conn;
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?);");
    $stmt->bind_param("ss", $username, $hashedPassword);
    return $stmt->execute();
}

// Read user
function getUser($id) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?;");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

// Update user
function updateUser($id, $username, $password) {
    global $conn;
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("UPDATE users SET username = ?, password = ? WHERE id = ?;");
    $stmt->bind_param("ssi", $username, $hashedPassword, $id);
    return $stmt->execute();
}

// Delete user
function deleteUser($id) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?;");
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}

// Close connection
$conn->close();
?>
