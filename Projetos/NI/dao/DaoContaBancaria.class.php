<?php 
require_once 'DbConnection.class.php';
        require_once 'DaoGenerico.interface.php';
        require_once '../../modelo/ContaBancaria.class.php';

        class DaoContaBancaria implements DaoGenerico {

        public function atualizar($objeto) {
         $conexao = DbConnection::retornaConexao();
        $sql = "UPDATE ContaBancaria SET idContaBancaria=:idContaBancaria,agencia=:agencia,conta=:conta,nomeTitular=:nomeTitular,cpf_cnpj=:cpf_cnpj,operacaoConta=:operacaoConta where idContaBancaria=:idContaBancaria ";
$stmt = $conexao->prepare($sql);
$stmt->bindValue(':idContaBancaria', $objeto->getIdContaBancaria(),PDO::PARAM_INT);
$stmt->bindValue(':agencia', $objeto->getAgencia(),PDO::PARAM_STR);
$stmt->bindValue(':conta', $objeto->getConta(),PDO::PARAM_STR);
$stmt->bindValue(':nomeTitular', $objeto->getNomeTitular(),PDO::PARAM_STR);
$stmt->bindValue(':cpf_cnpj', $objeto->getCpf_cnpj(),PDO::PARAM_STR);
$stmt->bindValue(':operacaoConta', $objeto->getOperacaoConta(),PDO::PARAM_STR);
 return $stmt->execute();
        
        }

        public function inserir($objeto) {
        $conexao = DbConnection::retornaConexao();
        $sql = "INSERT ContaBancaria(idContaBancaria,agencia,conta,nomeTitular,cpf_cnpj,operacaoConta) VALUES (:idContaBancaria,:agencia,:conta,:nomeTitular,:cpf_cnpj,:operacaoConta)";$stmt = $conexao->prepare($sql);
$stmt->bindValue(':idContaBancaria', $objeto->getIdContaBancaria(),PDO::PARAM_INT);
$stmt->bindValue(':agencia', $objeto->getAgencia(),PDO::PARAM_STR);
$stmt->bindValue(':conta', $objeto->getConta(),PDO::PARAM_STR);
$stmt->bindValue(':nomeTitular', $objeto->getNomeTitular(),PDO::PARAM_STR);
$stmt->bindValue(':cpf_cnpj', $objeto->getCpf_cnpj(),PDO::PARAM_STR);
$stmt->bindValue(':operacaoConta', $objeto->getOperacaoConta(),PDO::PARAM_STR);
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
            $resultado = new ContaBancaria($statement['idContaBancaria'],$statement['agencia'],$statement['conta'],$statement['nomeTitular'],$statement['cpf_cnpj'],$statement['operacaoConta']);
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
                $lista [] = new ContaBancaria($statement['idContaBancaria'],$statement['agencia'],$statement['conta'],$statement['nomeTitular'],$statement['cpf_cnpj'],$statement['operacaoConta']);
            }
        }
        return $lista;
    }


    public function remover($objeto) {
        $conexao = DbConnection::retornaConexao();
        $sql = "delete from  ContaBancaria where idContaBancaria=:idContaBancaria ";$stmt = $conexao->prepare($sql);
$stmt->bindValue(':idContaBancaria', $objeto->getIdContaBancaria(),PDO::PARAM_INT);
$stmt->bindValue(':agencia', $objeto->getAgencia(),PDO::PARAM_STR);
$stmt->bindValue(':conta', $objeto->getConta(),PDO::PARAM_STR);
$stmt->bindValue(':nomeTitular', $objeto->getNomeTitular(),PDO::PARAM_STR);
$stmt->bindValue(':cpf_cnpj', $objeto->getCpf_cnpj(),PDO::PARAM_STR);
$stmt->bindValue(':operacaoConta', $objeto->getOperacaoConta(),PDO::PARAM_STR);
 return $stmt->execute();
    }

    }