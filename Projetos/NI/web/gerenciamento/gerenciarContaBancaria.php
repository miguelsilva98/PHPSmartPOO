<?php

        if (!isset($_SESSION)) {
            session_start();
        }

        require_once '../../controle/ControleContaBancaria.class.php';
        require_once '../../modelo/ContaBancaria.class.php';

        if (!empty($_REQUEST['acao'])) {
              $acao = $_REQUEST['acao'];
        }

        $controle = new ControleContaBancaria();

        switch ($acao) :
case 'inserir': 
         if (!empty($_POST['idContaBancaria']) && !empty($_POST['agencia']) && !empty($_POST['conta']) && !empty($_POST['nomeTitular']) && !empty($_POST['cpf_cnpj']) && !empty($_POST['operacaoConta'])):
$contabancaria= new ContaBancaria($_POST['idContaBancaria'] , $_POST['agencia'] , $_POST['conta'] , $_POST['nomeTitular'] , $_POST['cpf_cnpj'] , $_POST['operacaoConta']); 
       $controle->inserir($contabancaria);
           endif; 
           break;
case 'atualizar': 
         if (!empty($_POST['idContaBancaria']) && !empty($_POST['agencia']) && !empty($_POST['conta']) && !empty($_POST['nomeTitular']) && !empty($_POST['cpf_cnpj']) && !empty($_POST['operacaoConta'])):
$contabancaria= new ContaBancaria($_POST['idContaBancaria'] , $_POST['agencia'] , $_POST['conta'] , $_POST['nomeTitular'] , $_POST['cpf_cnpj'] , $_POST['operacaoConta']); 
       $controle->atualizar($contabancaria);
           endif; 
           break;
case 'remover': 
         if (!empty($_POST['idContaBancaria']) && !empty($_POST['agencia']) && !empty($_POST['conta']) && !empty($_POST['nomeTitular']) && !empty($_POST['cpf_cnpj']) && !empty($_POST['operacaoConta'])):
$contabancaria= new ContaBancaria($_POST['idContaBancaria'] , $_POST['agencia'] , $_POST['conta'] , $_POST['nomeTitular'] , $_POST['cpf_cnpj'] , $_POST['operacaoConta']); 
       $controle->remover($contabancaria);
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