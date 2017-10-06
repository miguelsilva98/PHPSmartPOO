<?php 
require_once 'DbConnection.class.php';
        require_once 'DaoGenerico.interface.php';
        require_once '../../modelo/Sorteio.class.php';

        class DaoSorteio implements DaoGenerico {

        public function atualizar($objeto) {
         $conexao = DbConnection::retornaConexao();
        $sql = "UPDATE Sorteio SET idTicket=:idTicket,dataSorteio=:dataSorteio,numSorteio=:numSorteio where idTicket=:idTicket a";
$stmt = $conexao->prepare($sql);
$stmt->bindValue(':idTicket', $objeto->getIdTicket(),PDO::PARAM_INT);
$stmt->bindValue(':dataSorteio', $objeto->getDataSorteio(),PDO::PARAM_STR);
$stmt->bindValue(':numSorteio', $objeto->getNumSorteio(),PDO::PARAM_INT);
 return $stmt->execute();
        
        }

        public function inserir($objeto) {
        $conexao = DbConnection::retornaConexao();
        $sql = "INSERT Sorteio(idTicket,dataSorteio,numSorteio) VALUES (:idTicket,:dataSorteio,:numSorteio)";$stmt = $conexao->prepare($sql);
$stmt->bindValue(':idTicket', $objeto->getIdTicket(),PDO::PARAM_INT);
$stmt->bindValue(':dataSorteio', $objeto->getDataSorteio(),PDO::PARAM_STR);
$stmt->bindValue(':numSorteio', $objeto->getNumSorteio(),PDO::PARAM_INT);
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
            $resultado = new Sorteio($statement['idTicket'],$statement['dataSorteio'],$statement['numSorteio']);
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
                $lista [] = new Sorteio($statement['idTicket'],$statement['dataSorteio'],$statement['numSorteio']);
            }
        }
        return $lista;
    }


    public function remover($objeto) {
        $conexao = DbConnection::retornaConexao();
        $sql = "delete from  Sorteio where idTicket=:idTicket a";$stmt = $conexao->prepare($sql);
$stmt->bindValue(':idTicket', $objeto->getIdTicket(),PDO::PARAM_INT);
$stmt->bindValue(':dataSorteio', $objeto->getDataSorteio(),PDO::PARAM_STR);
$stmt->bindValue(':numSorteio', $objeto->getNumSorteio(),PDO::PARAM_INT);
 return $stmt->execute();
    }

    }