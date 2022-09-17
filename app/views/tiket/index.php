<div class="container bg-light bg-opacity-50 rounded-4 p-3 mt-5">
    <!-- notifikasi flasher -->
    <div class="row justify-content-center">
        <div class="col-sm-6 mt-3">
            <?php Flasher::flash() ?>
        </div>
    </div>
    <form action="<?= BASEURL ?>/tiket/cetak/" method="post">
        <input type="hidden" name="tgl" value="<?= date('Y-m-d') ?>">
        <input type="hidden" name="ket" value="tiket">
        <div class="mb-3">
            <label for="hargaTiket" class="form-label">Harga Tiket</label>
            <input type="number" class="form-control" name="hargaTiket" id="hargaTiket" placeholder="Rp.5.000" value="<?= $data['hrgTiket'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="jumlahTiket" class="form-label">Jumlah Tiket</label>
            <input type="number" class="form-control" name="jumlahTiket" id="jumlahTiket" required>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <button class="btn btn-primary" type="submit">CETAK</button>
            </div>
            <div class="col-sm-4 text-end">
                <h3>Total Harga :</h3>
            </div>
            <div class="col-sm-4 text-end">
                <h3 class="d-none d-inline text-bg-primary bg-opacity-100 py-1 px-2 rounded-3" id="totalHarga"></h3>
            </div>
        </div>
    </form>
</div>
<!-- Modal trigger button -->
<button type="button" id="btnTiket" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalTiket">
    Harga Tiket
</button>

<!-- Modal Body -->
<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div class="modal fade" id="modalTiket" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalJdlTiket" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalJdlTiket">Ubah Harga Tiket</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL ?>/tiket/harga" method="post">
                <div class="mb-3">
                    <label for="hargaTiket" class="form-label">Harga Tiket</label>
                    <input type="number" name="hargaTiket" id="hargaTiket" class="form-control" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    const myModal = new bootstrap.Modal(document.getElementById('modalTiket'), options)
</script>