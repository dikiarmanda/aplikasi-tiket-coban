<?php 

class Stats extends Controller {
    public function index() {
        $data['judul'] = 'Statistik';
        $data['jualTiket'] = $this->model('Stats_model')->getAllStats();
        $data[] = $this->model('Stats_model')->getDataTahun();
        $this->view('templates/header', $data);
        $this->view('stats/index', $data);
        $this->view('templates/footer');
    }
    
    public function tahun($tahun) {
        $data['judul'] = 'Statistik ' . $tahun;
        $temp[] = $this->model('Stats_model')->getDataBulan($tahun);
        $data['visitorBln'] = $temp[0]['visitorBln'];
        $data['tiketBln'] = $temp[0]['tiketBln'];
        $this->view('templates/header', $data);
        $this->view('stats/tahun', $data);
        $this->view('templates/footer');
    }
}