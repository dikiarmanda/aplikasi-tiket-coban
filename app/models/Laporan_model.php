<?php 

class Laporan_model {
    private $table = 'transaksi';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAllLpr() {
        $this->db->query('SELECT * FROM ' . $this->table . ' ORDER BY id DESC');
        return $this->db->resultSet();
    }

    public function getDataById($id) {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function getIncome() {
        $this->db->query('SELECT SUM(jmlh) FROM ' . $this->table . ' WHERE jmlh>0');
        return $this->db->single();
    }

    public function getOutcome() {
        $this->db->query('SELECT SUM(jmlh) FROM ' . $this->table . ' WHERE jmlh<0');
        return $this->db->single();
    }

    public function tambahTransaksi($data) {
        $query = 'INSERT INTO ' . $this->table .' VALUES
                    ("",:tgl,:ket,:jmlh)';

        $this->db->query('SELECT hargaTiket FROM config');
        $tiket = intval($this->db->single());
        
        $this->db->query($query);
        $this->db->bind('tgl', $data['tgl']);
        $this->db->bind('ket', $data['ket']);
        $this->db->bind('jmlh', $data['jmlh']);
        // cek transaksi tiket
        if ($data['ket'] == 'tiket') {
            // cek jumlah tiket
            $jmlh = $data['jmlh'];
            if (($jmlh/$tiket) > 1) {
                // for ($i=0; $i < $jmlh/$tiket; $i++) { 
                //     $this->db->execute();
                // }
                $data['ket'] = $jmlh/$tiket;
                $this->db->execute();
            } else {
                $this->db->execute();
            }
        }

        return $this->db->rowCount();
    }

    public function hapusTransaksi($id) {
        $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';
        $this->db->query($query);
        $this->db->bind('id', $id);
        
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahTransaksi($data) {
        $query = 'UPDATE ' . $this->table . ' SET 
                    tgl = :tgl,
                    ket = :ket,
                    jmlh = :jmlh
                    WHERE id = :id';
        
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('tgl', $data['tgl']);
        $this->db->bind('ket', $data['ket']);
        $this->db->bind('jmlh', $data['jmlh']);

        $this->db->execute();
        return $this->db->rowCount();
    }
}