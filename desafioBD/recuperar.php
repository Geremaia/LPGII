<?php
    require('start.php');

    use App\entities\Account as Account;
    use App\dao\AccountDAO as AccountDAO;

    $email = $_POST['email'];
    $answer = $_POST['answer'];

    $acc = new Account();
    $acc->setEmail($email);
    $acc->setAnswer($answer);

    $adao = new AccountDAO();

    if($adao->verifyRecover($acc)) {
        $_SESSION['recoverEmail'] = $email;
        header("Location: nova_senha.php");
    } else {
        $_SESSION['error'] = "E-mail ou cidade errados!";
        header('Location: validar.php');
    }
    
?>