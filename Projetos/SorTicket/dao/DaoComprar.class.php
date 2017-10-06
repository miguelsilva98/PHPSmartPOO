<?php

require_once 'DbConnection.class.php';
require_once 'DaoGenerico.interface.php';
require_once '../../modelo/Comprar.class.php';

class DaoComprar implements DaoGenerico {

    public function atualizar($objeto) {
        $conexao = DbConnection::retornaConexao();
        $sql = "UPDATE Comprar SET idTicket=:idTicket,idPessoa=:idPessoa,codPagamento=:codPagamento where idTicket=:idTicket andidPessoa=:idPessoa ";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':idTicket', $objeto->getIdTicket(), PDO::PARAM_INT);
        $stmt->bindValue(':idPessoa', $objeto->getIdPessoa(), PDO::PARAM_INT);
        $stmt->bindValue(':codPagamento', $objeto->getCodPagamento(), PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function inserir($objeto) {
        $conexao = DbConnection::retornaConexao();
        $sql = "INSERT Comprar(idTicket,idPessoa,codPagamento) VALUES (:idTicket,:idPessoa,:codPagamento)";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':idTicket', $objeto->getIdTicket(), PDO::PARAM_INT);
        $stmt->bindValue(':idPessoa', $objeto->getIdPessoa(), PDO::PARAM_INT);
        $stmt->bindValue(':codPagamento', $objeto->getCodPagamento(), PDO::PARAM_STR);
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
            $resultado = new Comprar($statement['idTicket'], $statement['idPessoa'], $statement['codPagamento']);
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
                $lista [] = new Comprar($statement['idTicket'], $statement['idPessoa'], $statement['codPagamento']);
            }
        }
        return $lista;
    }

    public function remover($objeto) {
        $conexao = DbConnection::retornaConexao();
        $sql = "delete from  Comprar where idTicket=:idTicket and idPessoa=:idPessoa a";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':idTicket', $objeto->getIdTicket(), PDO::PARAM_INT);
        $stmt->bindValue(':idPessoa', $objeto->getIdPessoa(), PDO::PARAM_INT);
        $stmt->bindValue(':codPagamento', $objeto->getCodPagamento(), PDO::PARAM_STR);
        return $stmt->execute();
    }

}
