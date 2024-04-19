<?php

namespace Php\Primeiroprojeto\Models\DAO;
use Php\Primeiroprojeto\Models\Domain\Despesa;

class DespesaDAO {

    private Conexao $conexao;

    public function __construct()
    {
        $this->conexao = new Conexao();
    }

    public function inserir(Despesa $despesa) {
        try {
            $sql = "INSERT INTO Despesas (descricao, data, valor) VALUES (:descricao, :data, :valor)";
            $p = $this->conexao->getConexao()->prepare($sql); 
            $p->bindValue(":descricao", $despesa->getDescricao());
            $p->bindValue(":data", $despesa->getData());
            $p->bindValue(":valor", $despesa->getValor());
            return $p->execute();
        } catch (\Exception $e) {
            return 0;
        }
    }

}