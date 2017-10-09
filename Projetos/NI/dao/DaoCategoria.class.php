<?php 
require_once 'DbConnection.class.php';
        require_once 'DaoGenerico.interface.php';
        require_once '../../modelo/Categoria.class.php';

        class DaoCategoria implements DaoGenerico {

        public function atualizar($objeto) {
         $conexao = DbConnection::retornaConexao();
        $sql = "UPDATE Categoria SET IdCategoria=:IdCategoria,nomeCategoria=:nomeCategoria,idadeMin=:idadeMin,idadeMax=:idadeMax,restricao=:restricao,percurso=:percurso,sexoCategoria=:sexoCategoria,valorCategoria=:valorCategoria,idModalidade=:idModalidade where IdCategoria=:IdCategoria ";
$stmt = $conexao->prepare($sql);
$stmt->bindValue(':IdCategoria', $objeto->getIdCategoria(),PDO::PARAM_INT);
$stmt->bindValue(':nomeCategoria', $objeto->getNomeCategoria(),PDO::PARAM_STR);
$stmt->bindValue(':idadeMin', $objeto->getIdadeMin(),PDO::PARAM_INT);
$stmt->bindValue(':idadeMax', $objeto->getIdadeMax(),PDO::PARAM_INT);
$stmt->bindValue(':restricao', $objeto->getRestricao(),PDO::PARAM_STR);
$stmt->bindValue(':percurso', $objeto->getPercurso(),PDO::PARAM_STR);
$stmt->bindValue(':sexoCategoria', $objeto->getSexoCategoria(),PDO::PARAM_STR);
$stmt->bindValue(':valorCategoria', $objeto->getValorCategoria(),PDO::PARAM_STR);
$stmt->bindValue(':idModalidade', $objeto->getIdModalidade(),PDO::PARAM_INT);
 return $stmt->execute();
        
        }

        public function inserir($objeto) {
        $conexao = DbConnection::retornaConexao();
        $sql = "INSERT Categoria(IdCategoria,nomeCategoria,idadeMin,idadeMax,restricao,percurso,sexoCategoria,valorCategoria,idModalidade) VALUES (:IdCategoria,:nomeCategoria,:idadeMin,:idadeMax,:restricao,:percurso,:sexoCategoria,:valorCategoria,:idModalidade)";$stmt = $conexao->prepare($sql);
$stmt->bindValue(':IdCategoria', $objeto->getIdCategoria(),PDO::PARAM_INT);
$stmt->bindValue(':nomeCategoria', $objeto->getNomeCategoria(),PDO::PARAM_STR);
$stmt->bindValue(':idadeMin', $objeto->getIdadeMin(),PDO::PARAM_INT);
$stmt->bindValue(':idadeMax', $objeto->getIdadeMax(),PDO::PARAM_INT);
$stmt->bindValue(':restricao', $objeto->getRestricao(),PDO::PARAM_STR);
$stmt->bindValue(':percurso', $objeto->getPercurso(),PDO::PARAM_STR);
$stmt->bindValue(':sexoCategoria', $objeto->getSexoCategoria(),PDO::PARAM_STR);
$stmt->bindValue(':valorCategoria', $objeto->getValorCategoria(),PDO::PARAM_STR);
$stmt->bindValue(':idModalidade', $objeto->getIdModalidade(),PDO::PARAM_INT);
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
            $resultado = new Categoria($statement['IdCategoria'],$statement['nomeCategoria'],$statement['idadeMin'],$statement['idadeMax'],$statement['restricao'],$statement['percurso'],$statement['sexoCategoria'],$statement['valorCategoria'],$statement['idModalidade']);
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
                $lista [] = new Categoria($statement['IdCategoria'],$statement['nomeCategoria'],$statement['idadeMin'],$statement['idadeMax'],$statement['restricao'],$statement['percurso'],$statement['sexoCategoria'],$statement['valorCategoria'],$statement['idModalidade']);
            }
        }
        return $lista;
    }


    public function remover($objeto) {
        $conexao = DbConnection::retornaConexao();
        $sql = "delete from  Categoria where IdCategoria=:IdCategoria ";$stmt = $conexao->prepare($sql);
$stmt->bindValue(':IdCategoria', $objeto->getIdCategoria(),PDO::PARAM_INT);
$stmt->bindValue(':nomeCategoria', $objeto->getNomeCategoria(),PDO::PARAM_STR);
$stmt->bindValue(':idadeMin', $objeto->getIdadeMin(),PDO::PARAM_INT);
$stmt->bindValue(':idadeMax', $objeto->getIdadeMax(),PDO::PARAM_INT);
$stmt->bindValue(':restricao', $objeto->getRestricao(),PDO::PARAM_STR);
$stmt->bindValue(':percurso', $objeto->getPercurso(),PDO::PARAM_STR);
$stmt->bindValue(':sexoCategoria', $objeto->getSexoCategoria(),PDO::PARAM_STR);
$stmt->bindValue(':valorCategoria', $objeto->getValorCategoria(),PDO::PARAM_STR);
$stmt->bindValue(':idModalidade', $objeto->getIdModalidade(),PDO::PARAM_INT);
 return $stmt->execute();
    }

    }