<?php 
require_once 'DbConnection.class.php';
        require_once 'DaoGenerico.interface.php';
        require_once '../../modelo/Ticket.class.php';

        class DaoTicket implements DaoGenerico {

        public function atualizar($objeto) {
         $conexao = DbConnection::retornaConexao();
        $sql = "UPDATE Ticket SET idTicket=:idTicket,nomeTicket=:nomeTicket,valor=:valor,descricao=:descricao where idTicket=:idTicket a";
$stmt = $conexao->prepare($sql);
$stmt->bindValue(':idTicket', $objeto->getIdTicket(),PDO::PARAM_INT);
$stmt->bindValue(':nomeTicket', $objeto->getNomeTicket(),PDO::PARAM_STR);
$stmt->bindValue(':valor', $objeto->getValor(),PDO::PARAM_STR);
$stmt->bindValue(':descricao', $objeto->getDescricao(),PDO::PARAM_STR);
 return $stmt->execute();
        
        }

        public function inserir($objeto) {
        $conexao = DbConnection::retornaConexao();
        $sql = "INSERT Ticket(idTicket,nomeTicket,valor,descricao) VALUES (:idTicket,:nomeTicket,:valor,:descricao)";$stmt = $conexao->prepare($sql);
$stmt->bindValue(':idTicket', $objeto->getIdTicket(),PDO::PARAM_INT);
$stmt->bindValue(':nomeTicket', $objeto->getNomeTicket(),PDO::PARAM_STR);
$stmt->bindValue(':valor', $objeto->getValor(),PDO::PARAM_STR);
$stmt->bindValue(':descricao', $objeto->getDescricao(),PDO::PARAM_STR);
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
            $resultado = new Ticket($statement['idTicket'],$statement['nomeTicket'],$statement['valor'],$statement['descricao']);
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
                $lista [] = new Ticket($statement['idTicket'],$statement['nomeTicket'],$statement['valor'],$statement['descricao']);
            }
        }
        return $lista;
    }


    public function remover($objeto) {
        $conexao = DbConnection::retornaConexao();
        $sql = "delete from  Ticket where idTicket=:idTicket a";$stmt = $conexao->prepare($sql);
$stmt->bindValue(':idTicket', $objeto->getIdTicket(),PDO::PARAM_INT);
$stmt->bindValue(':nomeTicket', $objeto->getNomeTicket(),PDO::PARAM_STR);
$stmt->bindValue(':valor', $objeto->getValor(),PDO::PARAM_STR);
$stmt->bindValue(':descricao', $objeto->getDescricao(),PDO::PARAM_STR);
 return $stmt->execute();
    }

    }