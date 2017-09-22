<?php
    require('start.php');

    use App\entities\Account as Account;
    use App\dao\AccountDAO as AccountDAO;

    $email = $_SESSION['recoverEmail'];
    $password1 = $_POST['novaSenha'];
    $password2 = $_POST['confirmarSenha'];

    if($password1 != $password2 ){
        $_SESSION['error'] = "As senhas não conferem";
        header("location: nova_senha.php");
    }

    $acc = new Account();
    $acc->setEmail($email);
    $acc->setPassword($password1);

    $adao = new AccountDAO();

    if($adao->updatePassword($acc)) {
        unset($_SESSION['recoverEmail']);
        $_SESSION['msg'] = "Senha atualizada com sucesso.";
        header("Location: index.php");
    } else {
        $adao->insertAccount($acc);
        $_SESSION['error'] = "Houve um erro ao atualizar a senha.";
        header('Location: nova_senha.php');
    }
    
?>