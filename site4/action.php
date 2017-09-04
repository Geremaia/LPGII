<?php
    $Name = $_POST['Name'];
    $UserName = $_POST['UserName'];
    $Age = $_POST['Age'];
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];

    echo 'Seus dados são: ';
    echo '<br/>Nome Completo: ' . $Name;
    echo '<br/>Nome de Usuário: ' . $UserName;
    echo '<br/>Idade: ' . $Age;
    echo '<br/>E-Mail: ' . $Email;

?>
