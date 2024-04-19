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
            $sql = "INSERT INTO Instrutor (nome, celular, cnh) VALUES (:nome, :celular, :cnh)";
            $p = $this->conexao->getConexao()->prepare($sql); 
            $p->bindValue(":nome", $instrutor->getNome());
            $p->bindValue(":celular", $instrutor->getCelular());
            $p->bindValue(":cnh", $instrutor->getNumeroCNH());
            return $p->execute();
        } catch (\Exception $e) {
            return 0;
        }
    }

}