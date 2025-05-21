<?php

require_once 'config/Database.php';

class Pasien {
    private $db;
    private $table = 'pasien';
    
    public $id;
    public $nama;
    public $usia;
    public $alamat;
    public $no_telepon;
    
    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }
    
    public function getAll() {
        $query = "SELECT * FROM " . $this->table . " ORDER BY nama ASC";
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
        $query = "INSERT INTO " . $this->table . " (nama, usia, alamat, no_telepon) 
                  VALUES(:nama, :usia, :alamat, :no_telepon)";
        $stmt = $this->db->prepare($query);
        
        // Sanitasi input
        $this->nama = htmlspecialchars(strip_tags($this->nama));
        $this->usia = htmlspecialchars(strip_tags($this->usia));
        $this->alamat = htmlspecialchars(strip_tags($this->alamat));
        $this->no_telepon = htmlspecialchars(strip_tags($this->no_telepon));
        
        // Binding parameter
        $stmt->bindParam(':nama', $this->nama);
        $stmt->bindParam(':usia', $this->usia);
        $stmt->bindParam(':alamat', $this->alamat);
        $stmt->bindParam(':no_telepon', $this->no_telepon);
        
        if($stmt->execute()){
            return true;
        }
        
        return false;
    }
    
    public function update() {
        $query = "UPDATE " . $this->table . " 
                  SET nama = :nama, usia = :usia, alamat = :alamat, no_telepon = :no_telepon
                  WHERE id = :id";
        $stmt = $this->db->prepare($query);
        
        // Sanitasi input
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->nama = htmlspecialchars(strip_tags($this->nama));
        $this->usia = htmlspecialchars(strip_tags($this->usia));
        $this->alamat = htmlspecialchars(strip_tags($this->alamat));
        $this->no_telepon = htmlspecialchars(strip_tags($this->no_telepon));
        
        // Binding parameter
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':nama', $this->nama);
        $stmt->bindParam(':usia', $this->usia);
        $stmt->bindParam(':alamat', $this->alamat);
        $stmt->bindParam(':no_telepon', $this->no_telepon);
        
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