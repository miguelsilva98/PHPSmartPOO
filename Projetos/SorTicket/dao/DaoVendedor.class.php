<?php

require_once 'DbConnection.class.php';
require_once 'DaoGenerico.interface.php';
require_once '../../modelo/Vendedor.class.php';

class DaoVendedor implements DaoGenerico {

    public function atualizar($objeto) {
        $conexao = DbConnection::retornaConexao();
        $sql = "UPDATE Vendedor SET idPessoa=:idPessoa,numeroConta=:numeroConta,banco=:banco,operacao=:operacao,agencia=:agencia,cpf=:cpf where idPessoa=:idPessoa ";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':idPessoa', $objeto->getIdPessoa(), PDO::PARAM_INT);
        $stmt->bindValue(':numeroConta', $objeto->getNumeroConta(), PDO::PARAM_INT);
        $stmt->bindValue(':banco', $objeto->getBanco(), PDO::PARAM_STR);
        $stmt->bindValue(':operacao', $objeto->getOperacao(), PDO::PARAM_STR);
        $stmt->bindValue(':agencia', $objeto->getAgencia(), PDO::PARAM_STR);
        $stmt->bindValue(':cpf', $objeto->getCpf(), PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function inserir($objeto) {
        $conexao = DbConnection::retornaConexao();
        $sql = "INSERT Vendedor(idPessoa,numeroConta,banco,operacao,agencia,cpf) VALUES (:idPessoa,:numeroConta,:banco,:operacao,:agencia,:cpf)";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':idPessoa', $objeto->getIdPessoa(), PDO::PARAM_INT);
        $stmt->bindValue(':numeroConta', $objeto->getNumeroConta(), PDO::PARAM_INT);
        $stmt->bindValue(':banco', $objeto->getBanco(), PDO::PARAM_STR);
        $stmt->bindValue(':operacao', $objeto->getOperacao(), PDO::PARAM_STR);
        $stmt->bindValue(':agencia', $objeto->getAgencia(), PDO::PARAM_STR);
        $stmt->bindValue(':cpf', $objeto->getCpf(), PDO::PARAM_STR);
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
            $resultado = new Vendedor($statement['idPessoa'], $statement['numeroConta'], $statement['banco'], $statement['operacao'], $statement['agencia'], $statement['cpf']);
        }
        return $resultado;
    }

    public function obterTodosByParametro($sql, $atributoSQL = NULL, $variavel = NULL, $pdoPARAM = NULL) {
        $conexao = DbConnection::retornaConexao();
        $statement = $conexao->prepare($sql);
        if($atributoSQL != null):
        $statement->bindValue($atributoSQL, $variavel, $pdoPARAM);
        endif;
        $statement->execute();
        $statement = $statement->fetchAll(PDO::FETCH_ASSOC);
        $lista = null;
        if ($statement != false && !empty($statement)) {
            foreach ($statement as $linha) {
                $lista [] = new Vendedor($statement['idPessoa'], $statement['numeroConta'], $statement['banco'], $statement['operacao'], $statement['agencia'], $statement['cpf']);
            }
        }
        return $lista;
    }

    public function remover($objeto) {
        $conexao = DbConnection::retornaConexao();
        $sql = "delete from  Vendedor where idPessoa=:idPessoa a";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':idPessoa', $objeto->getIdPessoa(), PDO::PARAM_INT);
        $stmt->bindValue(':numeroConta', $objeto->getNumeroConta(), PDO::PARAM_INT);
        $stmt->bindValue(':banco', $objeto->getBanco(), PDO::PARAM_STR);
        $stmt->bindValue(':operacao', $objeto->getOperacao(), PDO::PARAM_STR);
        $stmt->bindValue(':agencia', $objeto->getAgencia(), PDO::PARAM_STR);
        $stmt->bindValue(':cpf', $objeto->getCpf(), PDO::PARAM_STR);
        return $stmt->execute();
    }

}
