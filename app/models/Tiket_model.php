<?php 

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

    // public function cetakTiket() {
    //     // reference the Dompdf namespace
    //     use Dompdf\Dompdf;

    //     // instantiate and use the dompdf class
    //     $dompdf = new Dompdf();
    //     $dompdf->loadHtml('hello world');

    //     // (Optional) Setup the paper size and orientation
    //     $dompdf->setPaper('A4', 'landscape');

    //     // Render the HTML as PDF
    //     $dompdf->render();

    //     // Output the generated PDF to Browser
    //     $dompdf->stream();
    // }
}