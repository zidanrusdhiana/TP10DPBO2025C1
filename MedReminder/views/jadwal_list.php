<?php
$pageTitle = "Jadwal Obat Pasien";
require_once 'views/template/header.php';
?>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Jadwal Obat Pasien</h5>
        <a href="index.php?entity=jadwal&action=add" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-circle"></i> Tambah Jadwal
        </a>
    </div>
    <div class="card-body">
        <?php if (empty($jadwalList)): ?>
            <div class="alert alert-info">
                Belum ada data jadwal obat. Silahkan tambahkan jadwal baru.
            </div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pasien</th>
                            <th>Nama Obat</th>
                            <th>Waktu</th>
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
                        foreach ($jadwalList as $jadwal): 
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo htmlspecialchars($jadwal['nama_pasien']); ?></td>
                            <td><?php echo htmlspecialchars($jadwal['nama_obat']); ?></td>
                            <td><?php echo htmlspecialchars($jadwal['waktu_konsumsi']); ?></td>
                            <td><?php echo htmlspecialchars($jadwal['frekuensi']); ?></td>
                            <td><?php echo htmlspecialchars($jadwal['tanggal_mulai']); ?></td>
                            <td><?php echo htmlspecialchars($jadwal['tanggal_selesai']); ?></td>
                            <td>
                                <?php if ($jadwal['status'] == 'Aktif'): ?>
                                    <span class="badge bg-success">Aktif</span>
                                <?php else: ?>
                                    <span class="badge bg-secondary">Tidak Aktif</span>
                                <?php endif; ?>
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

