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

    public function getStatsByYear($year) {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE tgl=:year');
        $this->db->bind('year', $year);
        return $this->db->single();
    }
}