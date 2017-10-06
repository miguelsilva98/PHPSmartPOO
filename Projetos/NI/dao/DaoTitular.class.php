<?php 
require_once 'DbConnection.class.php';
        require_once 'DaoGenerico.interface.php';
        require_once '../../modelo/Titular.class.php';

        class DaoTitular implements DaoGenerico {

        public function atualizar($objeto) {
         $conexao = DbConnection::retornaConexao();
        $sql = "UPDATE Titular SET idLogin=:idLogin,idContaBancaria=:idContaBancaria where idLogin=:idLogin and idContaBancaria=:idContaBancaria ";
$stmt = $conexao->prepare($sql);
$stmt->bindValue(':idLogin', $objeto->getIdLogin(),PDO::PARAM_INT);
$stmt->bindValue(':idContaBancaria', $objeto->getIdContaBancaria(),PDO::PARAM_INT);
 return $stmt->execute();
        
        }

        public function inserir($objeto) {
        $conexao = DbConnection::retornaConexao();
        $sql = "INSERT Titular(idLogin,idContaBancaria) VALUES (:idLogin,:idContaBancaria)";$stmt = $conexao->prepare($sql);
$stmt->bindValue(':idLogin', $objeto->getIdLogin(),PDO::PARAM_INT);
$stmt->bindValue(':idContaBancaria', $objeto->getIdContaBancaria(),PDO::PARAM_INT);
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
            $resultado = new Titular($statement['idLogin'],$statement['idContaBancaria']);
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
                $lista [] = new Titular($statement['idLogin'],$statement['idContaBancaria']);
            }
        }
        return $lista;
    }


    public function remover($objeto) {
        $conexao = DbConnection::retornaConexao();
        $sql = "delete from  Titular where idLogin=:idLogin and idContaBancaria=:idContaBancaria ";$stmt = $conexao->prepare($sql);
$stmt->bindValue(':idLogin', $objeto->getIdLogin(),PDO::PARAM_INT);
$stmt->bindValue(':idContaBancaria', $objeto->getIdContaBancaria(),PDO::PARAM_INT);
 return $stmt->execute();
    }

    }