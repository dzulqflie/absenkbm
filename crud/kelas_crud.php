<?php

class KelasCRUD {
    private $db;

    public function __construct($database) {
        $this->db = $database;
    }

    public function create($data) {
        $query = "INSERT INTO classes (name, description) VALUES (:name, :description)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':description', $data['description']);
        return $stmt->execute();
    }

    public function read($id) {
        $query = "SELECT * FROM classes WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $data) {
        $query = "UPDATE classes SET name = :name, description = :description WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':description', $data['description']);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM classes WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function generateQRCode($text) {
        // Assuming you have a QR code library included
        // This is a placeholder for QR code generation logic.
        // You will need to replace this with actual QR code generation code.
        return 'QR code generated for: ' . $text;
    }
}

// Usage:
// $kelasCRUD = new KelasCRUD($db);
// $kelasCRUD->create(['name' => 'Class 1', 'description' => 'Description 1']);
