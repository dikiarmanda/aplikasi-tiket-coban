<div class="container mt-3">
    <div class="mb-3">
        <label for="hargaTiket" class="form-label">Harga Tiket</label>
        <input type="number" class="form-control" name="hargaTiket" id="hargaTiket" placeholder="Rp.5.000" value="<?= $data['hrgTiket'] ?>">
    </div>
    <div class="mb-3">
        <label for="jumlahTiket" class="form-label">Jumlah Tiket</label>
        <input type="number" class="form-control" name="jumlahTiket" id="jumlahTiket">
    </div>
    <div class="row">
        <div class="col-sm-6">
            <a href="#" class="btn btn-primary" id="cetak" type="submit">CETAK</a>
        </div>
        <div class="col-sm-6 text-end">
            <h1 class="d-none d-inline text-bg-primary py-1 px-2 rounded-3" id="totalHarga"></h1>
        </div>
    </div>
</div>