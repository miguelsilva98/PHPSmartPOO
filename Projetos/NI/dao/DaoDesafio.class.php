<?php 
require_once 'DbConnection.class.php';
        require_once 'DaoGenerico.interface.php';
        require_once '../../modelo/Desafio.class.php';

        class DaoDesafio implements DaoGenerico {

        public function atualizar($objeto) {
         $conexao = DbConnection::retornaConexao();
        $sql = "UPDATE Desafio SET idDesafio=:idDesafio,idDesafiante=:idDesafiante,idEvento=:idEvento,idDesafiado=:idDesafiado,situacao=:situacao,dataDesafio=:dataDesafio where idDesafio=:idDesafio ";
$stmt = $conexao->prepare($sql);
$stmt->bindValue(':idDesafio', $objeto->getIdDesafio(),PDO::PARAM_INT);
$stmt->bindValue(':idDesafiante', $objeto->getIdDesafiante(),PDO::PARAM_INT);
$stmt->bindValue(':idEvento', $objeto->getIdEvento(),PDO::PARAM_INT);
$stmt->bindValue(':idDesafiado', $objeto->getIdDesafiado(),PDO::PARAM_INT);
$stmt->bindValue(':situacao', $objeto->getSituacao(),PDO::PARAM_STR);
$stmt->bindValue(':dataDesafio', $objeto->getDataDesafio(),PDO::PARAM_STR);
 return $stmt->execute();
        
        }

        public function inserir($objeto) {
        $conexao = DbConnection::retornaConexao();
        $sql = "INSERT Desafio(idDesafio,idDesafiante,idEvento,idDesafiado,situacao,dataDesafio) VALUES (:idDesafio,:idDesafiante,:idEvento,:idDesafiado,:situacao,:dataDesafio)";$stmt = $conexao->prepare($sql);
$stmt->bindValue(':idDesafio', $objeto->getIdDesafio(),PDO::PARAM_INT);
$stmt->bindValue(':idDesafiante', $objeto->getIdDesafiante(),PDO::PARAM_INT);
$stmt->bindValue(':idEvento', $objeto->getIdEvento(),PDO::PARAM_INT);
$stmt->bindValue(':idDesafiado', $objeto->getIdDesafiado(),PDO::PARAM_INT);
$stmt->bindValue(':situacao', $objeto->getSituacao(),PDO::PARAM_STR);
$stmt->bindValue(':dataDesafio', $objeto->getDataDesafio(),PDO::PARAM_STR);
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
            $resultado = new Desafio($statement['idDesafio'],$statement['idDesafiante'],$statement['idEvento'],$statement['idDesafiado'],$statement['situacao'],$statement['dataDesafio']);
        }
        return $resultado;
        }

        public function obterTodosByParametro($sql, $atributoSQL=NULL, $variavel=NULL, $pdoPARAM=NULL) {
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
                $lista [] = new Desafio($statement['idDesafio'],$statement['idDesafiante'],$statement['idEvento'],$statement['idDesafiado'],$statement['situacao'],$statement['dataDesafio']);
            }
        }
        return $lista;
    }


    public function remover($objeto) {
        $conexao = DbConnection::retornaConexao();
        $sql = "delete from  Desafio where idDesafio=:idDesafio ";$stmt = $conexao->prepare($sql);
$stmt->bindValue(':idDesafio', $objeto->getIdDesafio(),PDO::PARAM_INT);
$stmt->bindValue(':idDesafiante', $objeto->getIdDesafiante(),PDO::PARAM_INT);
$stmt->bindValue(':idEvento', $objeto->getIdEvento(),PDO::PARAM_INT);
$stmt->bindValue(':idDesafiado', $objeto->getIdDesafiado(),PDO::PARAM_INT);
$stmt->bindValue(':situacao', $objeto->getSituacao(),PDO::PARAM_STR);
$stmt->bindValue(':dataDesafio', $objeto->getDataDesafio(),PDO::PARAM_STR);
 return $stmt->execute();
    }

    }