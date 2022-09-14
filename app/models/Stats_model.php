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
        
        $data['visitorBln'] = ['jan'=>0, 'feb'=>0, 'mar'=>0, 'apr'=>0, 'mei'=>0, 'jun'=>0, 'jul'=>0, 'agu'=>0, 'sep'=>0, 'okt'=>0, 'nov'=>0, 'des'=>0];
        $data['tiketBln'] = ['jan'=>0, 'feb'=>0, 'mar'=>0, 'apr'=>0, 'mei'=>0, 'jun'=>0, 'jul'=>0, 'agu'=>0, 'sep'=>0, 'okt'=>0, 'nov'=>0, 'des'=>0];
        // rekap data visitor dan jumlah penjualan tiket per bulan di tahun tertentu
        for ($i=0; $i < count($dataTiket); $i++) { 
            if ($thn[$i] == $tahun) {
                switch ($bln[$i]) {
                    case 1:
                        $data['visitorBln']['jan']++;
                        $data['tiketBln']['jan'] += $dataTiket[$i]['jmlh'];
                        break;
                    case 2:
                        $data['visitorBln']['feb']++;
                        $data['tiketBln']['feb'] += $dataTiket[$i]['jmlh'];
                        break;
                    case 3:
                        $data['visitorBln']['mar']++;
                        $data['tiketBln']['mar'] += $dataTiket[$i]['jmlh'];
                        break;
                    case 4:
                        $data['visitorBln']['apr']++;
                        $data['tiketBln']['apr'] += $dataTiket[$i]['jmlh'];
                        break;
                    case 5:
                        $data['visitorBln']['mei']++;
                        $data['tiketBln']['mei'] += $dataTiket[$i]['jmlh'];
                        break;
                    case 6:
                        $data['visitorBln']['jun']++;
                        $data['tiketBln']['jun'] += $dataTiket[$i]['jmlh'];
                        break;
                    case 7:
                        $data['visitorBln']['jul']++;
                        $data['tiketBln']['jul'] += $dataTiket[$i]['jmlh'];
                        break;
                    case 8:
                        $data['visitorBln']['agu']++;
                        $data['tiketBln']['agu'] += $dataTiket[$i]['jmlh'];
                        break;
                    case 9:
                        $data['visitorBln']['sep']++;
                        $data['tiketBln']['sep'] += $dataTiket[$i]['jmlh'];
                        break;
                    case 10:
                        $data['visitorBln']['okt']++;
                        $data['tiketBln']['okt'] += $dataTiket[$i]['jmlh'];
                        break;
                    case 11:
                        $data['visitorBln']['nov']++;
                        $data['tiketBln']['nov'] += $dataTiket[$i]['jmlh'];
                        break;
                    case 12:
                        $data['visitorBln']['des']++;
                        $data['tiketBln']['des'] += $dataTiket[$i]['jmlh'];
                        break;
                    
                    default:
                        break;
                }
            }
        }
        return $data;
    }

    public function getDataTahun() {
        $dataTiket = $this->getAllStats();
        // ambil data tahun
        foreach ($dataTiket as $cek) {
            $text = explode('-', $cek['tgl']);
            $thn[] = $text[0];
        }
        // ambil elemen unik
        array_unique($thn);
        foreach ($thn as $cek) {
            $data['tahunan'][$cek] = $this->getDataBulan($cek);
        }
        return $data;
    }
}