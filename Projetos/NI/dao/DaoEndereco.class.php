<?php 
require_once 'DbConnection.class.php';
        require_once 'DaoGenerico.interface.php';
        require_once '../../modelo/Endereco.class.php';

        class DaoEndereco implements DaoGenerico {

        public function atualizar($objeto) {
         $conexao = DbConnection::retornaConexao();
        $sql = "UPDATE Endereco SET idEndereco=:idEndereco,cep=:cep,endereco=:endereco,numCasa=:numCasa,estado=:estado,cidade=:cidade,bairro=:bairro,complemento=:complemento where idEndereco=:idEndereco ";
$stmt = $conexao->prepare($sql);
$stmt->bindValue(':idEndereco', $objeto->getIdEndereco(),PDO::PARAM_INT);
$stmt->bindValue(':cep', $objeto->getCep(),PDO::PARAM_STR);
$stmt->bindValue(':endereco', $objeto->getEndereco(),PDO::PARAM_STR);
$stmt->bindValue(':numCasa', $objeto->getNumCasa(),PDO::PARAM_STR);
$stmt->bindValue(':estado', $objeto->getEstado(),PDO::PARAM_STR);
$stmt->bindValue(':cidade', $objeto->getCidade(),PDO::PARAM_STR);
$stmt->bindValue(':bairro', $objeto->getBairro(),PDO::PARAM_STR);
$stmt->bindValue(':complemento', $objeto->getComplemento(),PDO::PARAM_STR);
 return $stmt->execute();
        
        }

        public function inserir($objeto) {
        $conexao = DbConnection::retornaConexao();
        $sql = "INSERT Endereco(idEndereco,cep,endereco,numCasa,estado,cidade,bairro,complemento) VALUES (:idEndereco,:cep,:endereco,:numCasa,:estado,:cidade,:bairro,:complemento)";$stmt = $conexao->prepare($sql);
$stmt->bindValue(':idEndereco', $objeto->getIdEndereco(),PDO::PARAM_INT);
$stmt->bindValue(':cep', $objeto->getCep(),PDO::PARAM_STR);
$stmt->bindValue(':endereco', $objeto->getEndereco(),PDO::PARAM_STR);
$stmt->bindValue(':numCasa', $objeto->getNumCasa(),PDO::PARAM_STR);
$stmt->bindValue(':estado', $objeto->getEstado(),PDO::PARAM_STR);
$stmt->bindValue(':cidade', $objeto->getCidade(),PDO::PARAM_STR);
$stmt->bindValue(':bairro', $objeto->getBairro(),PDO::PARAM_STR);
$stmt->bindValue(':complemento', $objeto->getComplemento(),PDO::PARAM_STR);
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
            $resultado = new Endereco($statement['idEndereco'],$statement['cep'],$statement['endereco'],$statement['numCasa'],$statement['estado'],$statement['cidade'],$statement['bairro'],$statement['complemento']);
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
                $lista [] = new Endereco($statement['idEndereco'],$statement['cep'],$statement['endereco'],$statement['numCasa'],$statement['estado'],$statement['cidade'],$statement['bairro'],$statement['complemento']);
            }
        }
        return $lista;
    }


    public function remover($objeto) {
        $conexao = DbConnection::retornaConexao();
        $sql = "delete from  Endereco where idEndereco=:idEndereco ";$stmt = $conexao->prepare($sql);
$stmt->bindValue(':idEndereco', $objeto->getIdEndereco(),PDO::PARAM_INT);
$stmt->bindValue(':cep', $objeto->getCep(),PDO::PARAM_STR);
$stmt->bindValue(':endereco', $objeto->getEndereco(),PDO::PARAM_STR);
$stmt->bindValue(':numCasa', $objeto->getNumCasa(),PDO::PARAM_STR);
$stmt->bindValue(':estado', $objeto->getEstado(),PDO::PARAM_STR);
$stmt->bindValue(':cidade', $objeto->getCidade(),PDO::PARAM_STR);
$stmt->bindValue(':bairro', $objeto->getBairro(),PDO::PARAM_STR);
$stmt->bindValue(':complemento', $objeto->getComplemento(),PDO::PARAM_STR);
 return $stmt->execute();
    }

    }