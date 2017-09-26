<?php

namespace App\controllers;

use App\entities\Product as Product;
use App\dao\ProductDAO as ProductDAO;

class ProductsController {


    public function cadastro() {
        return include('lib/views/products/sign_up.php');      
    }

    public function cadastrar() {
        $nome = $_POST['nome'];
        $valor = $_POST['valor'];

        $product = new Product();
        $product->setNome($nome);
        $product->setValor($valor);

        $product = new ProductDAO();
        
        if($product->nameExist($nome)) {
            $_SESSION['error'] = "Produto já cadastrado.";
            header("Location: /products/sign_up");
        } else {
            $product->insertProduct($product);
            $_SESSION['msg'] = "Produto cadastrado com sucesso.";
            header('Location: /product/sign_in');
        }
    }

    public function recoverForm() {
        return include('lib/views/users/recover_form.php');      
    }

    public function recover() {
        $email    = $_POST['email'];
        $cidade   = $_POST['cidade'];

        $acc = new Account();
        $acc->setEmail($email);
        $acc->setCidade($cidade);

        $adao = new AccountDAO();
        
        if($adao->verifyRecover($acc)) {
            $_SESSION['recoverEmail'] = $email;
            header("Location: /users/new_password_form");
        } else {
            $_SESSION['error'] = "E-mail ou cidade não conferem com o cadastrado.";
            header('Location: /users/recover_form');
        }
    }

    public function newPasswordForm() {
        return include('lib/views/users/new_password_form.php');      
    }

    public function newPassword(){
        $email = $_SESSION['recoverEmail'];
        $pass1 = $_POST['novaSenha'];
        $pass2 = $_POST['confirmarSenha'];

        if ($pass1 != $pass2) {
            $_SESSION['error'] = "Senhas não confererem, digite novamente.";
            header("Location: nova_senha.php");
        }
        
        $acc = new Account();
        $acc->setEmail($email);
        $acc->setPassword($pass1);

        $adao = new AccountDAO();
        
        if($adao->updatePassword($acc)) {
            unset($_SESSION['recoverEmail']);
            $_SESSION['msg'] = "Senha atualizada com sucesso.";
            header("Location: /users/sign_in");
        } else {
            $_SESSION['error'] = "Houve um erro ao atualizar o e-mail e a senha.";
            header('Location: /users/new_password_form');
        }
    }
}