<?php 
require_once 'DbConnection.class.php';
        require_once 'DaoGenerico.interface.php';
        require_once '../../modelo/Comentar.class.php';

        class DaoComentar implements DaoGenerico {

        public function atualizar($objeto) {
         $conexao = DbConnection::retornaConexao();
        $sql = "UPDATE Comentar SET idLogin=:idLogin,idEvento=:idEvento,idComentario=:idComentario where idLogin=:idLogin and idEvento=:idEvento and idComentario=:idComentario ";
$stmt = $conexao->prepare($sql);
$stmt->bindValue(':idLogin', $objeto->getIdLogin(),PDO::PARAM_INT);
$stmt->bindValue(':idEvento', $objeto->getIdEvento(),PDO::PARAM_INT);
$stmt->bindValue(':idComentario', $objeto->getIdComentario(),PDO::PARAM_INT);
 return $stmt->execute();
        
        }

        public function inserir($objeto) {
        $conexao = DbConnection::retornaConexao();
        $sql = "INSERT Comentar(idLogin,idEvento,idComentario) VALUES (:idLogin,:idEvento,:idComentario)";$stmt = $conexao->prepare($sql);
$stmt->bindValue(':idLogin', $objeto->getIdLogin(),PDO::PARAM_INT);
$stmt->bindValue(':idEvento', $objeto->getIdEvento(),PDO::PARAM_INT);
$stmt->bindValue(':idComentario', $objeto->getIdComentario(),PDO::PARAM_INT);
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
            $resultado = new Comentar($statement['idLogin'],$statement['idEvento'],$statement['idComentario']);
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
                $lista [] = new Comentar($statement['idLogin'],$statement['idEvento'],$statement['idComentario']);
            }
        }
        return $lista;
    }


    public function remover($objeto) {
        $conexao = DbConnection::retornaConexao();
        $sql = "delete from  Comentar where idLogin=:idLogin and idEvento=:idEvento and idComentario=:idComentario ";$stmt = $conexao->prepare($sql);
$stmt->bindValue(':idLogin', $objeto->getIdLogin(),PDO::PARAM_INT);
$stmt->bindValue(':idEvento', $objeto->getIdEvento(),PDO::PARAM_INT);
$stmt->bindValue(':idComentario', $objeto->getIdComentario(),PDO::PARAM_INT);
 return $stmt->execute();
    }

    }