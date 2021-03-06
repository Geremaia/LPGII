<?php
    require('start.php');

    use App\utils\Encryptor as Encryptor;
    use App\dao\AccountDAO as AccountDAO;
    use App\entities\Account as Account;

    $email = $_POST['email'];
    $password = $_POST['password'];
    $answer = $_POST['answer'];
    
    $acc = new Account();
    $acc->setEmail($email);
    $acc->setPassword($password);
    $acc->setAnswer($answer);

    $adao = new AccountDAO();

    if($adao->emailExist($email)) {
        $_SESSION['error'] = "E-mail ajá cadastrado.";
        header("Location: cadastro.php");
    } else {
        $adao->insertAccount($acc);
        $_SESSION['msg'] = "Usuário cadastrado com sucesso.";
        header('Location: index.php');
    }
    
?>