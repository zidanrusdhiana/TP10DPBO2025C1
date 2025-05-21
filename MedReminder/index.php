<?php
require_once 'viewmodel/PasienViewModel.php';
require_once 'viewmodel/ObatViewModel.php';
require_once 'viewmodel/JadwalObatViewModel.php';

$entity = isset($_GET['entity']) ? $_GET['entity'] : 'pasien';
$action = isset($_GET['action']) ? $_GET['action'] : 'list';

if ($entity == 'pasien') {
    $viewModel = new PasienViewModel();
    if ($action == 'list') {
        $pasienList = $viewModel->getPasienList();
        require_once 'views/pasien_list.php';
    } elseif ($action == 'add') {
        $viewModel->bindPasienData();
        require_once 'views/pasien_form.php';
    } elseif ($action == 'edit') {
        $viewModel->bindPasienData($_GET['id']);
        require_once 'views/pasien_form.php';
    } elseif ($action == 'save') {
        $viewModel->addPasien($_POST['nama'], $_POST['usia'], $_POST['alamat'], $_POST['no_telepon']);
        header('Location: index.php?entity=pasien');
    } elseif ($action == 'update') {
        $viewModel->updatePasien($_GET['id'], $_POST['nama'], $_POST['usia'], $_POST['alamat'], $_POST['no_telepon']);
        header('Location: index.php?entity=pasien');
    } elseif ($action == 'delete') {
        $viewModel->deletePasien($_GET['id']);
        header('Location: index.php?entity=pasien');
    } elseif ($action == 'detail') {
        $pasien = $viewModel->getPasienById($_GET['id']);
        $jadwalObatPasien = $viewModel->getJadwalObatByPasienId($_GET['id']);
        require_once 'views/pasien_detail.php';
    }
} elseif ($entity == 'obat') {
    $viewModel = new ObatViewModel();
    if ($action == 'list') {
        $obatList = $viewModel->getObatList();
        require_once 'views/obat_list.php';
    } elseif ($action == 'add') {
        $viewModel->bindObatData();
        require_once 'views/obat_form.php';
    } elseif ($action == 'edit') {
        $viewModel->bindObatData($_GET['id']);
        require_once 'views/obat_form.php';
    } elseif ($action == 'save') {
        $viewModel->addObat($_POST['nama_obat'], $_POST['deskripsi'], $_POST['dosis']);
        header('Location: index.php?entity=obat');
    } elseif ($action == 'update') {
        $viewModel->updateObat($_GET['id'], $_POST['nama_obat'], $_POST['deskripsi'], $_POST['dosis']);
        header('Location: index.php?entity=obat');
    } elseif ($action == 'delete') {
        $viewModel->deleteObat($_GET['id']);
        header('Location: index.php?entity=obat');
    }
} elseif ($entity == 'jadwal') {
    $viewModel = new JadwalObatViewModel();
    if ($action == 'list') {
        $jadwalList = $viewModel->getJadwalList();
        require_once 'views/jadwal_list.php';
    } elseif ($action == 'add') {
        $viewModel->bindJadwalData();
        $pasienList = $viewModel->getPasienList();
        $obatList = $viewModel->getObatList();
        require_once 'views/jadwal_form.php';
    } elseif ($action == 'edit') {
        $viewModel->bindJadwalData($_GET['id']);
        $pasienList = $viewModel->getPasienList();
        $obatList = $viewModel->getObatList();
        require_once 'views/jadwal_form.php';
    } elseif ($action == 'save') {
        $viewModel->addJadwal(
            $_POST['pasien_id'], 
            $_POST['obat_id'], 
            $_POST['waktu_konsumsi'], 
            $_POST['frekuensi'], 
            $_POST['tanggal_mulai'], 
            $_POST['tanggal_selesai'], 
            $_POST['status']
        );
        header('Location: index.php?entity=jadwal');
    } elseif ($action == 'update') {
        $viewModel->updateJadwal(
            $_GET['id'],
            $_POST['pasien_id'], 
            $_POST['obat_id'], 
            $_POST['waktu_konsumsi'], 
            $_POST['frekuensi'], 
            $_POST['tanggal_mulai'], 
            $_POST['tanggal_selesai'], 
            $_POST['status']
        );
        header('Location: index.php?entity=jadwal');
    } elseif ($action == 'delete') {
        $viewModel->deleteJadwal($_GET['id']);
        header('Location: index.php?entity=jadwal');
    }
}
?>