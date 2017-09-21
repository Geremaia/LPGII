<?php
    namespace App\entities;

    use App\utils\Encryptor as Encryptor;

    class Account {
        
        private $answer;
        private $email;
        private $password;

        public function getAnswer() {
            return $this->answer;
        }

        public function setAnswer($answer) {
            $this->answer = $answer;
        }

        public function getEmail() {
            return $this->email;
        }

        public function setEmail($email) {
            $this->email = $email;
        }

        public function getPassword() {
            return $this->password;
        }

        public function setPassword($password) {
            $this->password = Encryptor::encrypt($password);
        }
        
    }
?>