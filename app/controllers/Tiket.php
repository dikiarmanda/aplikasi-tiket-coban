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
        $_POST['jmlh'] = $_POST['hargaTiket']*$_POST['jumlahTiket'];
        $this->model('Laporan_model')->tambahTransaksi($_POST);
        $this->model('Tiket_model')->cetakTiket($_POST);
    }
}