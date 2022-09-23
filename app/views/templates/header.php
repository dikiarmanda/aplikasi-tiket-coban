<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman <?= $data['judul'] ?></title>
    <!-- FIXME: tambahkan icon untuk title website -->
    <link rel="shortcut icon" href="<?= BASEURL ?>/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?= BASEURL ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASEURL ?>/css/all.min.css">
    <link rel="stylesheet" href="<?= BASEURL ?>/css/style.css">
    <script src="<?= BASEURL ?>/js/chart.js"></script>
    <script src="<?= BASEURL ?>/js/moment.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= BASEURL ?>">Coban Binangun</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASEURL ?>/tiket">Tiket</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASEURL ?>/laporan">Laporan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASEURL ?>/stats">Statistik</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>