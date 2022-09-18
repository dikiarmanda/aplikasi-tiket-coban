<?php 
function money_format($string, $angka) {
    $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
	return $hasil_rupiah;
}
?>

<div class="container bg-light bg-opacity-50 rounded-4 mt-3">
    <div class="row justify-content-center">
        <!-- FIXME: atur tampilan jumlah pengunjung dan penjualan tiket -->
        
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
    <div>
        <canvas id="myChart" width="200px"></canvas>
    </div>
</div>
<?php $tahun = [2020, 2021, 2022, 2023, 2024, 2025]?>
<script>
    const ctx = document.getElementById('myChart').getContext('2d');
    const label = <?= $tahun ?>;
    const myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: label,
            datasets: [{
                label: 'Tahun',
                data: [120, 190, 130, 230, 220, 330],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            xAxisID: 'Jumlah'
        }
    });
</script>
