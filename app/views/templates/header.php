<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman <?= $data['judul'] ?></title>
    <link rel="shortcut icon" href="<?= BASEURL ?>/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?= BASEURL ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASEURL ?>/css/all.min.css">
    <link rel="stylesheet" href="<?= BASEURL ?>/css/style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="<?= BASEURL ?>">COBAN BINANGUN</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="<?= BASEURL ?>">Tiket</a>
                    <a class="nav-item nav-link" href="<?= BASEURL ?>/mahasiswa">Laporan</a>
                    <a class="nav-item nav-link" href="<?= BASEURL ?>/about">About</a>
                </div>
            </div>
        </div>
    </nav>