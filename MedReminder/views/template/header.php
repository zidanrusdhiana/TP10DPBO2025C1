<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal & Pengingat Obat</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        .navbar-brand {
            font-weight: bold;
        }
        .content {
            padding: 20px 0;
        }
        .card {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="index.php">MedReminder</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($entity == 'pasien') ? 'active' : ''; ?>" href="index.php?entity=pasien">Pasien</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($entity == 'obat') ? 'active' : ''; ?>" href="index.php?entity=obat">Obat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($entity == 'jadwal') ? 'active' : ''; ?>" href="index.php?entity=jadwal">Jadwal Obat</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container content">
        <?php if (isset($pageTitle)): ?>
            <h2 class="mb-4"><?php echo $pageTitle; ?></h2>
        <?php endif; ?>