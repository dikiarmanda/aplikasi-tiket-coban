<?php 
function money_format($string, $angka) {
    $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
}
?>

<div class="container mt-3">
    <div class="row justify-content-center">
        <table class="table w-75">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Tanggal</th>
                    <th>Nominal</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 ?>
                <?php foreach ($data['jualTiket'] as $transaksi) : ?>
                <tr>
                    <td scope="row"><?= $i ?></td>
                    <td><?= $transaksi['tgl'] ?></td>
                    <td class="text-end pe-4"><?= $transaksi['jmlh'] ?></td>
                </tr>
                <?php $i++ ?>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>