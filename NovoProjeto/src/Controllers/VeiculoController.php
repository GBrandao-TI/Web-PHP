<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\VeiculoDAO;
use Php\Primeiroprojeto\Models\Domain\Veiculo;

class VeiculoController {
    public function inserir($params) {
        require_once("../src/Views/veiculo/inserir_veiculo.php");
    }

    public function novo($params) {
        $veiculo = new Veiculo(0, $_POST["placa"], $_POST["categoria"], $_POST["modelo"]);
        $veiculoDAO = new VeiculoDAO();
        if ($veiculoDAO->inserir($veiculo)) {
            return "Veículo inserido com sucesso!";
        }
        else {
            return "Erro ao inserir!";
        }
    }

}


