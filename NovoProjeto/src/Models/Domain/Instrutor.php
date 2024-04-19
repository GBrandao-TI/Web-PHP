<?php

namespace Php\Primeiroprojeto\Models\Domain;

class Instrutor {

    private $id;
    private $nome;

    private $celular;

    private $nroCNH;

    public function __construct($id, $nome, $celular, $nroCNH)
    {
        $this->setId($id);
        $this->setNome($nome);
        $this->setCelular($celular);
        $this->setNumeroCNH($nroCNH);
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

    public function getNumeroCNH() {
        return $this->nroCNH;
    }

    public function setNumeroCNH($nroCNH) {
        $this->nroCNH = $nroCNH;
    }

}