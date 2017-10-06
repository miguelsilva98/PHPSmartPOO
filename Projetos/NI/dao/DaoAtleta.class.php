<?php 
require_once 'DbConnection.class.php';
        require_once 'DaoGenerico.interface.php';
        require_once '../../modelo/Atleta.class.php';

        class DaoAtleta implements DaoGenerico {

        public function atualizar($objeto) {
         $conexao = DbConnection::retornaConexao();
        $sql = "UPDATE Atleta SET idLogin=:idLogin,idEvento=:idEvento,tamCamisa=:tamCamisa,idCategoria=:idCategoria,dataInscricao=:dataInscricao where idLogin=:idLogin ";
$stmt = $conexao->prepare($sql);
$stmt->bindValue(':idLogin', $objeto->getIdLogin(),PDO::PARAM_INT);
$stmt->bindValue(':idEvento', $objeto->getIdEvento(),PDO::PARAM_INT);
$stmt->bindValue(':tamCamisa', $objeto->getTamCamisa(),PDO::PARAM_STR);
$stmt->bindValue(':idCategoria', $objeto->getIdCategoria(),PDO::PARAM_STR);
$stmt->bindValue(':dataInscricao', $objeto->getDataInscricao(),PDO::PARAM_STR);
 return $stmt->execute();
        
        }

        public function inserir($objeto) {
        $conexao = DbConnection::retornaConexao();
        $sql = "INSERT Atleta(idLogin,idEvento,tamCamisa,idCategoria,dataInscricao) VALUES (:idLogin,:idEvento,:tamCamisa,:idCategoria,:dataInscricao)";$stmt = $conexao->prepare($sql);
$stmt->bindValue(':idLogin', $objeto->getIdLogin(),PDO::PARAM_INT);
$stmt->bindValue(':idEvento', $objeto->getIdEvento(),PDO::PARAM_INT);
$stmt->bindValue(':tamCamisa', $objeto->getTamCamisa(),PDO::PARAM_STR);
$stmt->bindValue(':idCategoria', $objeto->getIdCategoria(),PDO::PARAM_STR);
$stmt->bindValue(':dataInscricao', $objeto->getDataInscricao(),PDO::PARAM_STR);
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
            $resultado = new Atleta($statement['idLogin'],$statement['idEvento'],$statement['tamCamisa'],$statement['idCategoria'],$statement['dataInscricao']);
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
                $lista [] = new Atleta($statement['idLogin'],$statement['idEvento'],$statement['tamCamisa'],$statement['idCategoria'],$statement['dataInscricao']);
            }
        }
        return $lista;
    }


    public function remover($objeto) {
        $conexao = DbConnection::retornaConexao();
        $sql = "delete from  Atleta where idLogin=:idLogin ";$stmt = $conexao->prepare($sql);
$stmt->bindValue(':idLogin', $objeto->getIdLogin(),PDO::PARAM_INT);
$stmt->bindValue(':idEvento', $objeto->getIdEvento(),PDO::PARAM_INT);
$stmt->bindValue(':tamCamisa', $objeto->getTamCamisa(),PDO::PARAM_STR);
$stmt->bindValue(':idCategoria', $objeto->getIdCategoria(),PDO::PARAM_STR);
$stmt->bindValue(':dataInscricao', $objeto->getDataInscricao(),PDO::PARAM_STR);
 return $stmt->execute();
    }

    }