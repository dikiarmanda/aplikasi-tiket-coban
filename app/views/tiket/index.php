<div class="container p-3 mt-5">
    <!-- FIXME: beri background pada form agar lebih terlihat jelas -->
    <form method="post">
    <div class="mb-3">
        <label for="hargaTiket" class="form-label">Harga Tiket</label>
        <input type="number" class="form-control" name="hargaTiket" id="hargaTiket" placeholder="Rp.5.000" value="<?= $data['hrgTiket'] ?>">
    </div>
    <div class="mb-3">
        <label for="jumlahTiket" class="form-label">Jumlah Tiket</label>
        <input type="number" class="form-control" name="jumlahTiket" id="jumlahTiket">
    </div>
    <div class="row">
        <div class="col-sm-4">
            <a href="<?= BASEURL ?>/tiket/cetak/<?= $_POST['hargaTiket'];?>/<?= $_POST['jumlahTiket'];?>" class="btn btn-primary" id="cetak" type="submit">CETAK</a>
        </div>
        <div class="col-sm-4 text-end">
            <h3>Total Harga :</h3>
        </div>
        <div class="col-sm-4 text-end">
            <h3 class="d-none d-inline text-bg-primary py-1 px-2 rounded-3" id="totalHarga"></h3>
        </div>
    </div>
    </form>
</div>