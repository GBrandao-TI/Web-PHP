<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\InstrutorDAO;
use Php\Primeiroprojeto\Models\Domain\Instrutor;

class InstrutorController {

    public function index($params){
        $instrutorDAO = new InstrutorDAO;
        $resultado = $instrutorDAO->consultarTodos();
        
        $acao = $params[1] ?? "";
        $status = $params[2] ?? "";
        
        if($acao == "inserir" && $status == "true"){
            $mensagem = "Registro inserido com sucesso";
        } elseif($acao == "inserir" && $status == "false"){
            $mensagem = "Erro ao inserir";
        } elseif($acao == "alterar" && $status == "true"){
            $mensagem = "Registro alterado com sucesso";
        } elseif($acao == "alterar" && $status == "false"){
            $mensagem = "Erro ao alterar";
        } elseif($acao == "excluir" && $status == "true"){
            $mensagem = "Registro excluído com sucesso";
        } elseif($acao == "excluir" && $status == "false"){
            $mensagem = "Erro ao excluir";
        } else {
            $mensagem = "";
        }
        
        require_once("../src/Views/instrutor/instrutor.php");
    }

    public function inserir($params) {
        require_once("../src/Views/instrutor/inserir_instrutor.html");
    }

    public function novo($params) {
        $instrutor = new Instrutor(0, $_POST["nome"], $_POST["celular"], $_POST["cnh"]);
        $instrutorDAO = new InstrutorDAO();
        
        if ($instrutorDAO->inserir($instrutor)) {
            header("location:/instrutor/inserir/true");
        } else {
            header("location:/instrutor/inserir/false");
        }
    }

    public function alterar($params){
        $instrutorDAO = new InstrutorDAO;
        $resultado = $instrutorDAO->consultar($params[1]);
        require_once("../src/Views/instrutor/alterar_instrutor.php");
    }

    public function excluir($params){
        $instrutorDAO = new InstrutorDAO;
        $resultado = $instrutorDAO->consultar($params[1]);
        require_once("../src/Views/instrutor/excluir_instrutor.php");
    }

    public function editar($params){
        $instrutor = new Instrutor($_POST['id'], $_POST['nome'],$_POST['celular'],$_POST['cnh']);
        $instrutorDAO = new InstrutorDAO;
        
        if($instrutorDAO->alterar($instrutor)){
            header("location: /instrutor/alterar/true");
        } else {
            header("location: /instrutor/alterar/false");
        }
    }

    public function deletar($params){
        $instrutorDAO = new InstrutorDAO;
        
        if($instrutorDAO->excluir($_POST['id'])){
            header("location: /instrutor/excluir/true");
        } else {
            header("location: /instrutor/excluir/false");
        }
    }

}
