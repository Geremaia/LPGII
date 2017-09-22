<?php
    namespace App\dao;

    use App\db\ConnectionFactory as ConnectionFactory;
    use \PDO;

    class AccountDAO{

        public function insertAccount($acc){
            $db = new ConnectionFactory();

            $stmt = $db->conn->prepare('INSERT INTO Users (email, password, answer) VALUES(:email, :password, :answer)');
            $stmt->execute(array(
                ':email' => $acc->getEmail(),
                ':password' => $acc->getPassword(),
                ':answer' => $acc->getAnswer()
            ));
            return $status; 
        }

        public function verifyData($acc) {
            $db = new ConnectionFactory();
            $stmt = $db->conn->prepare('SELECT * FROM Users 
                                        WHERE email = :email AND password = :password');
            
            $status = $stmt->execute(array(
                ':email' => $acc->getEmail(),
                ':password' => $acc->getPassword()
            ));
            
            return $stmt->fetch(PDO::FETCH_OBJ);        
        }

        public function verifyRecover($acc) {
            $db = new ConnectionFactory();
            $stmt = $db->conn->prepare('SELECT * FROM Users 
                                        WHERE email = :email AND answer = :answer');
            
            $status = $stmt->execute(array(
                ':email' => $acc->getEmail(),
                ':answer' => $acc->getAnswer()
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

        public function updatePassword($acc){
            $db = new ConnectionFactory();

            $stmt = $db->conn->prepare('UPDATE Users SET password = :password WHERE email = :email');
            $stmt->execute(array(
                ':email' => $acc->getEmail(),
                ':password' => $acc->getPassword()
            ));
            return $status; 
        }
    }
?>