<?php

class Stats_model {
    private $table = 'transaksi';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAllStats() {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE ket="tiket"');
        return $this->db->resultSet();
    }

    public function getTahun() {
        # code...
    }

    public function getDataBulan($tahun) {
        $dataTiket = $this->getAllStats();
        // ambil data bulan
        foreach ($dataTiket as $cek) {
            $text = explode('-', $cek['tgl']);
            $bln[] = $text[1];
        }
        // ambil data tahun
        foreach ($dataTiket as $cek) {
            $text = explode('-', $cek['tgl']);
            $thn[] = $text[0];
        }
        
        $pengunjungThn = 0;
        $tiketThn = 0;
        $pengunjungBln = ['jan'=>0, 'feb'=>0, 'mar'=>0, 'apr'=>0, 'mei'=>0, 'jun'=>0, 'jul'=>0, 'agu'=>0, 'sep'=>0, 'okt'=>0, 'nov'=>0, 'des'=>0];
        $tiketBln = ['jan'=>0, 'feb'=>0, 'mar'=>0, 'apr'=>0, 'mei'=>0, 'jun'=>0, 'jul'=>0, 'agu'=>0, 'sep'=>0, 'okt'=>0, 'nov'=>0, 'des'=>0];
        // rekap data pengunjung dan jumlah penjualan tiket per bulan di tahun tertentu
        for ($i=0; $i < count($dataTiket); $i++) { 
            if ($thn[$i] == $tahun) {
                switch ($bln[$i]) {
                    case 1:
                        $pengunjungBln['jan']++;
                        $tiketBln['jan'] += $dataTiket[$i]['jmlh'];
                        break;
                    case 2:
                        $pengunjungBln['feb']++;
                        $tiketBln['feb'] += $dataTiket[$i]['jmlh'];
                        break;
                    case 3:
                        $pengunjungBln['mar']++;
                        $tiketBln['mar'] += $dataTiket[$i]['jmlh'];
                        break;
                    case 4:
                        $pengunjungBln['apr']++;
                        $tiketBln['apr'] += $dataTiket[$i]['jmlh'];
                        break;
                    case 5:
                        $pengunjungBln['mei']++;
                        $tiketBln['mei'] += $dataTiket[$i]['jmlh'];
                        break;
                    case 6:
                        $pengunjungBln['jun']++;
                        $tiketBln['jun'] += $dataTiket[$i]['jmlh'];
                        break;
                    case 7:
                        $pengunjungBln['jul']++;
                        $tiketBln['jul'] += $dataTiket[$i]['jmlh'];
                        break;
                    case 8:
                        $pengunjungBln['agu']++;
                        $tiketBln['agu'] += $dataTiket[$i]['jmlh'];
                        break;
                    case 9:
                        $pengunjungBln['sep']++;
                        $tiketBln['sep'] += $dataTiket[$i]['jmlh'];
                        break;
                    case 10:
                        $pengunjungBln['okt']++;
                        $tiketBln['okt'] += $dataTiket[$i]['jmlh'];
                        break;
                    case 11:
                        $pengunjungBln['nov']++;
                        $tiketBln['nov'] += $dataTiket[$i]['jmlh'];
                        break;
                    case 12:
                        $pengunjungBln['des']++;
                        $tiketBln['des'] += $dataTiket[$i]['jmlh'];
                        break;
                    
                    default:
                        break;
                }
            }
        }
    }

    public function getDataTahun($tahun) {
        $dataTiket = $this->getAllStats();
        
    }
}