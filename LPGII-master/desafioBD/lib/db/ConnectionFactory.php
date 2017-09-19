<?php
    namespace App\db;
    
    use \PDO;

    class ConnectionFactory{

        private $host = "localhost";
        private $db = "teste";
        private $user = "root";
        private $password = "123Batatadoce#@!";
        public $conn;

        public function __construct() {
            try {
                $this->conn = new PDO("mysql:host=$this->host;dbname=$this->db", 
                                $this->user, 
                                $this->password);
            } catch( PDOException $e ) {
                throw new Exception($e->getMessage() , $e->getCode());
            }
        }
    }



