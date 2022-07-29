<?php 

class Stats extends Controller {
    public function index() {
        $data['judul'] = 'Statistik';
        $this->view('templates/header', $data);
        $this->view('stats/index', $data);
        $this->view('templates/footer');
    }
}