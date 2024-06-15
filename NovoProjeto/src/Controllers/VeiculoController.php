<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\VeiculoDAO;
use Php\Primeiroprojeto\Models\Domain\Veiculo;

class VeiculoController {

    public function index($params){
        $veiculoDAO = new VeiculoDAO;
        $resultado = $veiculoDAO->consultarTodos();
        
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
        
        require_once("../src/Views/veiculo/veiculo.php");
    }

    public function inserir($params) {
        require_once("../src/Views/veiculo/inserir_veiculo.php");
    }

    public function novo($params) {
        $veiculo = new Veiculo(0, $_POST["placa"], $_POST["categoria"], $_POST["modelo"]);
        $veiculoDAO = new VeiculoDAO();
        
        if ($veiculoDAO->inserir($veiculo)) {
            header("location:/veiculo/inserir/true");
        } else {
            header("location:/veiculo/inserir/false");
        }
    }

    public function alterar($params){
        $veiculoDAO = new VeiculoDAO;
        $resultado = $veiculoDAO->consultar($params[1]);
        require_once("../src/Views/veiculo/alterar_veiculo.php");
    }

    public function excluir($params){
        $veiculoDAO = new VeiculoDAO;
        $resultado = $veiculoDAO->consultar($params[1]);
        require_once("../src/Views/veiculo/excluir_veiculo.php");
    }

    public function editar($params){
        $veiculo = new Veiculo($_POST['id'], $_POST['placa'], $_POST['categoria'], $_POST['modelo']);
        $veiculoDAO = new VeiculoDAO;
        
        if($veiculoDAO->alterar($veiculo)){
            header("location: /veiculo/alterar/true");
        } else {
            header("location: /veiculo/alterar/false");
        }
    }

    public function deletar($params){
        $veiculoDAO = new VeiculoDAO;
        
        if($veiculoDAO->excluir($_POST['id'])){
            header("location: /veiculo/excluir/true");
        } else {
            header("location: /veiculo/excluir/false");
        }
    }

}
