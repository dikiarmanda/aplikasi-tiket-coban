<?php 

class Tiket extends Controller {
	public function index() {
        $data['judul'] = 'Tiket';
        $temp = $this->model('Tiket_model')->getTiket();
        $data['hrgTiket'] = $temp['hargaTiket'];
        $this->view('templates/header', $data);
        $this->view('tiket/index', $data);
        $this->view('templates/footer');
    }
    // FIXME: transaksi terinput 2x
    public function cetak() {
        $this->model('Tiket_model')->cetakTiket($_POST);
        for ($i=1; $i <= $_POST['jmlh']; $i++) { 
            $this->model('Tiket_model')->tambahTiket($_POST);
        }
    }
}