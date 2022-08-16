<?php 
function money_format($string, $angka) {
    $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
	return $hasil_rupiah;
}
setlocale(LC_MONETARY,"id_ID");
?>

<div class="container mt-3">
    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash() ?>
        </div>
    </div>
    <!-- Card -->
    <div class="row text-white justify-content-evenly">
        <div class="card bg-success mt-2" style="width: 18rem;">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-user-clock"></i>
                </div>
                <h4 class="card-title">PEMASUKAN</h4>
                <h4 class="fw-bold mt-5"><?= money_format("%i", $data['income']) ?></h4>
            </div>
        </div>
        <div class="card bg-danger mt-2" style="width: 18rem;">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-book"></i>
                </div>
                <h4 class="card-title">PENGELUARAN</h4>
                <h4 class="fw-bold mt-5"><?= money_format("%i", $data['outcome']) ?></h4>
            </div>
        </div>
        <div class="card bg-info mt-2" style="width: 18rem;">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-user"></i>
                </div>
                <h4 class="card-title">SALDO</h4>
                <h4 class="fw-bold mt-5"><?= money_format("%i",$data['income']-$data['outcome']) ?></h4>
            </div>
        </div>
    </div>
    <!-- End Card -->
    <div class="row mt-5">
        <div class="col-sm-6">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahTransaksi">
                <i class="fas fa-plus"></i> Tambah Transaksi
            </button>
        </div>
        <div class="col-sm-6 pe-5">
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
        <div class="col-sm-12 mt-4">
            <table class="table w-75 mx-auto">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                        <th>Nominal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($data['transaksi'] as $transaksi) : ?>
                        <tr>
                            <td scope="row"><?= $i ?></td>
                            <td><?= $transaksi['tgl'] ?></td>
                            <td><?= $transaksi['ket'] ?></td>
                            <td class="text-end pe-4"><?= money_format("%i", $transaksi['jmlh']) ?></td>
                            <td><a href="<?= BASEURL ?>/laporan/ubah/<?= $transaksi['id'] ?>" class="text-center ms-2"><i class="fas fa-pen text-success"></i></a>
                                <a href="<?= BASEURL ?>/laporan/hapus/<?= $transaksi['id'] ?>" class="text-center ms-2" onclick="return confirm('yakin?')"><i class="fas fa-trash text-danger"></i></a>
                            </td>
                        </tr>
                        <?php $i++ ?>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="tambahTransaksi" tabindex="-1" role="dialog" aria-labelledby="judulTambah" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Transaksi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL ?>/laporan/tambah" method="POST">
                    <div class="mb-3">
                        <label class="form-label" for="tgl">Tanggal</label>
                        <input type="date" name="tgl" id="tgl" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="ket" class="form-label">Keterangan</label>
                        <input type="text" name="ket" id="ket" class="form-control" aria-describedby="helpId">
                    </div>
                    <div class="mb-3">
                        <label for="pemasukan">Jenis Transaksi</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jnsTrans" id="pemasukan" value="1">
                            <label class="form-check-label" for="pemasukan">Pemasukan</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jnsTrans" id="pengeluaran" value="0">
                            <label class="form-check-label" for="pengeluaran">Pengeluaran</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="jmlh" class="form-label">Nominal</label>
                        <input type="number" name="jmlh" id="jmlh" class="form-control" aria-describedby="helpId">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Tambah Transaksi</button>
                </form>
            </div>
        </div>
    </div>
</div>