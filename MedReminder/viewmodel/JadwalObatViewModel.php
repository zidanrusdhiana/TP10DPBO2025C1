<?php

require_once 'model/JadwalObat.php';
require_once 'model/Pasien.php';
require_once 'model/Obat.php';

class JadwalObatViewModel {
    private $jadwalModel;
    private $pasienModel;
    private $obatModel;
    
    // Data binding property
    public $jadwal;
    public $jadwalList = [];
    public $pasienList = [];
    public $obatList = [];
    
    public function __construct() {
        $this->jadwalModel = new JadwalObat();
        $this->pasienModel = new Pasien();
        $this->obatModel = new Obat();
        
        $this->jadwal = new JadwalObat();
    }
    
    public function getJadwalList() {
        $result = $this->jadwalModel->getAll();
        $this->jadwalList = [];
        
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $this->jadwalList[] = $row;
        }
        
        return $this->jadwalList;
    }
    
    public function getJadwalById($id) {
        $result = $this->jadwalModel->getById($id);
        $this->jadwal = $result->fetch(PDO::FETCH_ASSOC);
        return $this->jadwal;
    }
    
    public function getPasienList() {
        $result = $this->pasienModel->getAll();
        $this->pasienList = [];
        
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $this->pasienList[] = $row;
        }
        
        return $this->pasienList;
    }
    
    public function getObatList() {
        $result = $this->obatModel->getAll();
        $this->obatList = [];
        
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $this->obatList[] = $row;
        }
        
        return $this->obatList;
    }
    
    public function addJadwal($pasien_id, $obat_id, $waktu_konsumsi, $frekuensi, $tanggal_mulai, $tanggal_selesai, $status = 'Aktif') {
        $this->jadwalModel->pasien_id = $pasien_id;
        $this->jadwalModel->obat_id = $obat_id;
        $this->jadwalModel->waktu_konsumsi = $waktu_konsumsi;
        $this->jadwalModel->frekuensi = $frekuensi;
        $this->jadwalModel->tanggal_mulai = $tanggal_mulai;
        $this->jadwalModel->tanggal_selesai = $tanggal_selesai;
        $this->jadwalModel->status = $status;
        
        return $this->jadwalModel->create();
    }
    
    public function updateJadwal($id, $pasien_id, $obat_id, $waktu_konsumsi, $frekuensi, $tanggal_mulai, $tanggal_selesai, $status) {
        $this->jadwalModel->id = $id;
        $this->jadwalModel->pasien_id = $pasien_id;
        $this->jadwalModel->obat_id = $obat_id;
        $this->jadwalModel->waktu_konsumsi = $waktu_konsumsi;
        $this->jadwalModel->frekuensi = $frekuensi;
        $this->jadwalModel->tanggal_mulai = $tanggal_mulai;
        $this->jadwalModel->tanggal_selesai = $tanggal_selesai;
        $this->jadwalModel->status = $status;
        
        return $this->jadwalModel->update();
    }
    
    public function deleteJadwal($id) {
        $this->jadwalModel->id = $id;
        return $this->jadwalModel->delete();

    }
    // Data binding methods
    public function bindJadwalData($id = null) {
        if ($id) {
            $this->getJadwalById($id);
        } else {
            $this->jadwal = [
                'id' => '',
                'pasien_id' => '',
                'obat_id' => '',
                'waktu_konsumsi' => '',
                'frekuensi' => '',
                'tanggal_mulai' => date('Y-m-d'),
                'tanggal_selesai' => date('Y-m-d', strtotime('+7 days')),
                'status' => 'Aktif'
            ];
        }
    }
}
