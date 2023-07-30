<?php

class Database {

    private $db_host = "127.0.0.1";
    private $db_user = "root";
    private $db_pass = "";
    private $db_name = "reybank_db";

    protected function connect() {

        $conn = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);

        return $conn;

        // $dsn = 'mysql:host=' . $this->db_host . '; dbname=' . $this->db_name;
        // $pdo = new PDO($dsn, $this->db_user, $this->db_pass);

        // $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        // return $pdo;


    }

}