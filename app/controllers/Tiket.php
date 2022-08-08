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

    public function cetak($harga=5000, $jmlh=1) {
        $data['hrgTiket'] = $harga;
        $data['jmlh'] = $jmlh;
        $this->model('Tiket_model')->cetakTiket($data['hrgTiket'],$data['jmlh']);
    }

    public function cek()
    {
        $this->model('Tiket_model')->cek();
    }
}