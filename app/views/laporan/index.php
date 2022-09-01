<?php 
function money_format($string, $angka) {
    $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
	return $hasil_rupiah;
}
setlocale(LC_MONETARY,"id_ID");
?>
<!-- FIXME: atur layout biar cantik dan enak dipandang -->
<div class="container bg-light bg-opacity-50 rounded-4 mt-3">
    <div class="row justify-content-center">
        <div class="col-sm-6 mt-3">
            <?php Flasher::flash() ?>
        </div>
    </div>
    <!-- Card -->
    <div class="row my-4 text-white justify-content-evenly">
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
    <!-- Pagination -->
    <div class="row">
        <div class="col-sm-12">
            <?php $jmlhHal = ceil($data['jmlhData'] / 20) ?>
            <?php $hal = $data['page']/20+1?>
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <li class="page-item <?php if ($hal==1) { echo 'disabled'; } ?>">
                        <a class="page-link" href="<?= BASEURL ?>/laporan/index/<?= $hal-1 ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="visually-hidden">Previous</span>
                        </a>
                    </li>
                    <?php for ($i=1; $i <= $jmlhHal; $i++) :?>
                        <?php if ($i==$hal) : ?>
                            <li class="page-item active"><a class="page-link" href="<?= BASEURL ?>/laporan/index/<?= $i ?>"><?= $i ?></a></li>
                        <?php else : ?>
                            <li class="page-item"><a class="page-link" href="<?= BASEURL ?>/laporan/index/<?= $i ?>"><?= $i ?></a></li>
                        <?php endif ?>
                    <?php endfor ?>
                    <li class="page-item <?php if ($hal==$jmlhHal) { echo 'disabled'; } ?>">
                        <a class="page-link" href="<?= BASEURL ?>/laporan/index/<?= $hal+1 ?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="visually-hidden">Next</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- End Pagination -->
    <div class="row mx-3 px-5">
        <div class="col-sm-6">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahTransaksi">
                <i class="fas fa-plus"></i> Tambah Transaksi
            </button>
        </div>
    </div>
    <div class="row">
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
                    <?php $batas = $data['page'] + 20 ?>
                    <?php for ($i=$data['page']; $i < $batas; $i++) : ?>
                        <?php if (isset($data['transaksi'][$i])) : ?>
                            <tr>
                                <td scope="row"><?= $i+1 ?></td>
                                <td><?= $data['transaksi'][$i]['tgl'] ?></td>
                                <td><?= $data['transaksi'][$i]['ket'] ?></td>
                                <td class="text-end"><?= money_format("%i", $data['transaksi'][$i]['jmlh']) ?></td>
                                <td><a href="<?= BASEURL ?>/laporan/ubah/<?= $data['transaksi'][$i]['id'] ?>" class="text-center ms-2"><i class="fas fa-pen text-success"></i></a>
                                    <a href="<?= BASEURL ?>/laporan/hapus/<?= $data['transaksi'][$i]['id'] ?>" class="text-center ms-2" onclick="return confirm('yakin?')"><i class="fas fa-trash text-danger"></i></a>
                                </td>
                            </tr>
                        <?php endif ?>
                    <?php endfor ?>
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