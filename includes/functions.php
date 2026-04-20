<?php

// Utility functions for password hashing
function hashPassword($password) {
    return password_hash($password, PASSWORD_BCRYPT);
}

function verifyPassword($password, $hash) {
    return password_verify($password, $hash);
}

// Session management functions
function startSession() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
}

function setSession($key, $value) {
    $_SESSION[$key] = $value;
}

function getSession($key) {
    return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
}

function destroySession() {
    session_unset();
    session_destroy();
}

// Database operations functions
function connectDatabase($host, $user, $pass, $dbname) {
    $conn = new mysqli($host, $user, $pass, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

function closeDatabase($conn) {
    $conn->close();
}

function executeQuery($conn, $query) {
    return $conn->query($query);
}

?>