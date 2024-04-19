<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\DespesaDAO;
use Php\Primeiroprojeto\Models\Domain\Despesa;

class DespesaController {
    public function inserir($params) {
        require_once("../src/Views/despesa/inserir_despesa.html");
    }

    public function novo($params) {
        $despesa = new Despesa(0, $_POST["descricao"], $_POST["data"], $_POST["valor"]);
        $despesaDAO = new DespesaDAO();
        if ($despesaDAO->inserir($despesa)) {
            return "Inserido com sucesso!";
        }
        else {
            return "Erro ao inserir!";
        }
    }

}


