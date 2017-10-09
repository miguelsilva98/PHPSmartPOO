<?php 
require_once 'DbConnection.class.php';
        require_once 'DaoGenerico.interface.php';
        require_once '../../modelo/Evento.class.php';

        class DaoEvento implements DaoGenerico {

        public function atualizar($objeto) {
         $conexao = DbConnection::retornaConexao();
        $sql = "UPDATE Evento SET idEvento=:idEvento,nomeEvento=:nomeEvento,banner=:banner,descricao=:descricao,dataEvento=:dataEvento,dataCriado=:dataCriado,regulamento=:regulamento,kit=:kit,localEvento=:localEvento,vencimentoPagamento=:vencimentoPagamento where idEvento=:idEvento ";
$stmt = $conexao->prepare($sql);
$stmt->bindValue(':idEvento', $objeto->getIdEvento(),PDO::PARAM_INT);
$stmt->bindValue(':nomeEvento', $objeto->getNomeEvento(),PDO::PARAM_STR);
$stmt->bindValue(':banner', $objeto->getBanner(),PDO::PARAM_STR);
$stmt->bindValue(':descricao', $objeto->getDescricao(),PDO::PARAM_STR);
$stmt->bindValue(':dataEvento', $objeto->getDataEvento(),PDO::PARAM_STR);
$stmt->bindValue(':dataCriado', $objeto->getDataCriado(),PDO::PARAM_STR);
$stmt->bindValue(':regulamento', $objeto->getRegulamento(),PDO::PARAM_STR);
$stmt->bindValue(':kit', $objeto->getKit(),PDO::PARAM_STR);
$stmt->bindValue(':localEvento', $objeto->getLocalEvento(),PDO::PARAM_STR);
$stmt->bindValue(':vencimentoPagamento', $objeto->getVencimentoPagamento(),PDO::PARAM_STR);
 return $stmt->execute();
        
        }

        public function inserir($objeto) {
        $conexao = DbConnection::retornaConexao();
        $sql = "INSERT Evento(idEvento,nomeEvento,banner,descricao,dataEvento,dataCriado,regulamento,kit,localEvento,vencimentoPagamento) VALUES (:idEvento,:nomeEvento,:banner,:descricao,:dataEvento,:dataCriado,:regulamento,:kit,:localEvento,:vencimentoPagamento)";$stmt = $conexao->prepare($sql);
$stmt->bindValue(':idEvento', $objeto->getIdEvento(),PDO::PARAM_INT);
$stmt->bindValue(':nomeEvento', $objeto->getNomeEvento(),PDO::PARAM_STR);
$stmt->bindValue(':banner', $objeto->getBanner(),PDO::PARAM_STR);
$stmt->bindValue(':descricao', $objeto->getDescricao(),PDO::PARAM_STR);
$stmt->bindValue(':dataEvento', $objeto->getDataEvento(),PDO::PARAM_STR);
$stmt->bindValue(':dataCriado', $objeto->getDataCriado(),PDO::PARAM_STR);
$stmt->bindValue(':regulamento', $objeto->getRegulamento(),PDO::PARAM_STR);
$stmt->bindValue(':kit', $objeto->getKit(),PDO::PARAM_STR);
$stmt->bindValue(':localEvento', $objeto->getLocalEvento(),PDO::PARAM_STR);
$stmt->bindValue(':vencimentoPagamento', $objeto->getVencimentoPagamento(),PDO::PARAM_STR);
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
            $resultado = new Evento($statement['idEvento'],$statement['nomeEvento'],$statement['banner'],$statement['descricao'],$statement['dataEvento'],$statement['dataCriado'],$statement['regulamento'],$statement['kit'],$statement['localEvento'],$statement['vencimentoPagamento']);
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
                $lista [] = new Evento($statement['idEvento'],$statement['nomeEvento'],$statement['banner'],$statement['descricao'],$statement['dataEvento'],$statement['dataCriado'],$statement['regulamento'],$statement['kit'],$statement['localEvento'],$statement['vencimentoPagamento']);
            }
        }
        return $lista;
    }


    public function remover($objeto) {
        $conexao = DbConnection::retornaConexao();
        $sql = "delete from  Evento where idEvento=:idEvento ";$stmt = $conexao->prepare($sql);
$stmt->bindValue(':idEvento', $objeto->getIdEvento(),PDO::PARAM_INT);
$stmt->bindValue(':nomeEvento', $objeto->getNomeEvento(),PDO::PARAM_STR);
$stmt->bindValue(':banner', $objeto->getBanner(),PDO::PARAM_STR);
$stmt->bindValue(':descricao', $objeto->getDescricao(),PDO::PARAM_STR);
$stmt->bindValue(':dataEvento', $objeto->getDataEvento(),PDO::PARAM_STR);
$stmt->bindValue(':dataCriado', $objeto->getDataCriado(),PDO::PARAM_STR);
$stmt->bindValue(':regulamento', $objeto->getRegulamento(),PDO::PARAM_STR);
$stmt->bindValue(':kit', $objeto->getKit(),PDO::PARAM_STR);
$stmt->bindValue(':localEvento', $objeto->getLocalEvento(),PDO::PARAM_STR);
$stmt->bindValue(':vencimentoPagamento', $objeto->getVencimentoPagamento(),PDO::PARAM_STR);
 return $stmt->execute();
    }

    }