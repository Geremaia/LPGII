<?php
    namespace App\dao;

    use App\db\ConnectionFactory as ConnectionFactory;
    use \PDO;

    class AccountDAO{

        public function insertAccount($dados){
            $db = new ConnectionFactory();

            $stmt = $db->conn->prepare('INSERT INTO Users (email, password) VALUES(:email, :password)');
            $stmt->execute(array(
                ':email' => $dados['email'],
                ':password' => $dados['encrypted_password']
            ));
            
            return $status; 
        }
            
        public function emailExist($email){
            $db = new ConnectionFactory();

            $stmt = $db->conn->prepare('SELECT * FROM Users WHERE email = :email');
            $stmt->execute(array(
                ':email' => $email
            ));

            return $stmt->fetch(PDO::FETCH_OBJ);
        }
    }
?>