<?php

namespace Php\Primeiroprojeto\Models\Domain;

class Aluno {

    private $id;
    private $nome;

    private $celular;

    private $catCNH;

    public function __construct($id, $nome, $celular, $catCNH)
    {
        $this->setId($id);
        $this->setNome($nome);
        $this->setCelular($celular);
        $this->setCatCNH($catCNH);
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getCelular() {
        return $this->celular;
    }

    public function setCelular($celular) {
        $this->celular = $celular;
    }

    public function getCatCNH() {
        return $this->catCNH;
    }

    public function setCatCNH($catCNH) {
        $this->catCNH = $catCNH;
    }

}