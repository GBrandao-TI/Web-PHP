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

    public function alterar(Veiculo $veiculo){
        try{
            $sql = "UPDATE veiculo SET placa = :placa, categoria = :categoria, modelo = :modelo
                    WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql); 
            $p->bindValue(":id", $veiculo->getId());
            $p->bindValue(":placa", $veiculo->getPlaca());
            $p->bindValue(":categoria", $veiculo->getCategoria());
            $p->bindValue(":modelo", $veiculo->getModelo());
            return $p->execute();
        }
        catch(\Exception $e){
            return 0;
        }
    }

    public function excluir($id){
        try{
            $sql = "DELETE FROM veiculo WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql); 
            $p->bindValue(":id", $id);
            return $p->execute();
        }
        catch(\Exception $e){
            return 0;
        }
    }

    public function consultarTodos(){
        try{
            $sql = "SELECT * FROM veiculo";
            return $this->conexao->getConexao()->query($sql); 
        }
        catch(\Exception $e){
            return 0;
        }
    }

    public function consultar($id){
        try{
            $sql = "SELECT * FROM veiculo WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            $p->execute();
            return $p->fetch();
        }
        catch(\Exception $e){
            return 0;
        }
    }

}
