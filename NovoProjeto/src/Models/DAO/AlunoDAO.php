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

}