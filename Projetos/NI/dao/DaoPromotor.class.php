<?php 
require_once 'DbConnection.class.php';
        require_once 'DaoGenerico.interface.php';
        require_once '../../modelo/Promotor.class.php';

        class DaoPromotor implements DaoGenerico {

        public function atualizar($objeto) {
         $conexao = DbConnection::retornaConexao();
        $sql = "UPDATE Promotor SET idEvento=:idEvento,idLogin=:idLogin,contaPadrao=:contaPadrao where idEvento=:idEvento and idLogin=:idLogin ";
$stmt = $conexao->prepare($sql);
$stmt->bindValue(':idEvento', $objeto->getIdEvento(),PDO::PARAM_INT);
$stmt->bindValue(':idLogin', $objeto->getIdLogin(),PDO::PARAM_INT);
$stmt->bindValue(':contaPadrao', $objeto->getContaPadrao(),PDO::PARAM_STR);
 return $stmt->execute();
        
        }

        public function inserir($objeto) {
        $conexao = DbConnection::retornaConexao();
        $sql = "INSERT Promotor(idEvento,idLogin,contaPadrao) VALUES (:idEvento,:idLogin,:contaPadrao)";$stmt = $conexao->prepare($sql);
$stmt->bindValue(':idEvento', $objeto->getIdEvento(),PDO::PARAM_INT);
$stmt->bindValue(':idLogin', $objeto->getIdLogin(),PDO::PARAM_INT);
$stmt->bindValue(':contaPadrao', $objeto->getContaPadrao(),PDO::PARAM_STR);
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
            $resultado = new Promotor($statement['idEvento'],$statement['idLogin'],$statement['contaPadrao']);
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
                $lista [] = new Promotor($statement['idEvento'],$statement['idLogin'],$statement['contaPadrao']);
            }
        }
        return $lista;
    }


    public function remover($objeto) {
        $conexao = DbConnection::retornaConexao();
        $sql = "delete from  Promotor where idEvento=:idEvento and idLogin=:idLogin ";$stmt = $conexao->prepare($sql);
$stmt->bindValue(':idEvento', $objeto->getIdEvento(),PDO::PARAM_INT);
$stmt->bindValue(':idLogin', $objeto->getIdLogin(),PDO::PARAM_INT);
$stmt->bindValue(':contaPadrao', $objeto->getContaPadrao(),PDO::PARAM_STR);
 return $stmt->execute();
    }

    }