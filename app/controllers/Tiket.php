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
}