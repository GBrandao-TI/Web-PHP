<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\AlunoDAO;
use Php\Primeiroprojeto\Models\Domain\Aluno;

class AlunoController {

    public function index($params){
        $alunoDAO = new AlunoDAO;
        $resultado = $alunoDAO->consultarTodos();
        #var_dump($params);
        $acao = $params[1] ?? "";
        $status = $params[2] ?? "";
        if($acao == "inserir" && $status == "true"){
            $mensagem = "Registro inserido com sucesso";
        }
        else if($acao == "inserir" && $status = "false"){
            $mensagem = "Erro ao inserir";
        }
        elseif($acao == "alterar" && $status == "true"){
            $mensagem = "Registro inserido com sucesso";
        }
        else if($acao == "alterar" && $status = "false"){
            $mensagem = "Erro ao alterar";
        }
        elseif($acao == "excluir" && $status == "true"){
            $mensagem = "Registro inserido com sucesso";
        }
        elseif($acao == "excluir" && $status = "false"){
            $mensagem = "Erro ao alterar";
        }
        else{
            $mensagem = "";
        }
        require_once("../src/Views/aluno/aluno.php");
    }

    public function inserir($params) {
        require_once("../src/Views/aluno/inserir_aluno.html");
    }

    public function novo($params) {
        $aluno = new Aluno(0, $_POST["nome"], $_POST["celular"], $_POST["catCNH"]);
        $alunoDAO = new AlunoDAO();
        if ($alunoDAO->inserir($aluno)) {
            header("location:/aluno/inserir/true"); //redireciona para a rota de aluno, passando o true para ser usado no recarregamento da página
        }
        else {
            header("location:/aluno/inserir/false");
        }
    }

    public function alterar($params){
        $alunoDAO = new AlunoDAO;
        $resultado = $alunoDAO->consultar($params[1]);
        require_once("../src/Views/aluno/alterar_aluno.php");
    }


    public function excluir($params){
        $alunoDAO = new AlunoDAO;
        $resultado = $alunoDAO->consultar($params[1]);
        require_once("../src/Views/aluno/excluir_aluno.php");
    }

    public function editar($params){
        $aluno = new Aluno($_POST['id'], $_POST['nome'],$_POST['celular'],$_POST['catCNH']);
        $alunoDAO = new AlunoDAO;
        if($alunoDAO->alterar($aluno)){
            header("location: /aluno/alterar/true");
        }
        else{
            header("location: /aluno/alterar/false");
        }
    }

    public function deletar($params){
        $alunoDAO = new AlunoDAO;
        if($alunoDAO->excluir($_POST['id'])){
            header("location: /aluno/excluir/true");
        }
        else{
            header("location: /aluno/excluir/false");
        }
    }

}


