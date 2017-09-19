<?php
    namespace App\dao;
        
    use App\db\ConnectionFactory as ConnectionFactory;
    use \PDO;
    
    class AccountDAO{

        public function insertAccount($acc){
            $db = new ConnectionFactory();
            $stmt = $db->conn->prepare('INSERT INTO Users (email, password)
                                        VALUES(:email, :ep)');
            $status = $stmt->execute(array(
                ':email' => $acc->getEmail(),
                ':ep' => $acc->getPassword()
            ));
            
            return $status;
        }
        
        public function verifyData($email){
            $db = new ConnectionFactory();

            $stmt = $db->conn->prepare('SELECT * FROM Users WHERE email = :email AND password = :password');
            $stmt->execute(array(
                ':email' => $email,
                ':password' => $password
            ));

            return $stmt->fetch(PDO::FETCH_OBJ);
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