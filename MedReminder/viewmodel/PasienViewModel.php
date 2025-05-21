<?php

require_once 'model/Pasien.php';
require_once 'model/JadwalObat.php';

class PasienViewModel {
    private $pasienModel;
    private $jadwalModel;
    
    // Data binding property
    public $pasien;
    public $pasienList = [];
    public $jadwalObatPasien = [];
    
    public function __construct() {
        $this->pasienModel = new Pasien();
        $this->jadwalModel = new JadwalObat();
        
        $this->pasien = new Pasien();
    }
    
    public function getPasienList() {
        $result = $this->pasienModel->getAll();
        $this->pasienList = [];
        
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $this->pasienList[] = $row;
        }
        
        return $this->pasienList;
    }
    
    public function getPasienById($id) {
        $result = $this->pasienModel->getById($id);
        $this->pasien = $result->fetch(PDO::FETCH_ASSOC);
        return $this->pasien;
    }
    
    public function getJadwalObatByPasienId($pasienId) {
        $result = $this->jadwalModel->getByPasienId($pasienId);
        $this->jadwalObatPasien = [];
        
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $this->jadwalObatPasien[] = $row;
        }
        
        return $this->jadwalObatPasien;
    }
    
    public function addPasien($nama, $usia, $alamat, $no_telepon) {
        $this->pasienModel->nama = $nama;
        $this->pasienModel->usia = $usia;
        $this->pasienModel->alamat = $alamat;
        $this->pasienModel->no_telepon = $no_telepon;
        
        return $this->pasienModel->create();
    }
    
    public function updatePasien($id, $nama, $usia, $alamat, $no_telepon) {
        $this->pasienModel->id = $id;
        $this->pasienModel->nama = $nama;
        $this->pasienModel->usia = $usia;
        $this->pasienModel->alamat = $alamat;
        $this->pasienModel->no_telepon = $no_telepon;
        
        return $this->pasienModel->update();
    }
    
    public function deletePasien($id) {
        $this->pasienModel->id = $id;
        return $this->pasienModel->delete();
    }
    
    // Data binding methods
    public function bindPasienData($id = null) {
        if ($id) {
            $this->getPasienById($id);
        } else {
            $this->pasien = [
                'id' => '',
                'nama' => '',
                'usia' => '',
                'alamat' => '',
                'no_telepon' => ''
            ];
        }
    }
}
?>