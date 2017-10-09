<?php 
require_once 'DbConnection.class.php';
        require_once 'DaoGenerico.interface.php';
        require_once '../../modelo/CheckList.class.php';

        class DaoCheckList implements DaoGenerico {

        public function atualizar($objeto) {
         $conexao = DbConnection::retornaConexao();
        $sql = "UPDATE CheckList SET idCheck=:idCheck,idPromotor=:idPromotor,descricao=:descricao,quantidade=:quantidade,inicio=:inicio,fim=:fim,entrega=:entrega,status=:status,responsavel=:responsavel,telefone=:telefone,valor=:valor,tipo=:tipo,observacao=:observacao where idCheck=:idCheck and idPromotor=:idPromotor ";
$stmt = $conexao->prepare($sql);
$stmt->bindValue(':idCheck', $objeto->getIdCheck(),PDO::PARAM_INT);
$stmt->bindValue(':idPromotor', $objeto->getIdPromotor(),PDO::PARAM_STR);
$stmt->bindValue(':descricao', $objeto->getDescricao(),PDO::PARAM_STR);
$stmt->bindValue(':quantidade', $objeto->getQuantidade(),PDO::PARAM_STR);
$stmt->bindValue(':inicio', $objeto->getInicio(),PDO::PARAM_STR);
$stmt->bindValue(':fim', $objeto->getFim(),PDO::PARAM_STR);
$stmt->bindValue(':entrega', $objeto->getEntrega(),PDO::PARAM_STR);
$stmt->bindValue(':status', $objeto->getStatus(),PDO::PARAM_STR);
$stmt->bindValue(':responsavel', $objeto->getResponsavel(),PDO::PARAM_STR);
$stmt->bindValue(':telefone', $objeto->getTelefone(),PDO::PARAM_STR);
$stmt->bindValue(':valor', $objeto->getValor(),PDO::PARAM_STR);
$stmt->bindValue(':tipo', $objeto->getTipo(),PDO::PARAM_STR);
$stmt->bindValue(':observacao', $objeto->getObservacao(),PDO::PARAM_STR);
 return $stmt->execute();
        
        }

        public function inserir($objeto) {
        $conexao = DbConnection::retornaConexao();
        $sql = "INSERT CheckList(idCheck,idPromotor,descricao,quantidade,inicio,fim,entrega,status,responsavel,telefone,valor,tipo,observacao) VALUES (:idCheck,:idPromotor,:descricao,:quantidade,:inicio,:fim,:entrega,:status,:responsavel,:telefone,:valor,:tipo,:observacao)";$stmt = $conexao->prepare($sql);
$stmt->bindValue(':idCheck', $objeto->getIdCheck(),PDO::PARAM_INT);
$stmt->bindValue(':idPromotor', $objeto->getIdPromotor(),PDO::PARAM_STR);
$stmt->bindValue(':descricao', $objeto->getDescricao(),PDO::PARAM_STR);
$stmt->bindValue(':quantidade', $objeto->getQuantidade(),PDO::PARAM_STR);
$stmt->bindValue(':inicio', $objeto->getInicio(),PDO::PARAM_STR);
$stmt->bindValue(':fim', $objeto->getFim(),PDO::PARAM_STR);
$stmt->bindValue(':entrega', $objeto->getEntrega(),PDO::PARAM_STR);
$stmt->bindValue(':status', $objeto->getStatus(),PDO::PARAM_STR);
$stmt->bindValue(':responsavel', $objeto->getResponsavel(),PDO::PARAM_STR);
$stmt->bindValue(':telefone', $objeto->getTelefone(),PDO::PARAM_STR);
$stmt->bindValue(':valor', $objeto->getValor(),PDO::PARAM_STR);
$stmt->bindValue(':tipo', $objeto->getTipo(),PDO::PARAM_STR);
$stmt->bindValue(':observacao', $objeto->getObservacao(),PDO::PARAM_STR);
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
            $resultado = new CheckList($statement['idCheck'],$statement['idPromotor'],$statement['descricao'],$statement['quantidade'],$statement['inicio'],$statement['fim'],$statement['entrega'],$statement['status'],$statement['responsavel'],$statement['telefone'],$statement['valor'],$statement['tipo'],$statement['observacao']);
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
                $lista [] = new CheckList($statement['idCheck'],$statement['idPromotor'],$statement['descricao'],$statement['quantidade'],$statement['inicio'],$statement['fim'],$statement['entrega'],$statement['status'],$statement['responsavel'],$statement['telefone'],$statement['valor'],$statement['tipo'],$statement['observacao']);
            }
        }
        return $lista;
    }


    public function remover($objeto) {
        $conexao = DbConnection::retornaConexao();
        $sql = "delete from  CheckList where idCheck=:idCheck and idPromotor=:idPromotor ";$stmt = $conexao->prepare($sql);
$stmt->bindValue(':idCheck', $objeto->getIdCheck(),PDO::PARAM_INT);
$stmt->bindValue(':idPromotor', $objeto->getIdPromotor(),PDO::PARAM_STR);
$stmt->bindValue(':descricao', $objeto->getDescricao(),PDO::PARAM_STR);
$stmt->bindValue(':quantidade', $objeto->getQuantidade(),PDO::PARAM_STR);
$stmt->bindValue(':inicio', $objeto->getInicio(),PDO::PARAM_STR);
$stmt->bindValue(':fim', $objeto->getFim(),PDO::PARAM_STR);
$stmt->bindValue(':entrega', $objeto->getEntrega(),PDO::PARAM_STR);
$stmt->bindValue(':status', $objeto->getStatus(),PDO::PARAM_STR);
$stmt->bindValue(':responsavel', $objeto->getResponsavel(),PDO::PARAM_STR);
$stmt->bindValue(':telefone', $objeto->getTelefone(),PDO::PARAM_STR);
$stmt->bindValue(':valor', $objeto->getValor(),PDO::PARAM_STR);
$stmt->bindValue(':tipo', $objeto->getTipo(),PDO::PARAM_STR);
$stmt->bindValue(':observacao', $objeto->getObservacao(),PDO::PARAM_STR);
 return $stmt->execute();
    }

    }