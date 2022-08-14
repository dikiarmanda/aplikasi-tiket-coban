<div class="container mt-3">
    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash() ?>
        </div>
    </div>
    <!-- Card -->
    <div class="row text-white justify-content-evenly">
        <div class="card bg-danger mt-2" style="width: 18rem;">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-user-clock"></i>
                </div>
                <h5 class="card-title">PEMASUKAN</h5>
                <div class="display-4 fw-bold">1.200</div>
            </div>
        </div>
        <div class="card bg-success mt-2" style="width: 18rem;">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-book"></i>
                </div>
                <h5 class="card-title">PENGELUARAN</h5>
                <div class="display-4 fw-bold">136</div>
            </div>
        </div>
        <div class="card bg-info mt-2" style="width: 18rem;">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-user"></i>
                </div>
                <h5 class="card-title">SALDO</h5>
                <div class="display-4 fw-bold">100</div>
            </div>
        </div>
    </div>
    <!-- End Card -->
    <div class="row justify-content-center">
        <!-- FIXME: ubah ukuran button menjadi kecil di sebelah kiri -->
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary d-inline" data-bs-toggle="modal" data-bs-target="#tambahTransaksi">
            <i class="fas fa-plus"></i> Tambah Transaksi
        </button>
        <table class="table w-75">
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
                        <td class="text-end pe-4"><?= $transaksi['jmlh'] ?></td>
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