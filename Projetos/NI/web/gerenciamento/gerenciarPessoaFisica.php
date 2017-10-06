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
         if (!empty($_POST['idLogin']) && !empty($_POST['nomePessoa']) && !empty($_POST['dataNascimento']) && !empty($_POST['cpf']) && !empty($_POST['sexo']) && !empty($_POST['numCelular']) && !empty($_POST['numFixo']) && !empty($_POST['idEndereco']) && !empty($_POST['cargo']) && !empty($_POST['deficiencia'])):
$pessoafisica= new PessoaFisica($_POST['idLogin'] , $_POST['nomePessoa'] , $_POST['dataNascimento'] , $_POST['cpf'] , $_POST['sexo'] , $_POST['numCelular'] , $_POST['numFixo'] , $_POST['idEndereco'] , $_POST['cargo'] , $_POST['deficiencia']); 
       $controle->inserir($pessoafisica);
           endif; 
           break;
case 'atualizar': 
         if (!empty($_POST['idLogin']) && !empty($_POST['nomePessoa']) && !empty($_POST['dataNascimento']) && !empty($_POST['cpf']) && !empty($_POST['sexo']) && !empty($_POST['numCelular']) && !empty($_POST['numFixo']) && !empty($_POST['idEndereco']) && !empty($_POST['cargo']) && !empty($_POST['deficiencia'])):
$pessoafisica= new PessoaFisica($_POST['idLogin'] , $_POST['nomePessoa'] , $_POST['dataNascimento'] , $_POST['cpf'] , $_POST['sexo'] , $_POST['numCelular'] , $_POST['numFixo'] , $_POST['idEndereco'] , $_POST['cargo'] , $_POST['deficiencia']); 
       $controle->atualizar($pessoafisica);
           endif; 
           break;
case 'remover': 
         if (!empty($_POST['idLogin']) && !empty($_POST['nomePessoa']) && !empty($_POST['dataNascimento']) && !empty($_POST['cpf']) && !empty($_POST['sexo']) && !empty($_POST['numCelular']) && !empty($_POST['numFixo']) && !empty($_POST['idEndereco']) && !empty($_POST['cargo']) && !empty($_POST['deficiencia'])):
$pessoafisica= new PessoaFisica($_POST['idLogin'] , $_POST['nomePessoa'] , $_POST['dataNascimento'] , $_POST['cpf'] , $_POST['sexo'] , $_POST['numCelular'] , $_POST['numFixo'] , $_POST['idEndereco'] , $_POST['cargo'] , $_POST['deficiencia']); 
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