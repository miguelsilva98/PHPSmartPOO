<?php 
require_once 'DbConnection.class.php';
        require_once 'DaoGenerico.interface.php';
        require_once '../../modelo/Imagem.class.php';

        class DaoImagem implements DaoGenerico {

        public function atualizar($objeto) {
         $conexao = DbConnection::retornaConexao();
        $sql = "UPDATE Imagem SET idImagem=:idImagem,imagem=:imagem where idImagem=:idImagem a";
$stmt = $conexao->prepare($sql);
$stmt->bindValue(':idImagem', $objeto->getIdImagem(),PDO::PARAM_INT);
$stmt->bindValue(':imagem', $objeto->getImagem(),PDO::PARAM_STR);
 return $stmt->execute();
        
        }

        public function inserir($objeto) {
        $conexao = DbConnection::retornaConexao();
        $sql = "INSERT Imagem(idImagem,imagem) VALUES (:idImagem,:imagem)";$stmt = $conexao->prepare($sql);
$stmt->bindValue(':idImagem', $objeto->getIdImagem(),PDO::PARAM_INT);
$stmt->bindValue(':imagem', $objeto->getImagem(),PDO::PARAM_STR);
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
            $resultado = new Imagem($statement['idImagem'],$statement['imagem']);
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
                $lista [] = new Imagem($statement['idImagem'],$statement['imagem']);
            }
        }
        return $lista;
    }


    public function remover($objeto) {
        $conexao = DbConnection::retornaConexao();
        $sql = "delete from  Imagem where idImagem=:idImagem a";$stmt = $conexao->prepare($sql);
$stmt->bindValue(':idImagem', $objeto->getIdImagem(),PDO::PARAM_INT);
$stmt->bindValue(':imagem', $objeto->getImagem(),PDO::PARAM_STR);
 return $stmt->execute();
    }

    }