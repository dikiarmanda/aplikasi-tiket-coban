<?php 

class Tiket extends Controller {
	public function index() {
        $data['judul'] = 'Tiket';
        $this->view('templates/header', $data);
        $this->view('tiket/index', $data);
        $this->view('templates/footer');
    }
}