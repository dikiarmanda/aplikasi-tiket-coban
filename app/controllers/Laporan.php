<?php 

class Laporan extends Controller {
    public function index($page = 1) {
        $data['judul'] = 'Laporan';
        $data['transaksi'] = $this->model('Laporan_model')->getAllLpr();
        // pagination
        $data['page'] = (20 * $page) - 20;
        $data['jmlhData'] = count($data['transaksi']);
        // untuk card
        $temp1 = $this->model('Laporan_model')->getIncome();
        $data['income'] = intval($temp1['SUM(jmlh)']);
        $temp2 = $this->model('Laporan_model')->getOutcome();
        $data['outcome'] = intval($temp2['SUM(jmlh)']);
        
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

    public function getubah() {
        echo json_encode($this->model('Laporan_model')->getDataById($_POST['id']));
    }

    public function ubah() {
        if ($this->model('Laporan_model')->ubahTransaksi($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/laporan');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/laporan');
            exit;
        }
    }}