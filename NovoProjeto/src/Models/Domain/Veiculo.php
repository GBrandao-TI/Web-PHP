<?php

namespace Php\Primeiroprojeto\Models\Domain;

class Veiculo {

    private $id;
    private $placa;

    private $categoria;

    private $modelo;

    public function __construct($id, $placa, $categoria, $modelo)
    {
        $this->setId($id);
        $this->setPlaca($placa);
        $this->setCategoria($categoria);
        $this->setModelo($modelo);
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getPlaca() {
        return $this->placa;
    }

    public function setPlaca($placa) {
        $this->placa = $placa;
    }

    public function getCategoria() {
        return $this->categoria;
    }

    public function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    public function getModelo() {
        return $this->modelo;
    }

    public function setModelo($modelo) {
        $this->modelo = $modelo;
    }

}