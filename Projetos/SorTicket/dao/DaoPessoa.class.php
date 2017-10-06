<?php

require_once 'DbConnection.class.php';
require_once 'DaoGenerico.interface.php';
require_once '../../modelo/Pessoa.class.php';

class DaoPessoa implements DaoGenerico {

    public function atualizar($objeto) {
        $conexao = DbConnection::retornaConexao();
        $sql = "UPDATE Pessoa SET idPessoa=:idPessoa,nome=:nome,email=:email,senha=:senha,foto=:foto where idPessoa=:idPessoa ";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':idPessoa', $objeto->getIdPessoa(), PDO::PARAM_INT);
        $stmt->bindValue(':nome', $objeto->getNome(), PDO::PARAM_STR);
        $stmt->bindValue(':email', $objeto->getEmail(), PDO::PARAM_STR);
        $stmt->bindValue(':senha', $objeto->getSenha(), PDO::PARAM_STR);
        $stmt->bindValue(':foto', $objeto->getFoto(), PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function inserir($objeto) {
        $conexao = DbConnection::retornaConexao();
        $sql = "INSERT Pessoa(idPessoa,nome,email,senha,foto) VALUES (:idPessoa,:nome,:email,:senha,:foto)";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':idPessoa', $objeto->getIdPessoa(), PDO::PARAM_INT);
        $stmt->bindValue(':nome', $objeto->getNome(), PDO::PARAM_STR);
        $stmt->bindValue(':email', $objeto->getEmail(), PDO::PARAM_STR);
        $stmt->bindValue(':senha', $objeto->getSenha(), PDO::PARAM_STR);
        $stmt->bindValue(':foto', $objeto->getFoto(), PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function obter($sql, $atributoSQL, $variavel, $pdoPARAM) {
        $conexao = DbConnection::retornaConexao();
        $statement = $conexao->prepare($sql);
        $statement->bindValue($atributoSQL, $variavel, $pdoPARAM);
        $statement->execute();
        $statement = $statement->fetch(PDO::FETCH_ASSOC);

        $resultado = null;
        if ($statement != false && !empty($statement)) {
            $resultado = new Pessoa($statement['idPessoa'], $statement['nome'], $statement['email'], $statement['senha'], $statement['foto']);
        }
        return $resultado;
    }

    public function obterTodosByParametro($sql, $atributoSQL = NULL, $variavel = NULL, $pdoPARAM = NULL) {
        $conexao = DbConnection::retornaConexao();
        $statement = $conexao->prepare($sql);
        if ($atributoSQL != null):
            $statement->bindValue($atributoSQL, $variavel, $pdoPARAM);
        endif;
        $statement->execute();
        $statement = $statement->fetchAll(PDO::FETCH_ASSOC);
        $lista = null;
        if ($statement != false && !empty($statement)) {
            foreach ($statement as $linha) {
                $lista [] = new Pessoa($statement['idPessoa'], $statement['nome'], $statement['email'], $statement['senha'], $statement['foto']);
            }
        }
        return $lista;
    }

    public function remover($objeto) {
        $conexao = DbConnection::retornaConexao();
        $sql = "delete from  Pessoa where idPessoa=:idPessoa a";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':idPessoa', $objeto->getIdPessoa(), PDO::PARAM_INT);
        $stmt->bindValue(':nome', $objeto->getNome(), PDO::PARAM_STR);
        $stmt->bindValue(':email', $objeto->getEmail(), PDO::PARAM_STR);
        $stmt->bindValue(':senha', $objeto->getSenha(), PDO::PARAM_STR);
        $stmt->bindValue(':foto', $objeto->getFoto(), PDO::PARAM_STR);
        return $stmt->execute();
    }

}
