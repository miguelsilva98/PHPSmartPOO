&lt;?php
require_once 'DbConnection.class.php';
        require_once 'DaoGenerico.interface.php';
        require_once '../../modelo/Aluno.class.php';

        class DaoAluno implements DaoGenerico {

        public function atualizar($objeto) {
         $conexao = DbConnection::retornaConexao();
        $sql = "UPDATE Aluno SET idAluno=:idAluno,idade=:idade,sexo=:sexo where idAluno=:idAluno ";
$stmt = $conexao->prepare($sql);
$stmt->bindValue(':idAluno', $objeto->getIdAluno(),PDO::PARAM_INT);
$stmt->bindValue(':idade', $objeto->getIdade(),PDO::PARAM_INT);
$stmt->bindValue(':sexo', $objeto->getSexo(),PDO::PARAM_STR);
 return $stmt->execute();
        
        }

        public function inserir($objeto) {
        $conexao = DbConnection::retornaConexao();
        $sql = "INSERT Aluno(idAluno,idade,sexo) VALUES (:idAluno,:idade,:sexo)";$stmt = $conexao->prepare($sql);
$stmt->bindValue(':idAluno', $objeto->getIdAluno(),PDO::PARAM_INT);
$stmt->bindValue(':idade', $objeto->getIdade(),PDO::PARAM_INT);
$stmt->bindValue(':sexo', $objeto->getSexo(),PDO::PARAM_STR);
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
            $resultado = new Aluno($statement['idAluno'],$statement['idade'],$statement['sexo']);
        }
        return $resultado;
        }

        public function obterTodosByParametro($sql, $atributoSQL=NULL, $variavel=NULL, $pdoPARAM=NULL) {
        $conexao = DbConnection::retornaConexao();
        $statement = $conexao->prepare($sql);
        \if($atributoSQL != null):
        $statement->bindValue($atributoSQL, $variavel, $pdoPARAM);
        ndif;
        $statement->execute();
        $statement = $statement->fetchAll(PDO::FETCH_ASSOC);
        $lista = null;
        if ($statement != false && !empty($statement)) {
            foreach ($statement as $linha) {
                $lista [] = new Aluno($statement['idAluno'],$statement['idade'],$statement['sexo']);
            }
        }
        return $lista;
    }


    public function remover($objeto) {
        $conexao = DbConnection::retornaConexao();
        $sql = "delete from  Aluno where idAluno=:idAluno a";$stmt = $conexao->prepare($sql);
$stmt->bindValue(':idAluno', $objeto->getIdAluno(),PDO::PARAM_INT);
$stmt->bindValue(':idade', $objeto->getIdade(),PDO::PARAM_INT);
$stmt->bindValue(':sexo', $objeto->getSexo(),PDO::PARAM_STR);
 return $stmt->execute();
    }

    }