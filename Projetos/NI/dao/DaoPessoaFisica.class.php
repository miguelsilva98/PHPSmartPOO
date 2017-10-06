<?php

require_once 'DbConnection.class.php';
require_once 'DaoGenerico.interface.php';
require_once '../../modelo/PessoaFisica.class.php';

class DaoPessoaFisica implements DaoGenerico {

    public function atualizar($objeto) {
        $conexao = DbConnection::retornaConexao();
        $sql = "UPDATE PessoaFisica SET idPessoaFisica=:idPessoaFisica,nome=:nome,dataNascimento=:dataNascimento,cpf=:cpf,sexo=:sexo,numCelular=:numCelular,numFixo=:numFixo,statusConta=:statusConta,idEndereco=:idEndereco,deficiencia=:deficiencia,email=:email,ipPessoa=:ipPessoa,foto=:foto where idPessoaFisica=:idPessoaFisica";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':idPessoaFisica', $objeto->getIdPessoaFisica(), PDO::PARAM_INT);
        $stmt->bindValue(':nome', $objeto->getNome(), PDO::PARAM_STR);
        $stmt->bindValue(':dataNascimento', $objeto->getDataNascimento(), PDO::PARAM_STR);
        $stmt->bindValue(':cpf', $objeto->getCpf(), PDO::PARAM_STR);
        $stmt->bindValue(':sexo', $objeto->getSexo(), PDO::PARAM_STR);
        $stmt->bindValue(':numCelular', $objeto->getNumCelular(), PDO::PARAM_STR);
        $stmt->bindValue(':numFixo', $objeto->getNumFixo(), PDO::PARAM_STR);
        $stmt->bindValue(':statusConta', $objeto->getStatusConta(), PDO::PARAM_STR);
        $stmt->bindValue(':idEndereco', $objeto->getIdEndereco(), PDO::PARAM_INT);
        $stmt->bindValue(':deficiencia', $objeto->getDeficiencia(), PDO::PARAM_STR);
        $stmt->bindValue(':email', $objeto->getEmail(), PDO::PARAM_STR);
        $stmt->bindValue(':ipPessoa', $objeto->getIpPessoa(), PDO::PARAM_STR);
        $stmt->bindValue(':foto', $objeto->getFoto(), PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function inserir($objeto) {
        $conexao = DbConnection::retornaConexao();
        $sql = "INSERT PessoaFisica(idPessoaFisica,nome,dataNascimento,cpf,sexo,numCelular,numFixo,statusConta,idEndereco,deficiencia,email,ipPessoa,foto) VALUES (:idPessoaFisica,:nome,:dataNascimento,:cpf,:sexo,:numCelular,:numFixo,:statusConta,:idEndereco,:deficiencia,:email,:ipPessoa,:foto)";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':idPessoaFisica', $objeto->getIdPessoaFisica(), PDO::PARAM_INT);
        $stmt->bindValue(':nome', $objeto->getNome(), PDO::PARAM_STR);
        $stmt->bindValue(':dataNascimento', $objeto->getDataNascimento(), PDO::PARAM_STR);
        $stmt->bindValue(':cpf', $objeto->getCpf(), PDO::PARAM_STR);
        $stmt->bindValue(':sexo', $objeto->getSexo(), PDO::PARAM_STR);
        $stmt->bindValue(':numCelular', $objeto->getNumCelular(), PDO::PARAM_STR);
        $stmt->bindValue(':numFixo', $objeto->getNumFixo(), PDO::PARAM_STR);
        $stmt->bindValue(':statusConta', $objeto->getStatusConta(), PDO::PARAM_STR);
        $stmt->bindValue(':idEndereco', $objeto->getIdEndereco(), PDO::PARAM_INT);
        $stmt->bindValue(':deficiencia', $objeto->getDeficiencia(), PDO::PARAM_STR);
        $stmt->bindValue(':email', $objeto->getEmail(), PDO::PARAM_STR);
        $stmt->bindValue(':ipPessoa', $objeto->getIpPessoa(), PDO::PARAM_STR);
        $stmt->bindValue(':foto', $objeto->getFoto(), PDO::PARAM_STR);
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
            $resultado = new PessoaFisica($statement['idPessoaFisica'], $statement['nome'], $statement['dataNascimento'], $statement['cpf'], $statement['sexo'], $statement['numCelular'], $statement['numFixo'], $statement['statusConta'], $statement['idEndereco'], $statement['deficiencia'], $statement['email'], $statement['ipPessoa'], $statement['foto']);
        }
        return $resultado;
    }

    public function obterTodosByParametro($sql, $atributoSQL = NULL, $variavel = NULL, $pdoPARAM = NULL) {
        $conexao = DbConnection::retornaConexao();
        $statement = $conexao->prepare($sql);
        if ($atributoSQL != null):
            $statement->bindValue($atributoSQL, $variavel, $pdoPARAM);
        endif;
        $statement->execute();
        $statement = $statement->fetchAll(PDO::FETCH_ASSOC);
        $lista = null;
        if ($statement != false && !empty($statement)) {
            foreach ($statement as $linha) {
                $lista [] = new PessoaFisica($statement['idPessoaFisica'], $statement['nome'], $statement['dataNascimento'], $statement['cpf'], $statement['sexo'], $statement['numCelular'], $statement['numFixo'], $statement['statusConta'], $statement['idEndereco'], $statement['deficiencia'], $statement['email'], $statement['ipPessoa'], $statement['foto']);
            }
        }
        return $lista;
    }

    public function remover($objeto) {
        $conexao = DbConnection::retornaConexao();
        $sql = "delete from  PessoaFisica where idPessoaFisica=:idPessoaFisica";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':idPessoaFisica', $objeto->getIdPessoaFisica(), PDO::PARAM_INT);
        $stmt->bindValue(':nome', $objeto->getNome(), PDO::PARAM_STR);
        $stmt->bindValue(':dataNascimento', $objeto->getDataNascimento(), PDO::PARAM_STR);
        $stmt->bindValue(':cpf', $objeto->getCpf(), PDO::PARAM_STR);
        $stmt->bindValue(':sexo', $objeto->getSexo(), PDO::PARAM_STR);
        $stmt->bindValue(':numCelular', $objeto->getNumCelular(), PDO::PARAM_STR);
        $stmt->bindValue(':numFixo', $objeto->getNumFixo(), PDO::PARAM_STR);
        $stmt->bindValue(':statusConta', $objeto->getStatusConta(), PDO::PARAM_STR);
        $stmt->bindValue(':idEndereco', $objeto->getIdEndereco(), PDO::PARAM_INT);
        $stmt->bindValue(':deficiencia', $objeto->getDeficiencia(), PDO::PARAM_STR);
        $stmt->bindValue(':email', $objeto->getEmail(), PDO::PARAM_STR);
        $stmt->bindValue(':ipPessoa', $objeto->getIpPessoa(), PDO::PARAM_STR);
        $stmt->bindValue(':foto', $objeto->getFoto(), PDO::PARAM_STR);
        return $stmt->execute();
    }

}
