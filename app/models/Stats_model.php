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
        
        $data['visitorBln'] = [0,0,0,0,0,0,0,0,0,0,0,0,0];
        $data['tiketBln'] = [0,0,0,0,0,0,0,0,0,0,0,0,0];
        // rekap data visitor dan jumlah penjualan tiket per bulan di tahun tertentu
        for ($i=0; $i < count($dataTiket); $i++) { 
            if ($thn[$i] == $tahun) {
                switch ($bln[$i]) {
                    case 1:
                        $data['visitorBln'][1]++;
                        $data['tiketBln'][1] += $dataTiket[$i]['jmlh'];
                        break;
                    case 2:
                        $data['visitorBln'][2]++;
                        $data['tiketBln'][2] += $dataTiket[$i]['jmlh'];
                        break;
                    case 3:
                        $data['visitorBln'][3]++;
                        $data['tiketBln'][3] += $dataTiket[$i]['jmlh'];
                        break;
                    case 4:
                        $data['visitorBln'][4]++;
                        $data['tiketBln'][4] += $dataTiket[$i]['jmlh'];
                        break;
                    case 5:
                        $data['visitorBln'][5]++;
                        $data['tiketBln'][5] += $dataTiket[$i]['jmlh'];
                        break;
                    case 6:
                        $data['visitorBln'][6]++;
                        $data['tiketBln'][6] += $dataTiket[$i]['jmlh'];
                        break;
                    case 7:
                        $data['visitorBln'][7]++;
                        $data['tiketBln'][7] += $dataTiket[$i]['jmlh'];
                        break;
                    case 8:
                        $data['visitorBln'][8]++;
                        $data['tiketBln'][8] += $dataTiket[$i]['jmlh'];
                        break;
                    case 9:
                        $data['visitorBln'][9]++;
                        $data['tiketBln'][9] += $dataTiket[$i]['jmlh'];
                        break;
                    case 10:
                        $data['visitorBln'][10]++;
                        $data['tiketBln'][10] += $dataTiket[$i]['jmlh'];
                        break;
                    case 11:
                        $data['visitorBln'][11]++;
                        $data['tiketBln'][11] += $dataTiket[$i]['jmlh'];
                        break;
                    case 12:
                        $data['visitorBln'][12]++;
                        $data['tiketBln'][12] += $dataTiket[$i]['jmlh'];
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
        $thn = array_unique($thn);
        foreach ($thn as $cek) {
            $data['tahunan'][$cek] = $this->getDataBulan($cek);
            $data['tahunan'][$cek]['visitorThn'] = array_sum($data['tahunan'][$cek]['visitorBln']);
            $data['tahunan'][$cek]['tiketThn'] = array_sum($data['tahunan'][$cek]['tiketBln']);
            array_shift($data['tahunan'][$cek]);
            array_shift($data['tahunan'][$cek]);
        }
        $data['tahunan']['list'] = $thn;
        return $data['tahunan'];
    }
}