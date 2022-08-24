<div class="container bg-light bg-opacity-50 rounded-4 p-3 mt-5">
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
            <button class="btn btn-primary" type="submit" onclick="openInNewTab()">CETAK</button>
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