<?php

namespace Php\Primeiroprojeto\Models\DAO;
use Php\Primeiroprojeto\Models\Domain\Veiculo;

class VeiculoDAO {

    private Conexao $conexao;

    public function __construct()
    {
        $this->conexao = new Conexao();
    }

    public function inserir(Veiculo $veiculo) {
        try {
            $sql = "INSERT INTO veiculo (placa, categoria, modelo) VALUES (:placa, :categoria, :modelo)";
            $p = $this->conexao->getConexao()->prepare($sql); 
            $p->bindValue(":placa", $veiculo->getPlaca());
            $p->bindValue(":categoria", $veiculo->getCategoria());
            $p->bindValue(":modelo", $veiculo->getModelo());
            return $p->execute();
        } catch (\Exception $e) {
            return 0;
        }
    }

}