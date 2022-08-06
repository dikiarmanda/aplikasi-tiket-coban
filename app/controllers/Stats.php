<?php 

class Stats extends Controller {
    public function index() {
        $data['judul'] = 'Statistik';
        $data['jualTiket'] = $this->model('Stats_model')->getAllStats();
        $this->view('templates/header', $data);
        $this->view('stats/index', $data);
        $this->view('templates/footer');
    }
}