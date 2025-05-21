<?php 
$isEdit = isset($viewModel->jadwal['id']) && !empty($viewModel->jadwal['id']);
$pageTitle = $isEdit ? "Edit Jadwal Obat" : "Tambah Jadwal Obat";
require_once 'views/template/header.php'; 
?>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0"><?php echo $pageTitle; ?></h5>
    </div>
    <div class="card-body">
        <form action="index.php?entity=jadwal&action=<?php echo $isEdit ? 'update&id='.$viewModel->jadwal['id'] : 'save'; ?>" method="post">
            <div class="mb-3">
                <label for="pasien_id" class="form-label">Nama Pasien</label>
                <select class="form-select" id="pasien_id" name="pasien_id" required>
                    <option value="">-- Pilih Pasien --</option>
                    <?php foreach ($viewModel->getPasienList() as $pasien): ?>
                        <option value="<?php echo $pasien['id']; ?>" <?php echo (isset($viewModel->jadwal['pasien_id']) && $viewModel->jadwal['pasien_id'] == $pasien['id']) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($pasien['nama']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="obat_id" class="form-label">Nama Obat</label>
                <select class="form-select" id="obat_id" name="obat_id" required>
                    <option value="">-- Pilih Obat --</option>
                    <?php foreach ($viewModel->getObatList() as $obat): ?>
                        <option value="<?php echo $obat['id']; ?>" <?php echo (isset($viewModel->jadwal['obat_id']) && $viewModel->jadwal['obat_id'] == $obat['id']) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($obat['nama_obat']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="waktu_konsumsi" class="form-label">Waktu Konsumsi</label>
                <input type="text" class="form-control" id="waktu_konsumsi" name="waktu_konsumsi" value="<?php echo htmlspecialchars($viewModel->jadwal['waktu_konsumsi'] ?? ''); ?>" required>
                <div class="form-text">Contoh: Pagi, Siang, Malam</div>
            </div>
            <div class="mb-3">
                <label for="frekuensi" class="form-label">Frekuensi</label>
                <input type="text" class="form-control" id="frekuensi" name="frekuensi" value="<?php echo htmlspecialchars($viewModel->jadwal['frekuensi'] ?? ''); ?>" required>
                <div class="form-text">Contoh: 2x sehari</div>
            </div>
            <div class="mb-3">
                <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" value="<?php echo htmlspecialchars($viewModel->jadwal['tanggal_mulai'] ?? ''); ?>" required>
            </div>
            <div class="mb-3">
                <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
                <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai" value="<?php echo htmlspecialchars($viewModel->jadwal['tanggal_selesai'] ?? ''); ?>" required>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" id="status" name="status" required>
                    <option value="Aktif" <?php echo (isset($viewModel->jadwal['status']) && $viewModel->jadwal['status'] == 'Aktif') ? 'selected' : ''; ?>>Aktif</option>
                    <option value="Tidak Aktif" <?php echo (isset($viewModel->jadwal['status']) && $viewModel->jadwal['status'] == 'Tidak Aktif') ? 'selected' : ''; ?>>Tidak Aktif</option>
                </select>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="index.php?entity=jadwal" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>

<?php require_once 'views/template/footer.php'; ?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        bindData(document.getElementById('waktu_konsumsi'), document.getElementById('waktu-konsumsi-preview'));
        bindData(document.getElementById('frekuensi'), document.getElementById('frekuensi-preview'));
        bindData(document.getElementById('tanggal_mulai'), document.getElementById('tanggal-mulai-preview'));
        bindData(document.getElementById('tanggal_selesai'), document.getElementById('tanggal-selesai-preview'));
    });
</script>
