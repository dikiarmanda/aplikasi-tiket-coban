<?php 

class Tiket extends Controller {
	public function index() {
        $data['judul'] = 'Tiket';
        $data['hrgTiket'] = $this->model('Tiket_model')->getTiket();
        $this->view('templates/header', $data);
        $this->view('tiket/index', $data);
        $this->view('templates/footer');
    }
}