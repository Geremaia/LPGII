<?php
    $email = $_POST['email'];
    $password = $_POST['password'];

    $encrypted_password = openssl_encrypt($password, 'aes-128-cbc', '!2#4%6', true, '0123456789123456');

    $dados = array($email, $encrypted_password);                         

    if (($handle = fopen("users.csv", "r")) !== FALSE){
        $row = 1;
        $bol = false;
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE){
            $num = count($data);
            $row++;
            if (strcmp($email,$data[0]) == 0){
                echo 'Erro: o endereço de email digitado já existe.';
                $bol = true;
                break;
            }
        }
        fclose($handle);
        if ($bol == false){
            $file = fopen('users.csv', 'a');
            fputcsv($file, $dados);
            fclose($file);
            echo 'Usuário cadastrado com sucesso!';
        }
    }
?>