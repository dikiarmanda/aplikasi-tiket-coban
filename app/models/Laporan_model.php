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
}