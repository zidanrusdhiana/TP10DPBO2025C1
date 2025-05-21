<?php 
$pageTitle = "Daftar Obat";
require_once 'views/template/header.php'; 
?>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Daftar Obat</h5>
        <a href="index.php?entity=obat&action=add" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-circle"></i> Tambah Obat
        </a>
    </div>
    <div class="card-body">
        <?php if (empty($obatList)): ?>
            <div class="alert alert-info">
                Belum ada data obat. Silahkan tambahkan obat baru.
            </div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Obat</th>
                            <th>Dosis</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        foreach ($obatList as $obat): 
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo htmlspecialchars($obat['nama_obat']); ?></td>
                            <td><?php echo htmlspecialchars($obat['dosis']); ?></td>
                            <td><?php echo htmlspecialchars($obat['deskripsi']); ?></td>
                            <td>
                                <a href="index.php?entity=obat&action=edit&id=<?php echo $obat['id']; ?>" class="btn btn-warning btn-sm" data-bs-toggle="tooltip" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <a href="index.php?entity=obat&action=delete&id=<?php echo $obat['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus obat ini?')" data-bs-toggle="tooltip" title="Hapus">
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