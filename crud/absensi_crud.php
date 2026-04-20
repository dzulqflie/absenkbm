<?php
// CRUD operations for Attendance Records

class Attendance {
    private $db;

    public function __construct($database) {
        $this->db = $database;
    }

    // Create a new attendance record
    public function create($date, $status) {
        $query = "INSERT INTO attendance (date, status) VALUES (:date, :status)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':status', $status);
        return $stmt->execute();
    }

    // Read attendance records
    public function read($date = null) {
        if($date) {
            $query = "SELECT * FROM attendance WHERE date = :date";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':date', $date);
        } else {
            $query = "SELECT * FROM attendance";
            $stmt = $this->db->prepare($query);
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Update an attendance record
    public function update($id, $date, $status) {
        $query = "UPDATE attendance SET date = :date, status = :status WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':status', $status);
        return $stmt->execute();
    }

    // Delete an attendance record
    public function delete($id) {
        $query = "DELETE FROM attendance WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>
