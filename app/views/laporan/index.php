<?php
function money_format($string, $angka)
{
    $hasil_rupiah = "Rp " . number_format($angka, 0, ',', '.');
    return $hasil_rupiah;
}
setlocale(LC_MONETARY, "id_ID");
?>
<div class="container bg-light bg-opacity-50 rounded-4 mt-3">
    <!-- notifikasi flasher -->
    <div class="row justify-content-center">
        <div class="col-sm-6 mt-3">
            <?php Flasher::flash() ?>
        </div>
    </div>
    <!-- Card -->
    <div class="row my-4 text-white justify-content-evenly">
        <div class="col-md-4 mb-4">
            <div class="card border-5 border-start border-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col me-2">
                            <div class="fw-bold text-primary text-uppercase mb-1">
                                Tiket Masuk</div>
                                <?php $saldo = $data['income']?>
                                <?php $tiketMasuk = $saldo * 50/100?>
                            <div class="h5 mb-0 fw-bold text-black"><?= money_format("%i", $tiketMasuk) ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-ticket fa-2x text-black opacity-25"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card border-5 border-start border-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                    <div class="col me-2">
                            <div class="fw-bold text-primary text-uppercase mb-1">
                                Kolam Renang</div>
                                <?php $kolamRenang = $saldo * 30/100?>
                            <div class="h5 mb-0 fw-bold text-black"><?= money_format("%i", $kolamRenang) ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-person-swimming fa-2x text-black opacity-25"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card border-5 border-start border-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col me-2">
                            <div class="fw-bold text-primary text-uppercase mb-1">
                                Saldo</div>
                            <div class="h5 mb-0 fw-bold text-black"><?= money_format("%i", $data['income']) ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar fa-2x text-black opacity-25"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Card -->
    <!-- Pagination -->
    <div class="row">
        <div class="col-sm-12">
            <?php $jmlhHal = ceil($data['jmlhData'] / 20) ?>
            <?php $hal = $data['page'] / 20 + 1 ?>
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <li class="page-item <?php if ($hal == 1) { echo 'disabled'; } ?>">
                        <a class="page-link" href="<?= BASEURL ?>/laporan/index/<?= $hal - 1 ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="visually-hidden">Previous</span>
                        </a>
                    </li>
                    <?php for ($i = 1; $i <= $jmlhHal; $i++) : ?>
                        <?php if ($i == $hal) : ?>
                            <li class="page-item active"><a class="page-link" href="<?= BASEURL ?>/laporan/index/<?= $i ?>"><?= $i ?></a></li>
                        <?php else : ?>
                            <li class="page-item"><a class="page-link" href="<?= BASEURL ?>/laporan/index/<?= $i ?>"><?= $i ?></a></li>
                        <?php endif ?>
                    <?php endfor ?>
                    <li class="page-item <?php if ($hal == $jmlhHal) { echo 'disabled'; } ?>">
                        <a class="page-link" href="<?= BASEURL ?>/laporan/index/<?= $hal + 1 ?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="visually-hidden">Next</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- End Pagination -->
    <div id="cek"></div>
    <div class="row mx-3 px-5">
        <div class="col-sm-6">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary tombolTambahData" data-bs-toggle="modal" data-bs-target="#formModal">
                <i class="fas fa-plus"></i> Tambah Transaksi
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 mt-4">
            <table class="table w-75 mb-5 mx-auto">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                        <th class="text-center">Nominal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $batas = $data['page'] + 20 ?>
                    <?php for ($i = $data['page']; $i < $batas; $i++) : ?>
                        <?php if (isset($data['transaksi'][$i])) : ?>
                            <tr>
                                <td scope="row"><?= $i + 1 ?></td>
                                <td><?= $data['transaksi'][$i]['tgl'] ?></td>
                                <td><?= $data['transaksi'][$i]['ket'] ?></td>
                                <td class="text-end pe-5"><?= money_format("%i", $data['transaksi'][$i]['jmlh']) ?></td>
                                <td><a href="<?= BASEURL ?>/laporan/ubah/<?= $data['transaksi'][$i]['id'] ?>" class="text-center ms-2 tampilModalUbah" data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?= $data['transaksi'][$i]['id'] ?>"><i class="fas fa-pen text-success"></i></a>
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
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModal">Tambah Transaksi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL ?>/laporan/tambah" method="POST">
                    <input type="hidden" name="id" id="id">
                    <div class="mb-3">
                        <label class="form-label" for="tgl">Tanggal</label>
                        <input type="date" name="tgl" id="tgl" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="ket" class="form-label">Keterangan</label>
                        <input type="text" name="ket" id="ket" class="form-control" value="tiket" required>
                    </div>
                    <div class="mb-3">
                        <label for="jmlh" class="form-label">Nominal</label>
                        <input type="number" name="jmlh" id="jmlh" class="form-control" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Tambah Transaksi</button>
                </form>
            </div>
        </div>
    </div>
</div>