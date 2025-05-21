<?php 
$pageTitle = "Daftar Pasien";
require_once 'views/template/header.php'; 
?>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Daftar Pasien</h5>
        <a href="index.php?entity=pasien&action=add" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-circle"></i> Tambah Pasien
        </a>
    </div>
    <div class="card-body">
        <?php if (empty($pasienList)): ?>
            <div class="alert alert-info">
                Belum ada data pasien. Silahkan tambahkan pasien baru.
            </div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Usia</th>
                            <th>Alamat</th>
                            <th>No. Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        foreach ($pasienList as $pasien): 
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo htmlspecialchars($pasien['nama']); ?></td>
                            <td><?php echo htmlspecialchars($pasien['usia']); ?> tahun</td>
                            <td><?php echo htmlspecialchars($pasien['alamat']); ?></td>
                            <td><?php echo htmlspecialchars($pasien['no_telepon']); ?></td>
                            <td>
                                <a href="index.php?entity=pasien&action=detail&id=<?php echo $pasien['id']; ?>" class="btn btn-info btn-sm" data-bs-toggle="tooltip" title="Detail">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="index.php?entity=pasien&action=edit&id=<?php echo $pasien['id']; ?>" class="btn btn-warning btn-sm" data-bs-toggle="tooltip" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <a href="index.php?entity=pasien&action=delete&id=<?php echo $pasien['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus pasien ini?')" data-bs-toggle="tooltip" title="Hapus">
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