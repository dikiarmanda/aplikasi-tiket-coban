<?php 
function money_format($string, $angka) {
    $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
	return $hasil_rupiah;
}

$visit = [];
$profit = [];
for ($i=2021; $i <= end($data['thn']['list']); $i++) { 
    array_push($visit, $data['thn'][$i]['visitorThn']);
}
for ($i=2021; $i <= end($data['thn']['list']); $i++) { 
    array_push($profit, $data['thn'][$i]['tiketThn']);
}
while (count($visit) < 5) {
    array_push($visit, 0);
}
while (count($profit) < 5) {
    array_push($profit, 0);
}

$penjualan = 0;
for ($i=0; $i < count($data['jualTiket']); $i++) { 
    $penjualan += $data['jualTiket'][$i]['jmlh'];
}
?>

<div class="container bg-light rounded-4 pt-4 mt-3">
    <div class="row my-3">
        <h5>Jumlah Pengunjung: <?= count($data['jualTiket'])?></h5>
        <h5>Jumlah Penjualan Tiket: <?= money_format('%i', $penjualan) ?></h5>
    </div>
    <div class="row w-75 my-3 mx-auto">
        <canvas id="statVisit"></canvas>
    </div>
    <div class="row justify-content-center">
        <table class="table w-50">
            <thead>
                <tr>
                    <th>Tahun</th>
                    <th class="text-end">Jumlah Pengunjung</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['thn']['list'] as $list => $value) : ?>
                <tr>
                    <td scope="row"><a class="btn btn-primary" href="<?= BASEURL ?>/stats/tahun/<?= $data['thn']['list'][$list] ?>"><?= $data['thn']['list'][$list] ?></a></td>
                    <td class="text-end"><?= $visit[$list] ?> orang</td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <div class="row w-75 my-3 mx-auto">
        <canvas id="statTiket"></canvas>
    </div>
    <div class="row justify-content-center">
        <table class="table w-50">
            <thead>
                <tr>
                    <th>Tahun</th>
                    <th class="text-end">Jumlah Penjualan Tiket</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['thn']['list'] as $list => $value) : ?>
                <tr>
                    <td scope="row"><a class="btn btn-primary" href="<?= BASEURL ?>/stats/tahun/<?= $data['thn']['list'][$list] ?>"><?= $data['thn']['list'][$list] ?></a></td>
                    <td class="text-end"><?= money_format('%i', $profit[$list]) ?></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    let thnNow = moment().format('Y');
    const label = [];
    let rangeThn = [thnNow-1, <?= end($data['thn']['list']) ?>];
    for (let i = 0; i < 5; i++) {
        label[i] = thnNow-1;
        thnNow++;
    }
    let visit = [<?php foreach ($visit as $cek) {echo $cek; echo ',';} ?>];
    let profit = [<?php foreach ($profit as $cek) {echo $cek; echo ',';} ?>];
    // grafik visitor tahunan
    const ctx1 = document.getElementById('statVisit').getContext('2d');
    const statVisit = new Chart(ctx1, {
        type: 'line',
        data: {
            labels: label,
            datasets: [{
                label: 'Pengunjung',
                data: visit,
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
                borderWidth: 5,
                // tension: 0.1
            }]
        },
        options: {
            plugins: {
                title: {
                    display: true,
                    text: 'GRAFIK PENGUNJUNG TAHUNAN',
                    font: {
                        size: 36,
                    }
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
                data: profit,
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
                borderWidth: 5,
                // tension: 0.3
            }]
        },
        options: {
            plugins: {
                title: {
                    display: true,
                    text: 'GRAFIK PENJUALAN TIKET TAHUNAN',
                    font: {
                        size: 36,
                    }
                },
                legend: {
                    display: false,
                }
            },
        }
    });
</script>