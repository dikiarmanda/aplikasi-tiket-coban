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

}