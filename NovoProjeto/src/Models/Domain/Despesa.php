<?php

namespace Php\Primeiroprojeto\Models\Domain;

class Despesa {

    private $id;
    private $descricao;

    private $data;

    private $valor;

    public function __construct($id, $descricao, $data, $valor)
    {
        $this->setId($id);
        $this->setDescricao($descricao);
        $this->setData($data);
        $this->setValor($valor);
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function getData() {
        return $this->data;
    }

    public function setData($data) {
        $this->data = $data;
    }

    public function getValor() {
        return $this->valor;
    }

    public function setValor($valor) {
        $this->valor = $valor;
    }

}