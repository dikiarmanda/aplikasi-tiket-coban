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

    public function cetak() {
        $this->model('Tiket_model')->cetakTiket($_POST);
        for ($i=1; $i <= $_POST['jumlahTiket']; $i++) { 
            $this->model('Tiket_model')->tambahTiket($_POST);
        }
    }

    public function harga() {
        if ($this->model('Tiket_model')->ubahHarga($_POST) > 0) {
            Flasher::setFlash('Tiket', 'berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/tiket');
            exit;
        } else {
            Flasher::setFlash('Tiket', 'gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/tiket');
            exit;
        }
    }
}