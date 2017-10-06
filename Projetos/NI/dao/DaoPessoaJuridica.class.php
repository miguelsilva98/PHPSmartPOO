<?php 
require_once 'DbConnection.class.php';
        require_once 'DaoGenerico.interface.php';
        require_once '../../modelo/PessoaJuridica.class.php';

        class DaoPessoaJuridica implements DaoGenerico {

        public function atualizar($objeto) {
         $conexao = DbConnection::retornaConexao();
        $sql = "UPDATE PessoaJuridica SET idLogin=:idLogin,cnpj=:cnpj,nomeResp=:nomeResp,statusJuridico=:statusJuridico,idEndereco=:idEndereco where idLogin=:idLogin ";
$stmt = $conexao->prepare($sql);
$stmt->bindValue(':idLogin', $objeto->getIdLogin(),PDO::PARAM_INT);
$stmt->bindValue(':cnpj', $objeto->getCnpj(),PDO::PARAM_STR);
$stmt->bindValue(':nomeResp', $objeto->getNomeResp(),PDO::PARAM_STR);
$stmt->bindValue(':statusJuridico', $objeto->getStatusJuridico(),PDO::PARAM_STR);
$stmt->bindValue(':idEndereco', $objeto->getIdEndereco(),PDO::PARAM_STR);
 return $stmt->execute();
        
        }

        public function inserir($objeto) {
        $conexao = DbConnection::retornaConexao();
        $sql = "INSERT PessoaJuridica(idLogin,cnpj,nomeResp,statusJuridico,idEndereco) VALUES (:idLogin,:cnpj,:nomeResp,:statusJuridico,:idEndereco)";$stmt = $conexao->prepare($sql);
$stmt->bindValue(':idLogin', $objeto->getIdLogin(),PDO::PARAM_INT);
$stmt->bindValue(':cnpj', $objeto->getCnpj(),PDO::PARAM_STR);
$stmt->bindValue(':nomeResp', $objeto->getNomeResp(),PDO::PARAM_STR);
$stmt->bindValue(':statusJuridico', $objeto->getStatusJuridico(),PDO::PARAM_STR);
$stmt->bindValue(':idEndereco', $objeto->getIdEndereco(),PDO::PARAM_STR);
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
            $resultado = new PessoaJuridica($statement['idLogin'],$statement['cnpj'],$statement['nomeResp'],$statement['statusJuridico'],$statement['idEndereco']);
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
                $lista [] = new PessoaJuridica($statement['idLogin'],$statement['cnpj'],$statement['nomeResp'],$statement['statusJuridico'],$statement['idEndereco']);
            }
        }
        return $lista;
    }


    public function remover($objeto) {
        $conexao = DbConnection::retornaConexao();
        $sql = "delete from  PessoaJuridica where idLogin=:idLogin ";$stmt = $conexao->prepare($sql);
$stmt->bindValue(':idLogin', $objeto->getIdLogin(),PDO::PARAM_INT);
$stmt->bindValue(':cnpj', $objeto->getCnpj(),PDO::PARAM_STR);
$stmt->bindValue(':nomeResp', $objeto->getNomeResp(),PDO::PARAM_STR);
$stmt->bindValue(':statusJuridico', $objeto->getStatusJuridico(),PDO::PARAM_STR);
$stmt->bindValue(':idEndereco', $objeto->getIdEndereco(),PDO::PARAM_STR);
 return $stmt->execute();
    }

    }