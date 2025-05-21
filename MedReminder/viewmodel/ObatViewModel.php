<?php

require_once 'model/Obat.php';

class ObatViewModel {
    private $obatModel;
    
    // Data binding property
    public $obat;
    public $obatList = [];
    
    public function __construct() {
        $this->obatModel = new Obat();
        
        $this->obat = new Obat();
    }
    
    public function getObatList() {
        $result = $this->obatModel->getAll();
        $this->obatList = [];
        
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $this->obatList[] = $row;
        }
        
        return $this->obatList;
    }
    
    public function getObatById($id) {
        $result = $this->obatModel->getById($id);
        $this->obat = $result->fetch(PDO::FETCH_ASSOC);
        return $this->obat;
    }
    
    public function addObat($nama_obat, $deskripsi, $dosis) {
        $this->obatModel->nama_obat = $nama_obat;
        $this->obatModel->deskripsi = $deskripsi;
        $this->obatModel->dosis = $dosis;
        
        return $this->obatModel->create();
    }
    
    public function updateObat($id, $nama_obat, $deskripsi, $dosis) {
        $this->obatModel->id = $id;
        $this->obatModel->nama_obat = $nama_obat;
        $this->obatModel->deskripsi = $deskripsi;
        $this->obatModel->dosis = $dosis;
        
        return $this->obatModel->update();
    }
    
    public function deleteObat($id) {
        $this->obatModel->id = $id;
        return $this->obatModel->delete();
    }
    
    // Data binding methods
    public function bindObatData($id = null) {
        if ($id) {
            $this->getObatById($id);
        } else {
            $this->obat = [
                'id' => '',
                'nama_obat' => '',
                'deskripsi' => '',
                'dosis' => ''
            ];
        }
    }
}
?>