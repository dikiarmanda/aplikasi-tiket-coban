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

    public function cetakTiket($data) {
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $dompdf = new Dompdf($options);
        // set ukuran kertas
        $customPaper = array(0,0,164.40948,283.464566929);
        $dompdf->setPaper($customPaper);

        // ambil data jumlah pengunjung
        $this->db->query('SELECT pengunjung FROM ' . $this->table);
        $temp = $this->db->single();

        // set isi tiket
        $struk = '<html><head><style>
                * {
                    margin: 0;
                    padding: 10px;
                }
            </style></head><body>';
        // cetak tiket sesuai jumlah
        for ($i=1; $i <= $data['jumlahTiket']; $i++) {
            $struk .= '====================<br>
                        <h3>COBAN BINANGUN</h3>
                        <h5>Plintahan, Pandaan, Pasuruan</h5>
                        <img src="' . BASEURL . '/image/tiket.jpg" width="100px"><br>
                        Tiket: Rp. ' . $data['hargaTiket'] . '<br>
                        Pengunjung ke-' . ($temp['pengunjung']+$i) . '<br>
                        ====================<br>';
        }
        $struk .= '</body></html>';
        $dompdf->loadHtml($struk);
        // ubah html ke pdf
        $dompdf->render();

        $dompdf->stream('tiket.pdf', array('Attachment' => 0));
    }
    
}