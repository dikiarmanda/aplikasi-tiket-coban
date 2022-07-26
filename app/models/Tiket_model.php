<?php 
// reference the Dompdf namespace
use Dompdf\Dompdf;
use Dompdf\Options;

class Tiket_model {
    private $table = 'config';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getTiket() {
        $this->db->query('SELECT hargaTiket FROM ' . $this->table);
        return $this->db->single();
    }

    public function tambahTiket($data) {
        $query = "INSERT INTO transaksi VALUES
                    ('',:tgl,:ket,:jmlh)";

        $this->db->query($query);
        $this->db->bind('tgl', $data['tgl']);
        $this->db->bind('ket', $data['ket']);
        $this->db->bind('jmlh', $data['hargaTiket']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function cetakTiket($data) {
        $options = new Options();
        $options->set('isJavascriptEnabled', true);
        $options->set('isRemoteEnabled', true);
        $options->set('enable_html5_parser',true);
        $dompdf = new Dompdf($options);
        // set ukuran kertas
        $customPaper = array(0,0,164.40948,188.9787587875);
        $dompdf->setPaper($customPaper);

        // ambil data jumlah pengunjung
        $this->db->query('SELECT MAX(id) FROM transaksi');
        $temp = $this->db->single();

        // set isi tiket
        $struk = '<html><head><style>
                * { margin: 0 }
                body { padding: 10px; font-size: 10px }
                .page_break { page-break-before: always; }
            </style></head><body>';
        // cetak tiket sesuai jumlah
        for ($i=1; $i <= $data['jumlahTiket']; $i++) {
            $struk .= '=================================
                        <center>
                            <img src="' . BASEURL . '/img/coban.jpg" width="150px">
                        </center><br>
                        <table>
                            <tr>
                                <td>ID Transaksi</td>
                                <td>:</td>
                                <td>' . ($temp['MAX(id)']+$i) . date('dmY') . '</td>
                            </tr>
                            <tr>
                                <td>Tanggal</td>
                                <td>:</td>
                                <td>' . date("d-m-Y") . '</td>
                            </tr>
                            <tr>
                                <td>Tiket</td>
                                <td>:</td>
                                <td>Rp. ' . $data['hargaTiket'] . '</td>
                            </tr>
                        </table><br>
                        <center><p>Supported By<br>UMSIDA 2022</p></center>
                        =================================
                        <div class="page_break"></div>';
        }
        $struk .= '</body></html>';
        $dompdf->loadHtml($struk);
        // ubah html ke pdf
        $dompdf->render();
        // generate pdf to browser
        $dompdf->stream("tiket.pdf", array('Attachment' => 0));
    }
    
    public function ubahHarga($data) {
        $query = 'UPDATE ' . $this->table . ' SET hargaTiket = :hargaTiket';
        
        $this->db->query($query);
        $this->db->bind('hargaTiket', $data['hargaTiket']);
    
        $this->db->execute();
        return $this->db->rowCount();
    }
}