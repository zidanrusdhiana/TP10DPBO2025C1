<?php 
$pageTitle = "Detail Pasien";
require_once 'views/template/header.php'; 
?>

<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Detail Pasien</h5>
        <a href="index.php?entity=pasien" class="btn btn-secondary btn-sm">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <p><strong>Nama:</strong> <?php echo htmlspecialchars($pasien['nama']); ?></p>
                <p><strong>Usia:</strong> <?php echo htmlspecialchars($pasien['usia']); ?> tahun</p>
            </div>
            <div class="col-md-6">
                <p><strong>Alamat:</strong> <?php echo htmlspecialchars($pasien['alamat']); ?></p>
                <p><strong>No. Telepon:</strong> <?php echo htmlspecialchars($pasien['no_telepon']); ?></p>
            </div>
        </div>
        <div class="mt-3">
            <a href="index.php?entity=pasien&action=edit&id=<?php echo $pasien['id']; ?>" class="btn btn-warning">
                <i class="bi bi-pencil"></i> Edit
            </a>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Jadwal Obat Pasien</h5>
        <a href="index.php?entity=jadwal&action=add" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-circle"></i> Tambah Jadwal
        </a>
    </div>
    <div class="card-body">
        <?php if (empty($jadwalObatPasien)): ?>
            <div class="alert alert-info">
                Belum ada jadwal obat untuk pasien ini.
            </div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Obat</th>
                            <th>Waktu Konsumsi</th>
                            <th>Frekuensi</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        foreach ($jadwalObatPasien as $jadwal): 
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo htmlspecialchars($jadwal['nama_obat']); ?></td>
                            <td><?php echo htmlspecialchars($jadwal['waktu_konsumsi']); ?></td>
                            <td><?php echo htmlspecialchars($jadwal['frekuensi']); ?></td>
                            <td><?php echo date('d-m-Y', strtotime($jadwal['tanggal_mulai'])); ?></td>
                            <td><?php echo date('d-m-Y', strtotime($jadwal['tanggal_selesai'])); ?></td>
                            <td>
                                <span class="badge bg-<?php echo ($jadwal['status'] == 'Aktif') ? 'success' : 'danger'; ?>">
                                    <?php echo htmlspecialchars($jadwal['status']); ?>
                                </span>
                            </td>
                            <td>
                                <a href="index.php?entity=jadwal&action=edit&id=<?php echo $jadwal['id']; ?>" class="btn btn-warning btn-sm" data-bs-toggle="tooltip" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <a href="index.php?entity=jadwal&action=delete&id=<?php echo $jadwal['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus jadwal ini?')" data-bs-toggle="tooltip" title="Hapus">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php require_once 'views/template/footer.php'; ?>