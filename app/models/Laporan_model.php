<?php 

class Laporan_model {
    private $table = 'transaksi';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAllLpr() {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function tambahTransaksi($data) {
        $query = "INSERT INTO " . $this->table ." VALUES
                    ('',:tgl,:ket,:jmlh)";

        $this->db->query($query);
        $this->db->bind('tgl', $data['tgl']);
        $this->db->bind('ket', $data['ket']);
        $this->db->bind('jmlh', $data['jmlh']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusTransaksi($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function ubahTransaksi($data) {
        $query = "UPDATE " . $this->table . " SET 
                    tgl = :tgl,
                    ket = :ket,
                    jmlh = :jmlh,
                    WHERE id = :id";
        
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('tgl', $data['tgl']);
        $this->db->bind('ket', $data['ket']);
        $this->db->bind('jmlh', $data['jmlh']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariTransaksi() {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM " . $this->table . " WHERE ket LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        
        return $this->db->resultSet();
    }
}