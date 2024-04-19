<?php

namespace Php\Primeiroprojeto\Models\DAO;
use Php\Primeiroprojeto\Models\Domain\Categoria;

class CategoriaDAO {

    private Conexao $conexao;

    public function __construct()
    {
        $this->conexao = new Conexao();
    }

    public function inserir(Categoria $categoria) {
        try {
            $sql = "INSERT INTO categoria (descricao) VALUES (:descricao)";
            // agora a variável PDO tá dentro do objeto conexão
            $p = $this->conexao->getConexao()->prepare($sql); // $p de prepare conexao
            $p->bindValue(":descricao", $categoria->getDescricao());
            return $p->execute();
        } catch (\Exception $e) {
            return 0;
        }
    }

}