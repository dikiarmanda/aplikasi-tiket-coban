<?php 

class Laporan extends Controller {
    public function index() {
        $data['judul'] = 'Laporan';
        $data['transaksi'] = $this->model('Laporan_model')->getAllLpr();
        $data['income'] = $this->model('Laporan_model')->getIncome();
        $data['outcome'] = $this->model('Laporan_model')->getOutcome();
        $this->view('templates/header', $data);
        $this->view('laporan/index', $data);
        $this->view('templates/footer');
    }

    public function tambah() {
        if ($this->model('Laporan_model')->tambahTransaksi($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/laporan');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/laporan');
            exit;
        }
    }

    public function hapus($id) {
        if ($this->model('Laporan_model')->hapusTransaksi($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/laporan');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/laporan');
            exit;
        }
    }
}