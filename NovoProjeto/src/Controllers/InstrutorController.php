<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\InstrutorDAO;
use Php\Primeiroprojeto\Models\Domain\Instrutor;

class InstrutorController {
    public function inserir($params) {
        require_once("../src/Views/instrutor/inserir_instrutor.html");
    }

    public function novo($params) {
        $instrutor = new Instrutor(0, $_POST["nome"], $_POST["celular"], $_POST["cnh"]);
        $instrutorDAO = new InstrutorDAO();
        if ($instrutorDAO->inserir($instrutor)) {
            return "Inserido com sucesso!";
        }
        else {
            return "Erro ao inserir!";
        }
    }

}


