<?php 
function money_format($string, $angka) {
    $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
	return $hasil_rupiah;
}
?>

<div class="container bg-light bg-opacity-50 rounded-4 mt-3">
    <div class="row justify-content-center">
        <!-- FIXME: atur tampilan jumlah pengunjung dan penjualan tiket -->
        <?= var_dump($data['jualTiket'])?>
        <hr>
        <?= var_dump($data['tanggal'])?>
        <p>Jumlah Pengunjung: <?= count($data['jualTiket'])?></p>
        <?php $penjualan = 0 ?>
        <?php foreach ($data['jualTiket'] as $transaksi) : ?>
            <?php $penjualan += $transaksi['jmlh']?>
        <?php endforeach ?>
        <p>Jumlah Penjualan Tiket: <?= money_format('%i', $penjualan) ?></p>
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
                    <td class="text-end pe-4"><?= money_format('%i', $transaksi['jmlh']) ?></td>
                </tr>
                <?php $i++ ?>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
