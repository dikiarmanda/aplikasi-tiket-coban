<?php 
function money_format($string, $angka) {
    $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
	return $hasil_rupiah;
}
?>

<div class="container bg-light rounded-4 pt-4 mt-3">
    <div class="row w-75 my-3 mx-auto">
        <canvas id="statVisit"></canvas>
    </div>
    <div class="row w-75 my-3 mx-auto">
        <canvas id="statTiket"></canvas>
    </div>
    <div class="row justify-content-center">
        <!-- FIXME: atur tampilan jumlah pengunjung dan penjualan tiket -->
        
        <p>Jumlah Pengunjung: <?= var_dump($data['thn'])?></p>
        <?php $penjualan = 0 ?>
        <?php foreach ($data['jualTiket'] as $transaksi) : ?>
            <?php $penjualan += $transaksi['jmlh']?>
        <?php endforeach ?>
        <h5><p>Jumlah Penjualan Tiket: <?= money_format('%i', $penjualan) ?></p></h5>
        <table class="table w-75">
            <thead>
                <tr>
                    <th>Tahun</th>
                    <th>Jumlah Pengunjung</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['jualTiket'] as $transaksi) : ?>
                <tr>
                    <td scope="row"><?= $transaksi['tgl'] ?></td>
                    <td class="text-end pe-4"><?= money_format('%i', $transaksi['jmlh']) ?></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    let thnNow = moment().format('Y');
    let rangeThn = [2021, <?= end($data['thn']['list']); ?>];
    const label = [];
    console.log(label);
    for (let i = 0; i < 5; i++) {
        label[i] = thnNow-1;
        thnNow++;
    }
    let dataThn = {};

    let batas = rangeThn[1];
    for (let i = 2021; i <= batas; i++) {
        dataThn[i][visitor] = <?= $data['thn']?>
    }

    // grafik visitor tahunan
    const ctx1 = document.getElementById('statVisit').getContext('2d');
    const statVisit = new Chart(ctx1, {
        type: 'line',
        data: {
            labels: label,
            datasets: [{
                label: 'Pengunjung',
                data: [1,2,3,4,5],
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
            plugins: {
                title: {
                    display: true,
                    text: 'GRAFIK PENGUNJUNG TAHUNAN',
                    fullsize: true,
                },
                legend: {
                    display: false,
                }
            },
        }
    });

    // grafik tiket tahunan
    const ctx2 = document.getElementById('statTiket').getContext('2d');
    const statTiket = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: label,
            datasets: [{
                label: 'Penjualan Tiket',
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
            plugins: {
                title: {
                    display: true,
                    text: 'GRAFIK PENJUALAN TIKET TAHUNAN',
                    fullsize: true,
                },
                legend: {
                    display: false,
                }
            },
        }
    });
</script>