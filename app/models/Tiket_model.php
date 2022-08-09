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
        $this->db->query('SELECT hargaTiket FROM '. $this->table);
        return $this->db->single();
    }

    public function cek() {
        require_once '../init.php';
        return var_dump($cek);
    }

    public function cetakTiket($harga, $jmlh) {
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $dompdf = new Dompdf($options);
        $customPaper = array(0,0,164.40948,283.464566929);
        $dompdf->setPaper($customPaper);
        $struk = '<html>
        <head>
            <style>
                * {
                    margin: 0;
                    padding: 10px;
                }
            </style>
        </head>
        <body>';
        for ($i=1; $i <= $jmlh; $i++) { 
            $struk .= '<h1>COBAN BINANGUN</h1>
                        <p>Tiket: Rp. ' . $harga . '</p>
                        <p>Pengunjung ke-' . $i . '</p>
                        <p>======================</p>';
        }
        $struk .= '</body></html>';
        $dompdf->loadHtml($struk);
        $dompdf->render();
        $dompdf->stream('tiket.pdf', array('Attachment' => 0));
    }
    
}