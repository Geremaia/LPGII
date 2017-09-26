<?php
namespace App\dao;

use App\db\ConnectionFactory as ConnectionFactory;
use \PDO;

class ProductDAO {

    public function insertProduct($product) {
        $cf = new ConnectionFactory();

        $stmt = $cf->conn->prepare('INSERT INTO Product (nome, valor)
                                    VALUES(:nome, :valor)');
        $status = $stmt->execute(array(
            ':nome' => $product->getNome(),
            ':valor' => $product->getValor(),
        ));
        
        return $status;        
    }

    public function updateInfo($product) {
        $cf = new ConnectionFactory();

        $stmt = $cf->conn->prepare('UPDATE Product (nome, valor)
                                    WHERE id = :id');
        $status = $stmt->execute(array(
            ':id' => $product->getId(),
        ));
        
        return $status;        
    }

}