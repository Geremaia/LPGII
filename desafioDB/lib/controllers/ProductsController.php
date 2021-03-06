<?php

namespace App\controllers;

use App\entities\Product as Product;
use App\dao\ProductDAO as ProductDAO;
use App\dao\CategoryDAO as CategoryDAO;

class ProductsController {

    public function index() {
        $pdao = new ProductDAO();
        $products = $pdao->all();

        // Aqui vai toda a consulta com o banco de dados
        return include('lib/views/products/index.php');      
    }

    public function new() {
        $cdao = new CategoryDAO();
        
        $categories = $cdao->all(); 
        
        // Aqui vai toda a consulta com o banco de dados
        return include('lib/views/products/new.php');      
    }

    public function edit() {
        $cdao = new CategoryDAO();
        
        $categories = $cdao->all(); 
        
        // Aqui vai toda a consulta com o banco de dados
        return include('lib/views/products/edit.php');      
    }

    public function create() {
        $nome  = $_POST['nome'];
        $valor = $_POST['valor'];
        $category = $_POST['categoria'];

        $p = new Product();
        $p->setNome($nome);
        $p->setValor($valor);
        $p->setCategoria($category);

        $pdao = new ProductDAO();
        
        if($pdao->insertProduct($p)) {
            $_SESSION['msg'] = "Produto cadastrado com sucesso";
            header('Location: /admin/products');
            exit();
        } else {
            $_SESSION['error'] = "Ocorreu um erro ao cadastrar o produto, verifique os dados novamente.";
            return include('lib/views/products/new.php');
        }    
    }

    public function update() {
        $nome  = $_POST['nome'];
        $valor = $_POST['valor'];
        $category = $_POST['categoria'];
        $id = $_GET['id'];

        $p = new Product();
        $p->setNome($nome);
        $p->setValor($valor);
        $p->setCategoria($category);

        $pdao = new ProductDAO();
        
        if($pdao->updateProduct($p)) {
            $_SESSION['msg'] = "Produto atualizado com sucesso";
            header('Location: /admin/products');
            exit();
        } else {
            $_SESSION['error'] = "Ocorreu um erro ao cadastrar o produto, verifique os dados novamente.";
            return include('lib/views/products/new.php');
        }    
    }

    public function show() {
        $id = $_GET['id'];

        $pdao = new ProductDAO();
        $product = $pdao->find($id);

        return include('lib/views/products/show.php');
    }



}