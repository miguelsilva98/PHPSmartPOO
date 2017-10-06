<?php 
require_once 'DbConnection.class.php';
        require_once 'DaoGenerico.interface.php';
        require_once '../../modelo/Login.class.php';

        class DaoLogin implements DaoGenerico {

        public function atualizar($objeto) {
         $conexao = DbConnection::retornaConexao();
        $sql = "UPDATE Login SET idLogin=:idLogin,email=:email,senha=:senha,idSocial=:idSocial,statusConta=:statusConta,foto=:foto,ipLogin=:ipLogin where idLogin=:idLogin ";
$stmt = $conexao->prepare($sql);
$stmt->bindValue(':idLogin', $objeto->getIdLogin(),PDO::PARAM_INT);
$stmt->bindValue(':email', $objeto->getEmail(),PDO::PARAM_STR);
$stmt->bindValue(':senha', $objeto->getSenha(),PDO::PARAM_STR);
$stmt->bindValue(':idSocial', $objeto->getIdSocial(),PDO::PARAM_STR);
$stmt->bindValue(':statusConta', $objeto->getStatusConta(),PDO::PARAM_STR);
$stmt->bindValue(':foto', $objeto->getFoto(),PDO::PARAM_STR);
$stmt->bindValue(':ipLogin', $objeto->getIpLogin(),PDO::PARAM_STR);
 return $stmt->execute();
        
        }

        public function inserir($objeto) {
        $conexao = DbConnection::retornaConexao();
        $sql = "INSERT Login(idLogin,email,senha,idSocial,statusConta,foto,ipLogin) VALUES (:idLogin,:email,:senha,:idSocial,:statusConta,:foto,:ipLogin)";$stmt = $conexao->prepare($sql);
$stmt->bindValue(':idLogin', $objeto->getIdLogin(),PDO::PARAM_INT);
$stmt->bindValue(':email', $objeto->getEmail(),PDO::PARAM_STR);
$stmt->bindValue(':senha', $objeto->getSenha(),PDO::PARAM_STR);
$stmt->bindValue(':idSocial', $objeto->getIdSocial(),PDO::PARAM_STR);
$stmt->bindValue(':statusConta', $objeto->getStatusConta(),PDO::PARAM_STR);
$stmt->bindValue(':foto', $objeto->getFoto(),PDO::PARAM_STR);
$stmt->bindValue(':ipLogin', $objeto->getIpLogin(),PDO::PARAM_STR);
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
            $resultado = new Login($statement['idLogin'],$statement['email'],$statement['senha'],$statement['idSocial'],$statement['statusConta'],$statement['foto'],$statement['ipLogin']);
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
                $lista [] = new Login($statement['idLogin'],$statement['email'],$statement['senha'],$statement['idSocial'],$statement['statusConta'],$statement['foto'],$statement['ipLogin']);
            }
        }
        return $lista;
    }


    public function remover($objeto) {
        $conexao = DbConnection::retornaConexao();
        $sql = "delete from  Login where idLogin=:idLogin ";$stmt = $conexao->prepare($sql);
$stmt->bindValue(':idLogin', $objeto->getIdLogin(),PDO::PARAM_INT);
$stmt->bindValue(':email', $objeto->getEmail(),PDO::PARAM_STR);
$stmt->bindValue(':senha', $objeto->getSenha(),PDO::PARAM_STR);
$stmt->bindValue(':idSocial', $objeto->getIdSocial(),PDO::PARAM_STR);
$stmt->bindValue(':statusConta', $objeto->getStatusConta(),PDO::PARAM_STR);
$stmt->bindValue(':foto', $objeto->getFoto(),PDO::PARAM_STR);
$stmt->bindValue(':ipLogin', $objeto->getIpLogin(),PDO::PARAM_STR);
 return $stmt->execute();
    }

    }