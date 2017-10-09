<?php 
require_once 'DbConnection.class.php';
        require_once 'DaoGenerico.interface.php';
        require_once '../../modelo/Modalidade.class.php';

        class DaoModalidade implements DaoGenerico {

        public function atualizar($objeto) {
         $conexao = DbConnection::retornaConexao();
        $sql = "UPDATE Modalidade SET idModalidade=:idModalidade,nomeModalidade=:nomeModalidade,idEvento=:idEvento where idModalidade=:idModalidade ";
$stmt = $conexao->prepare($sql);
$stmt->bindValue(':idModalidade', $objeto->getIdModalidade(),PDO::PARAM_INT);
$stmt->bindValue(':nomeModalidade', $objeto->getNomeModalidade(),PDO::PARAM_STR);
$stmt->bindValue(':idEvento', $objeto->getIdEvento(),PDO::PARAM_STR);
 return $stmt->execute();
        
        }

        public function inserir($objeto) {
        $conexao = DbConnection::retornaConexao();
        $sql = "INSERT Modalidade(idModalidade,nomeModalidade,idEvento) VALUES (:idModalidade,:nomeModalidade,:idEvento)";$stmt = $conexao->prepare($sql);
$stmt->bindValue(':idModalidade', $objeto->getIdModalidade(),PDO::PARAM_INT);
$stmt->bindValue(':nomeModalidade', $objeto->getNomeModalidade(),PDO::PARAM_STR);
$stmt->bindValue(':idEvento', $objeto->getIdEvento(),PDO::PARAM_STR);
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
            $resultado = new Modalidade($statement['idModalidade'],$statement['nomeModalidade'],$statement['idEvento']);
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
                $lista [] = new Modalidade($statement['idModalidade'],$statement['nomeModalidade'],$statement['idEvento']);
            }
        }
        return $lista;
    }


    public function remover($objeto) {
        $conexao = DbConnection::retornaConexao();
        $sql = "delete from  Modalidade where idModalidade=:idModalidade ";$stmt = $conexao->prepare($sql);
$stmt->bindValue(':idModalidade', $objeto->getIdModalidade(),PDO::PARAM_INT);
$stmt->bindValue(':nomeModalidade', $objeto->getNomeModalidade(),PDO::PARAM_STR);
$stmt->bindValue(':idEvento', $objeto->getIdEvento(),PDO::PARAM_STR);
 return $stmt->execute();
    }

    }