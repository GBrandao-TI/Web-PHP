<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\DespesaDAO;
use Php\Primeiroprojeto\Models\Domain\Despesa;

class DespesaController {

    // Método para exibir todas as despesas e gerenciar mensagens de feedback
    public function index($params) {
        $despesaDAO = new DespesaDAO();
        $resultado = $despesaDAO->consultarTodos();

        $acao = $params[1] ?? "";
        $status = $params[2] ?? "";
        
        if ($acao == "inserir" && $status == "true") {
            $mensagem = "Despesa inserida com sucesso";
        } else if ($acao == "inserir" && $status == "false") {
            $mensagem = "Erro ao inserir despesa";
        } else if ($acao == "alterar" && $status == "true") {
            $mensagem = "Despesa alterada com sucesso";
        } else if ($acao == "alterar" && $status == "false") {
            $mensagem = "Erro ao alterar despesa";
        } else if ($acao == "excluir" && $status == "true") {
            $mensagem = "Despesa excluída com sucesso";
        } else if ($acao == "excluir" && $status == "false") {
            $mensagem = "Erro ao excluir despesa";
        } else {
            $mensagem = "";
        }

        require_once("../src/Views/despesa/despesa.php");
    }

    // Método para exibir a tela de inserção de nova despesa
    public function inserir($params) {
        require_once("../src/Views/despesa/inserir_despesa.html");
    }

    // Método para processar o novo registro de despesa
    public function novo($params) {
        $despesa = new Despesa(0, $_POST["descricao"], $_POST["data"], $_POST["valor"]);
        $despesaDAO = new DespesaDAO();

        if ($despesaDAO->inserir($despesa)) {
            header("location:/despesa/inserir/true");
        } else {
            header("location:/despesa/inserir/false");
        }
    }

    // Método para exibir a tela de alteração de uma despesa específica
    public function alterar($params) {
        $despesaDAO = new DespesaDAO();
        $resultado = $despesaDAO->consultar($params[1]);
        require_once("../src/Views/despesa/alterar_despesa.php");
    }

    // Método para exibir a tela de exclusão de uma despesa específica
    public function excluir($params) {
        $despesaDAO = new DespesaDAO();
        $resultado = $despesaDAO->consultar($params[1]);
        require_once("../src/Views/despesa/excluir_despesa.php");
    }

    // Método para processar a edição de uma despesa existente
    public function editar($params) {
        $despesa = new Despesa($_POST['id'], $_POST['descricao'], $_POST['data'], $_POST['valor']);
        $despesaDAO = new DespesaDAO();

        if ($despesaDAO->alterar($despesa)) {
            header("location: /despesa/alterar/true");
        } else {
            header("location: /despesa/alterar/false");
        }
    }

    // Método para processar a exclusão de uma despesa existente
    public function deletar($params) {
        $despesaDAO = new DespesaDAO();

        if ($despesaDAO->excluir($_POST['id'])) {
            header("location: /despesa/excluir/true");
        } else {
            header("location: /despesa/excluir/false");
        }
    }
}
