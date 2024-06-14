<?php

namespace Php\Primeiroprojeto\Models\DAO;

use Php\Primeiroprojeto\Models\Domain\Instrutor;

class InstrutorDAO {

    private Conexao $conexao;

    public function __construct()
    {
        $this->conexao = new Conexao();
    }

    public function inserir(Instrutor $instrutor) {
        try {
            $sql = "INSERT INTO instrutor (nome, celular, cnh) VALUES (:nome, :celular, :cnh)";
            $p = $this->conexao->getConexao()->prepare($sql); 
            $p->bindValue(":nome", $instrutor->getNome());
            $p->bindValue(":celular", $instrutor->getCelular());
            $p->bindValue(":cnh", $instrutor->getNumeroCNH());
            return $p->execute();
        } catch (\Exception $e) {
            return 0;
        }
    }

    public function alterar(Instrutor $instrutor){
        try{
            $sql = "UPDATE instrutor SET nome = :nome, celular = :celular, cnh = :cnh
                    WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql); 
            $p->bindValue(":id", $instrutor->getId());
            $p->bindValue(":nome", $instrutor->getNome());
            $p->bindValue(":celular", $instrutor->getCelular());
            $p->bindValue(":cnh", $instrutor->getNumeroCNH());
            return $p->execute();
        }
        catch(\Exception $e){
            return 0;
        }
    }

    public function excluir($id){
        try{
            $sql = "DELETE FROM instrutor WHERE id = :id";
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
            $sql = "SELECT * FROM instrutor";
            return $this->conexao->getConexao()->query($sql); 
        }
        catch(\Exception $e){
            return 0;
        }
    }

    public function consultar($id){
        try{
            $sql = "SELECT * FROM instrutor WHERE id = :id";
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
