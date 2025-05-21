<?php

require_once 'config/Database.php';

class JadwalObat {
    private $db;
    private $table = 'jadwal_obat';
    
    public $id;
    public $pasien_id;
    public $obat_id;
    public $waktu_konsumsi;
    public $frekuensi;
    public $tanggal_mulai;
    public $tanggal_selesai;
    public $status;
    
    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }
    
    public function getAll() {
        $query = "SELECT jo.*, p.nama as nama_pasien, o.nama_obat 
                  FROM " . $this->table . " jo
                  LEFT JOIN pasien p ON jo.pasien_id = p.id
                  LEFT JOIN obat o ON jo.obat_id = o.id
                  ORDER BY jo.tanggal_mulai DESC";
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
    
    public function getByPasienId($pasienId) {
        $query = "SELECT jo.*, o.nama_obat 
                  FROM " . $this->table . " jo
                  LEFT JOIN obat o ON jo.obat_id = o.id
                  WHERE jo.pasien_id = :pasien_id
                  ORDER BY jo.tanggal_mulai DESC";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':pasien_id', $pasienId);
        $stmt->execute();
        
        return $stmt;
    }
    
    public function create() {
        $query = "INSERT INTO " . $this->table . " (pasien_id, obat_id, waktu_konsumsi, frekuensi, tanggal_mulai, tanggal_selesai, status)
                  VALUES(:pasien_id, :obat_id, :waktu_konsumsi, :frekuensi, :tanggal_mulai, :tanggal_selesai, :status)";
        $stmt = $this->db->prepare($query);
        
        // Sanitasi input
        $this->pasien_id = htmlspecialchars(strip_tags($this->pasien_id));
        $this->obat_id = htmlspecialchars(strip_tags($this->obat_id));
        $this->waktu_konsumsi = htmlspecialchars(strip_tags($this->waktu_konsumsi));
        $this->frekuensi = htmlspecialchars(strip_tags($this->frekuensi));
        $this->tanggal_mulai = htmlspecialchars(strip_tags($this->tanggal_mulai));
        $this->tanggal_selesai = htmlspecialchars(strip_tags($this->tanggal_selesai));
        $this->status = htmlspecialchars(strip_tags($this->status));
        
        // Binding parameter
        $stmt->bindParam(':pasien_id', $this->pasien_id);
        $stmt->bindParam(':obat_id', $this->obat_id);
        $stmt->bindParam(':waktu_konsumsi', $this->waktu_konsumsi);
        $stmt->bindParam(':frekuensi', $this->frekuensi);
        $stmt->bindParam(':tanggal_mulai', $this->tanggal_mulai);
        $stmt->bindParam(':tanggal_selesai', $this->tanggal_selesai);
        $stmt->bindParam(':status', $this->status);
        
        if($stmt->execute()){
            return true;
        }
        
        return false;
    }
    
    public function update() {
        $query = "UPDATE " . $this->table . " 
                  SET pasien_id = :pasien_id, obat_id = :obat_id, waktu_konsumsi = :waktu_konsumsi, 
                      frekuensi = :frekuensi, tanggal_mulai = :tanggal_mulai, tanggal_selesai = :tanggal_selesai, 
                      status = :status
                  WHERE id = :id";
        $stmt = $this->db->prepare($query);
        
        // Sanitasi input
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->pasien_id = htmlspecialchars(strip_tags($this->pasien_id));
        $this->obat_id = htmlspecialchars(strip_tags($this->obat_id));
        $this->waktu_konsumsi = htmlspecialchars(strip_tags($this->waktu_konsumsi));
        $this->frekuensi = htmlspecialchars(strip_tags($this->frekuensi));
        $this->tanggal_mulai = htmlspecialchars(strip_tags($this->tanggal_mulai));
        $this->tanggal_selesai = htmlspecialchars(strip_tags($this->tanggal_selesai));
        $this->status = htmlspecialchars(strip_tags($this->status));
        
        // Binding parameter
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':pasien_id', $this->pasien_id);
        $stmt->bindParam(':obat_id', $this->obat_id);
        $stmt->bindParam(':waktu_konsumsi', $this->waktu_konsumsi);
        $stmt->bindParam(':frekuensi', $this->frekuensi);
        $stmt->bindParam(':tanggal_mulai', $this->tanggal_mulai);
        $stmt->bindParam(':tanggal_selesai', $this->tanggal_selesai);
        $stmt->bindParam(':status', $this->status);
        
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