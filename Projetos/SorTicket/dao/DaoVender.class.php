<?php
require_once 'DbConnection.class.php';
        require_once 'DaoGenerico.interface.php';
        require_once '../../modelo/Vender.class.php';

        class DaoVender implements DaoGenerico {

        public function atualizar($objeto) {
         $conexao = DbConnection::retornaConexao();
        $sql = "UPDATE Vender SET idPessoa=:idPessoa,idTicket=:idTicket where idPessoa=:idPessoa andidTicket=:idTicket ";
$stmt = $conexao->prepare($sql);
$stmt->bindValue(':idPessoa', $objeto->getIdPessoa(),PDO::PARAM_INT);
$stmt->bindValue(':idTicket', $objeto->getIdTicket(),PDO::PARAM_INT);
 return $stmt->execute();
        
        }

        public function inserir($objeto) {
        $conexao = DbConnection::retornaConexao();
        $sql = "INSERT Vender(idPessoa,idTicket) VALUES (:idPessoa,:idTicket)";$stmt = $conexao->prepare($sql);
$stmt->bindValue(':idPessoa', $objeto->getIdPessoa(),PDO::PARAM_INT);
$stmt->bindValue(':idTicket', $objeto->getIdTicket(),PDO::PARAM_INT);
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
            $resultado = new Vender($statement['idPessoa'],$statement['idTicket']);
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
                $lista [] = new Vender($statement['idPessoa'],$statement['idTicket']);
            }
        }
        return $lista;
    }


    public function remover($objeto) {
        $conexao = DbConnection::retornaConexao();
        $sql = "delete from  Vender where idPessoa=:idPessoa and idTicket=:idTicket a";$stmt = $conexao->prepare($sql);
$stmt->bindValue(':idPessoa', $objeto->getIdPessoa(),PDO::PARAM_INT);
$stmt->bindValue(':idTicket', $objeto->getIdTicket(),PDO::PARAM_INT);
 return $stmt->execute();
    }

    }