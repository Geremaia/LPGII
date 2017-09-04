<?php
    $email = $_POST['email'];
    $password = $_POST['password'];

    $encrypted_password = openssl_encrypt($password, 
                                            'aes-128-cbc', 
                                            '!2#4%6', 
                                            true, 
                                            '0123456789123456');
    
    $file = fopen("./users.csv", 'r');

    if (($handle = fopen("users.csv", "r")) !== FALSE){
        $row = 1;
        $bol = false;
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE){
            $num = count($data);
            $row++;
            if ((strcmp($email,$data[0]) == 0 ) && strcmp($encrypted_password,$data[1]) == 0){
                echo 'logado com sucesso!!';
                $bol = true;
                break;
            }
        }
        fclose($handle);
        if ($bol == false){
            echo 'Usuário não pode ser encontrado, cadastre-se antes de logar!!';
        }
    }

    fclose($file);
?>