<?php 

class Controller {
    // method view untuk menampilkan halaman
    public function view($view, $data = []) {
        require_once '../app/views/' . $view . '.php';
    }

    // method model untuk memanggil model
    public function model($model) {
        require_once '../app/models/' . $model . '.php';
        return new $model;
    }
}