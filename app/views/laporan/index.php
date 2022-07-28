<table>
    <?php foreach ($data['transaksi'] as $transaksi) : ?>
    <tr>
        <td><?= $transaksi['tgl']?></td>
        <td><?= $transaksi['ket']?></td>
        <td><?= $transaksi['jmlh']?></td>
    </tr>
    <?php endforeach ?>
</table>