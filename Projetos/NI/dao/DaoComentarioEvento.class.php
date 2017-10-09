<?php 
require_once 'DbConnection.class.php';
        require_once 'DaoGenerico.interface.php';
        require_once '../../modelo/ComentarioEvento.class.php';

        class DaoComentarioEvento implements DaoGenerico {

        public function atualizar($objeto) {
         $conexao = DbConnection::retornaConexao();
        $sql = "UPDATE ComentarioEvento SET idComentario=:idComentario,dataComentario=:dataComentario,comentario=:comentario where idComentario=:idComentario ";
$stmt = $conexao->prepare($sql);
$stmt->bindValue(':idComentario', $objeto->getIdComentario(),PDO::PARAM_INT);
$stmt->bindValue(':dataComentario', $objeto->getDataComentario(),PDO::PARAM_STR);
$stmt->bindValue(':comentario', $objeto->getComentario(),PDO::PARAM_STR);
 return $stmt->execute();
        
        }

        public function inserir($objeto) {
        $conexao = DbConnection::retornaConexao();
        $sql = "INSERT ComentarioEvento(idComentario,dataComentario,comentario) VALUES (:idComentario,:dataComentario,:comentario)";$stmt = $conexao->prepare($sql);
$stmt->bindValue(':idComentario', $objeto->getIdComentario(),PDO::PARAM_INT);
$stmt->bindValue(':dataComentario', $objeto->getDataComentario(),PDO::PARAM_STR);
$stmt->bindValue(':comentario', $objeto->getComentario(),PDO::PARAM_STR);
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
            $resultado = new ComentarioEvento($statement['idComentario'],$statement['dataComentario'],$statement['comentario']);
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
                $lista [] = new ComentarioEvento($statement['idComentario'],$statement['dataComentario'],$statement['comentario']);
            }
        }
        return $lista;
    }


    public function remover($objeto) {
        $conexao = DbConnection::retornaConexao();
        $sql = "delete from  ComentarioEvento where idComentario=:idComentario ";$stmt = $conexao->prepare($sql);
$stmt->bindValue(':idComentario', $objeto->getIdComentario(),PDO::PARAM_INT);
$stmt->bindValue(':dataComentario', $objeto->getDataComentario(),PDO::PARAM_STR);
$stmt->bindValue(':comentario', $objeto->getComentario(),PDO::PARAM_STR);
 return $stmt->execute();
    }

    }