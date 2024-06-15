<?php

namespace Php\Primeiroprojeto\Models\DAO;
use Php\Primeiroprojeto\Models\Domain\Despesa;
//use Php\Primeiroprojeto\Models\DAO\Conexao; // Assumindo que essa classe exista e gerencie a conexão com o banco de dados

class DespesaDAO {

    private Conexao $conexao;

    public function __construct()
    {
        $this->conexao = new Conexao();
    }

    // Método para inserir uma nova despesa
    public function inserir(Despesa $despesa) {
        try {
            $sql = "INSERT INTO despesas (descricao, data, valor) VALUES (:descricao, :data, :valor)";
            $p = $this->conexao->getConexao()->prepare($sql); 
            $p->bindValue(":descricao", $despesa->getDescricao());
            $p->bindValue(":data", $despesa->getData());
            $p->bindValue(":valor", $despesa->getValor());
            return $p->execute();
        } catch (\Exception $e) {
            return 0;
        }
    }

    // Método para alterar uma despesa existente
    public function alterar(Despesa $despesa) {
        try {
            $sql = "UPDATE despesas SET descricao = :descricao, data = :data, valor = :valor
                    WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql); 
            $p->bindValue(":id", $despesa->getId());
            $p->bindValue(":descricao", $despesa->getDescricao());
            $p->bindValue(":data", $despesa->getData());
            $p->bindValue(":valor", $despesa->getValor());
            return $p->execute();
        } catch (\Exception $e) {
            return 0;
        }
    }

    // Método para excluir uma despesa pelo ID
    public function excluir($id) {
        try {
            $sql = "DELETE FROM despesas WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql); 
            $p->bindValue(":id", $id);
            return $p->execute();
        } catch (\Exception $e) {
            return 0;
        }
    }

    // Método para consultar todas as despesas
    public function consultarTodos() {
        try {
            $sql = "SELECT * FROM despesas";
            return $p = $this->conexao->getConexao()->query($sql);
        } catch (\Exception $e) {
            return 0;
        }
    }

    // Método para consultar uma despesa específica pelo ID
    public function consultar($id) {
        try {
            $sql = "SELECT * FROM despesas WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            $p->execute();
            return $p->fetch();
        } catch (\Exception $e) {
            return 0;
        }
    }
}
