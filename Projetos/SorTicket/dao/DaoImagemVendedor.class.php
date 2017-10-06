<?php

require_once 'DbConnection.class.php';
require_once 'DaoGenerico.interface.php';
require_once '../../modelo/ImagemVendedor.class.php';

class DaoImagemVendedor implements DaoGenerico {

    public function atualizar($objeto) {
        $conexao = DbConnection::retornaConexao();
        $sql = "UPDATE ImagemVendedor SET idImagem=:idImagem,idPessoa=:idPessoa where idImagem=:idImagem and idPessoa=:idPessoa ";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':idImagem', $objeto->getIdImagem(), PDO::PARAM_INT);
        $stmt->bindValue(':idPessoa', $objeto->getIdPessoa(), PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function inserir($objeto) {
        $conexao = DbConnection::retornaConexao();
        $sql = "INSERT ImagemVendedor(idImagem,idPessoa) VALUES (:idImagem,:idPessoa)";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':idImagem', $objeto->getIdImagem(), PDO::PARAM_INT);
        $stmt->bindValue(':idPessoa', $objeto->getIdPessoa(), PDO::PARAM_INT);
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
            $resultado = new ImagemVendedor($statement['idImagem'], $statement['idPessoa']);
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
                $lista [] = new ImagemVendedor($statement['idImagem'], $statement['idPessoa']);
            }
        }
        return $lista;
    }

    public function remover($objeto) {
        $conexao = DbConnection::retornaConexao();
        $sql = "delete from  ImagemVendedor where idImagem=:idImagem and idPessoa=:idPessoa";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':idImagem', $objeto->getIdImagem(), PDO::PARAM_INT);
        $stmt->bindValue(':idPessoa', $objeto->getIdPessoa(), PDO::PARAM_INT);
        return $stmt->execute();
    }

}
