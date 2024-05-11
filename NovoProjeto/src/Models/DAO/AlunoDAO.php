<?php

namespace Php\Primeiroprojeto\Models\DAO;
use Php\Primeiroprojeto\Models\Domain\Aluno;

class AlunoDAO {

    private Conexao $conexao;

    public function __construct()
    {
        $this->conexao = new Conexao();
    }

    public function inserir(Aluno $aluno) {
        try {
            $sql = "INSERT INTO aluno (nome, celular, catCNH) VALUES (:nome, :celular, :catCNH)";
            $p = $this->conexao->getConexao()->prepare($sql); 
            $p->bindValue(":nome", $aluno->getNome());
            $p->bindValue(":celular", $aluno->getCelular());
            $p->bindValue(":catCNH", $aluno->getCatCNH());
            return $p->execute();
        } catch (\Exception $e) {
            return 0;
        }
    }

    public function alterar(Aluno $aluno){
        try{
            $sql = "UPDATE ALUNO SET NOME = :nome, CELULAR = :celular, CATCNH = :catCNH
                    WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql); 
            $p->bindValue(":id", $aluno->getId());
            $p->bindValue(":nome", $aluno->getNome());
            $p->bindValue(":celular", $aluno->getCelular());
            $p->bindValue(":catCNH", $aluno->getCatCNH());
            return $p->execute();
        }
        catch(\Exception $e){
            return 0;
        }
    }

    public function excluir($id){
        try{
            $sql = "DELETE FROM ALUNO WHERE id = :id";
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
            $sql = "SELECT * FROM aluno";
            return $p = $this->conexao->getConexao()->query($sql); 
        }
        catch(\Exception $e){
            return 0;
        }
    }

    public function consultar($id){
        try{
            $sql = "SELECT * FROM aluno WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql); //uso do método query para consulta
            $p->bindValue(":id", $id);
            $p->execute();
            return $p->fetch();
        }
        catch(\Exception $e){
            return 0;
        }
    }

}