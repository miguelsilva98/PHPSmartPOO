<?php 
require_once 'DbConnection.class.php';
        require_once 'DaoGenerico.interface.php';
        require_once '../../modelo/PessoaFisica.class.php';

        class DaoPessoaFisica implements DaoGenerico {

        public function atualizar($objeto) {
         $conexao = DbConnection::retornaConexao();
        $sql = "UPDATE PessoaFisica SET idLogin=:idLogin,nomePessoa=:nomePessoa,dataNascimento=:dataNascimento,cpf=:cpf,sexo=:sexo,numCelular=:numCelular,numFixo=:numFixo,idEndereco=:idEndereco,cargo=:cargo,deficiencia=:deficiencia where idLogin=:idLogin ";
$stmt = $conexao->prepare($sql);
$stmt->bindValue(':idLogin', $objeto->getIdLogin(),PDO::PARAM_INT);
$stmt->bindValue(':nomePessoa', $objeto->getNomePessoa(),PDO::PARAM_STR);
$stmt->bindValue(':dataNascimento', $objeto->getDataNascimento(),PDO::PARAM_STR);
$stmt->bindValue(':cpf', $objeto->getCpf(),PDO::PARAM_STR);
$stmt->bindValue(':sexo', $objeto->getSexo(),PDO::PARAM_STR);
$stmt->bindValue(':numCelular', $objeto->getNumCelular(),PDO::PARAM_STR);
$stmt->bindValue(':numFixo', $objeto->getNumFixo(),PDO::PARAM_STR);
$stmt->bindValue(':idEndereco', $objeto->getIdEndereco(),PDO::PARAM_INT);
$stmt->bindValue(':cargo', $objeto->getCargo(),PDO::PARAM_INT);
$stmt->bindValue(':deficiencia', $objeto->getDeficiencia(),PDO::PARAM_STR);
 return $stmt->execute();
        
        }

        public function inserir($objeto) {
        $conexao = DbConnection::retornaConexao();
        $sql = "INSERT PessoaFisica(idLogin,nomePessoa,dataNascimento,cpf,sexo,numCelular,numFixo,idEndereco,cargo,deficiencia) VALUES (:idLogin,:nomePessoa,:dataNascimento,:cpf,:sexo,:numCelular,:numFixo,:idEndereco,:cargo,:deficiencia)";$stmt = $conexao->prepare($sql);
$stmt->bindValue(':idLogin', $objeto->getIdLogin(),PDO::PARAM_INT);
$stmt->bindValue(':nomePessoa', $objeto->getNomePessoa(),PDO::PARAM_STR);
$stmt->bindValue(':dataNascimento', $objeto->getDataNascimento(),PDO::PARAM_STR);
$stmt->bindValue(':cpf', $objeto->getCpf(),PDO::PARAM_STR);
$stmt->bindValue(':sexo', $objeto->getSexo(),PDO::PARAM_STR);
$stmt->bindValue(':numCelular', $objeto->getNumCelular(),PDO::PARAM_STR);
$stmt->bindValue(':numFixo', $objeto->getNumFixo(),PDO::PARAM_STR);
$stmt->bindValue(':idEndereco', $objeto->getIdEndereco(),PDO::PARAM_INT);
$stmt->bindValue(':cargo', $objeto->getCargo(),PDO::PARAM_INT);
$stmt->bindValue(':deficiencia', $objeto->getDeficiencia(),PDO::PARAM_STR);
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
            $resultado = new PessoaFisica($statement['idLogin'],$statement['nomePessoa'],$statement['dataNascimento'],$statement['cpf'],$statement['sexo'],$statement['numCelular'],$statement['numFixo'],$statement['idEndereco'],$statement['cargo'],$statement['deficiencia']);
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
                $lista [] = new PessoaFisica($statement['idLogin'],$statement['nomePessoa'],$statement['dataNascimento'],$statement['cpf'],$statement['sexo'],$statement['numCelular'],$statement['numFixo'],$statement['idEndereco'],$statement['cargo'],$statement['deficiencia']);
            }
        }
        return $lista;
    }


    public function remover($objeto) {
        $conexao = DbConnection::retornaConexao();
        $sql = "delete from  PessoaFisica where idLogin=:idLogin ";$stmt = $conexao->prepare($sql);
$stmt->bindValue(':idLogin', $objeto->getIdLogin(),PDO::PARAM_INT);
$stmt->bindValue(':nomePessoa', $objeto->getNomePessoa(),PDO::PARAM_STR);
$stmt->bindValue(':dataNascimento', $objeto->getDataNascimento(),PDO::PARAM_STR);
$stmt->bindValue(':cpf', $objeto->getCpf(),PDO::PARAM_STR);
$stmt->bindValue(':sexo', $objeto->getSexo(),PDO::PARAM_STR);
$stmt->bindValue(':numCelular', $objeto->getNumCelular(),PDO::PARAM_STR);
$stmt->bindValue(':numFixo', $objeto->getNumFixo(),PDO::PARAM_STR);
$stmt->bindValue(':idEndereco', $objeto->getIdEndereco(),PDO::PARAM_INT);
$stmt->bindValue(':cargo', $objeto->getCargo(),PDO::PARAM_INT);
$stmt->bindValue(':deficiencia', $objeto->getDeficiencia(),PDO::PARAM_STR);
 return $stmt->execute();
    }

    }