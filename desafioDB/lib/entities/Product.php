<?php

namespace App\entities;

class Product {

    private $nome;
    private $valor;


    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setValor($valor) {
        $this->valor = strtolower($valor);
    }

    public function getValor() {
        return $this->valor;
    }

}