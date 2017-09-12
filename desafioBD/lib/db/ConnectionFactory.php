<?php
    namespace App\db;

    class ConnectionFactory{

        private $host = "localhost";
        private $db = "teste";
        private $user = "root";
        private $password = "Batatadoce";
        public $conn;

        public function __construct(){
            $conn = new PDO("mysql:host=$this->host;dbname=$this->db", $this->user, $this->password);
        }
    }



