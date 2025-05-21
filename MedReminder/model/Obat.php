<?php

require_once 'config/Database.php';

class Obat {
    private $db;
    private $table = 'obat';
    
    public $id;
    public $nama_obat;
    public $deskripsi;
    public $dosis;
    
    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }
    
    public function getAll() {
        $query = "SELECT * FROM " . $this->table . " ORDER BY nama_obat ASC";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        
        return $stmt;
    }
    
    public function getById($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        
        return $stmt;
    }
    
    public function create() {
        $query = "INSERT INTO " . $this->table . " (nama_obat, deskripsi, dosis)
                  VALUES(:nama_obat, :deskripsi, :dosis)";
        $stmt = $this->db->prepare($query);
        
        // Sanitasi input
        $this->nama_obat = htmlspecialchars(strip_tags($this->nama_obat));
        $this->deskripsi = htmlspecialchars(strip_tags($this->deskripsi));
        $this->dosis = htmlspecialchars(strip_tags($this->dosis));
        
        // Binding parameter
        $stmt->bindParam(':nama_obat', $this->nama_obat);
        $stmt->bindParam(':deskripsi', $this->deskripsi);
        $stmt->bindParam(':dosis', $this->dosis);
        
        if($stmt->execute()){
            return true;
        }
        
        return false;
    }
    
    public function update() {
        $query = "UPDATE " . $this->table . " 
                  SET nama_obat = :nama_obat, deskripsi = :deskripsi, dosis = :dosis
                  WHERE id = :id";
        $stmt = $this->db->prepare($query);
        
        // Sanitasi input
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->nama_obat = htmlspecialchars(strip_tags($this->nama_obat));
        $this->deskripsi = htmlspecialchars(strip_tags($this->deskripsi));
        $this->dosis = htmlspecialchars(strip_tags($this->dosis));
        
        // Binding parameter
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':nama_obat', $this->nama_obat);
        $stmt->bindParam(':deskripsi', $this->deskripsi);
        $stmt->bindParam(':dosis', $this->dosis);
        
        if($stmt->execute()){
            return true;
        }
        
        return false;
    }
    
    public function delete() {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->db->prepare($query);
        
        // Sanitasi input
        $this->id = htmlspecialchars(strip_tags($this->id));
        
        // Binding parameter
        $stmt->bindParam(':id', $this->id);
        
        if($stmt->execute()){
            return true;
        }
        
        return false;
    }
}
?>