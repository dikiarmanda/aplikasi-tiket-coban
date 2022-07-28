<?php 

class Laporan extends Controller {
    public function index() {
        $data['judul'] = 'Laporan';
        $data['transaksi'] = $this->model('Laporan_model')->getAllLpr();
        $this->view('templates/header', $data);
        $this->view('laporan/index', $data);
        $this->view('templates/footer');
    }

    public function input() {
        $data['judul'] = 'Input';
        $this->view('templates/header', $data);
        $this->view('laporan/input', $data);
        $this->view('templates/footer');
    }
}