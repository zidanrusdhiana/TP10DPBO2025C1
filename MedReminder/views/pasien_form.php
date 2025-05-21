<?php 
$isEdit = isset($viewModel->pasien['id']) && !empty($viewModel->pasien['id']);
$pageTitle = $isEdit ? "Edit Pasien" : "Tambah Pasien";
require_once 'views/template/header.php'; 
?>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0"><?php echo $pageTitle; ?></h5>
    </div>
    <div class="card-body">
        <form action="index.php?entity=pasien&action=<?php echo $isEdit ? 'update&id='.$viewModel->pasien['id'] : 'save'; ?>" method="post">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Pasien</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo htmlspecialchars($viewModel->pasien['nama'] ?? ''); ?>" required>
            </div>
            
            <div class="mb-3">
                <label for="usia" class="form-label">Usia</label>
                <input type="number" class="form-control" id="usia" name="usia" value="<?php echo htmlspecialchars($viewModel->pasien['usia'] ?? ''); ?>" required>
            </div>
            
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3" required><?php echo htmlspecialchars($viewModel->pasien['alamat'] ?? ''); ?></textarea>
            </div>
            
            <div class="mb-3">
                <label for="no_telepon" class="form-label">No. Telepon</label>
                <input type="text" class="form-control" id="no_telepon" name="no_telepon" value="<?php echo htmlspecialchars($viewModel->pasien['no_telepon'] ?? ''); ?>" required>

            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="index.php?entity=pasien" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>

<?php require_once 'views/template/footer.php'; ?>