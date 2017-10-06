<?php

        if (!isset($_SESSION)) {
            session_start();
        }

        require_once '../../controle/ControlePessoaFisica.class.php';
        require_once '../../modelo/PessoaFisica.class.php';

        if (!empty($_REQUEST['acao'])) {
              $acao = $_REQUEST['acao'];
        }

        $controle = new ControlePessoaFisica();

        switch ($acao) :
case 'inserir': 
         if (!empty($_POST['idPessoaFisica']) && !empty($_POST['nome']) && !empty($_POST['dataNascimento']) && !empty($_POST['cpf']) && !empty($_POST['sexo']) && !empty($_POST['numCelular']) && !empty($_POST['numFixo']) && !empty($_POST['statusConta']) && !empty($_POST['idEndereco']) && !empty($_POST['deficiencia']) && !empty($_POST['email']) && !empty($_POST['ipPessoa']) && !empty($_POST['foto'])):
$pessoafisica= new PessoaFisica($_POST['idPessoaFisica'] , $_POST['nome'] , $_POST['dataNascimento'] , $_POST['cpf'] , $_POST['sexo'] , $_POST['numCelular'] , $_POST['numFixo'] , $_POST['statusConta'] , $_POST['idEndereco'] , $_POST['deficiencia'] , $_POST['email'] , $_POST['ipPessoa'] , $_POST['foto']); 
       $controle->inserir($pessoafisica);
           endif; 
           break;
case 'atualizar': 
         if (!empty($_POST['idPessoaFisica']) && !empty($_POST['nome']) && !empty($_POST['dataNascimento']) && !empty($_POST['cpf']) && !empty($_POST['sexo']) && !empty($_POST['numCelular']) && !empty($_POST['numFixo']) && !empty($_POST['statusConta']) && !empty($_POST['idEndereco']) && !empty($_POST['deficiencia']) && !empty($_POST['email']) && !empty($_POST['ipPessoa']) && !empty($_POST['foto'])):
$pessoafisica= new PessoaFisica($_POST['idPessoaFisica'] , $_POST['nome'] , $_POST['dataNascimento'] , $_POST['cpf'] , $_POST['sexo'] , $_POST['numCelular'] , $_POST['numFixo'] , $_POST['statusConta'] , $_POST['idEndereco'] , $_POST['deficiencia'] , $_POST['email'] , $_POST['ipPessoa'] , $_POST['foto']); 
       $controle->atualizar($pessoafisica);
           endif; 
           break;
case 'remover': 
         if (!empty($_POST['idPessoaFisica']) && !empty($_POST['nome']) && !empty($_POST['dataNascimento']) && !empty($_POST['cpf']) && !empty($_POST['sexo']) && !empty($_POST['numCelular']) && !empty($_POST['numFixo']) && !empty($_POST['statusConta']) && !empty($_POST['idEndereco']) && !empty($_POST['deficiencia']) && !empty($_POST['email']) && !empty($_POST['ipPessoa']) && !empty($_POST['foto'])):
$pessoafisica= new PessoaFisica($_POST['idPessoaFisica'] , $_POST['nome'] , $_POST['dataNascimento'] , $_POST['cpf'] , $_POST['sexo'] , $_POST['numCelular'] , $_POST['numFixo'] , $_POST['statusConta'] , $_POST['idEndereco'] , $_POST['deficiencia'] , $_POST['email'] , $_POST['ipPessoa'] , $_POST['foto']); 
       $controle->remover($pessoafisica);
           endif; 
           break;case 'listarTodos':
        $lista = $controle->obterTodos();
        break;
        case 'consultar':
        if (!empty($_POST['id'])):
            $controle->obterById($_POST['id']);
        endif;
           break;
        default :
          echo "Não foi possivel realizar esta ação ";
        endswitch;