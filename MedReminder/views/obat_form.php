<?php 
$isEdit = isset($viewModel->obat['id']) && !empty($viewModel->obat['id']);
$pageTitle = $isEdit ? "Edit Obat" : "Tambah Obat";
require_once 'views/template/header.php'; 
?>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0"><?php echo $pageTitle; ?></h5>
    </div>
    <div class="card-body">
        <form action="index.php?entity=obat&action=<?php echo $isEdit ? 'update&id='.$viewModel->obat['id'] : 'save'; ?>" method="post">
            <div class="mb-3">
                <label for="nama_obat" class="form-label">Nama Obat</label>
                <input type="text" class="form-control" id="nama_obat" name="nama_obat" value="<?php echo htmlspecialchars($viewModel->obat['nama_obat'] ?? ''); ?>" required>
            </div>
            
            <div class="mb-3">
                <label for="dosis" class="form-label">Dosis</label>
                <input type="text" class="form-control" id="dosis" name="dosis" value="<?php echo htmlspecialchars($viewModel->obat['dosis'] ?? ''); ?>" required>
            </div>
            
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required><?php echo htmlspecialchars($viewModel->obat['deskripsi'] ?? ''); ?></textarea>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="index.php?entity=obat" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
<?php require_once 'views/template/footer.php'; ?>