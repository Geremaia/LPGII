<?php
namespace App\dao;

use App\db\ConnectionFactory as ConnectionFactory;
use App\entities\Product as Product;
use \PDO;

class ProductDAO {

    public function insertProduct($product) {
        $cf = new ConnectionFactory();

        $stmt = $cf->conn->prepare('INSERT INTO Products (nome, valor)
                                    VALUES(:nome, :valor)');
        $status = $stmt->execute(array(
            ':nome' => $product->getNome(),
            ':valor' => $product->getValor()
        ));
        
        return $status;        
    }

    public function updateProduct($product) {
        $cf = new ConnectionFactory();

        $stmt = $cf->conn->prepare('INSERT INTO Products (nome, valor)
                                    VALUES(:nome, :valor) WHERE idProducts = :id');
        $status = $stmt->execute(array(
            ':nome' => $product->getNome(),
            ':valor' => $product->getValor(),
            ':id' => $id
        ));
        
        return $status;        
    }
    
    public function all() {
        $cf = new ConnectionFactory();

        $stmt = $cf->conn->prepare('SELECT * FROM Products');
        $stmt->execute();
        
        $produts = [];

        foreach($stmt->fetchAll() as $product) {
            $p = new Product();
            $p->setId($product['idProducts']);
            $p->setNome($product['nome']);
            $p->setValor($product['valor']);

            $products[] = $p;
        }
        
        return $products;      
    }

    public function find($id) {
        $cf = new ConnectionFactory();

        $stmt = $cf->conn->prepare('SELECT * FROM Products WHERE idProducts = :id');
        $stmt->execute(array(
            ':id' => $id
        ));
        
        foreach($stmt->fetchAll() as $product) {
            $p = new Product();
            $p->setId($product['idProducts']);
            $p->setNome($product['nome']);
            $p->setValor($product['valor']);
        }
        
        return $p;
    }
}