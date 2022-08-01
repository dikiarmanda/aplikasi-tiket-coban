<div class="container">
    <div class="row justify-content-center">
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
                    <td><a href="#" class="text-center"><i class="fas fa-trash text-danger"></i></a></td>
                </tr>
                <?php $i++ ?>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>