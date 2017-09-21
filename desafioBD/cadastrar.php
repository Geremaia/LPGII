<?php
    require('start.php');

    use App\entities\Account as Account;
    use App\dao\AccountDAO as AccountDAO;

    $email = $_POST['email'];
    $password = $_POST['password'];
    $answer = $_POST['answer'];

    $acc = new Account();
    $acc->setEmail($email);
    $acc->setPassword($password);
    $acc->setAnswer($answer);

    $adao = new AccountDAO();

    if($adao->emailExist($email)) {
        $_SESSION['error'] = "E-mail já cadastrado.";
        header("Location: cadastro.php");
    } else {
        $adao->insertAccount($acc);
        $_SESSION['msg'] = "Usuário cadastrado com sucesso.";
        header('Location: index.php');
    }
    
?>