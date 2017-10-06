<?php

        if (!isset($_SESSION)) {
            session_start();
        }

        require_once '../../controle/ControleVendedor.class.php';
        require_once '../../modelo/Vendedor.class.php';

        if (!empty($_REQUEST['acao'])) {
              $acao = $_REQUEST['acao'];
        }

        $controle = new ControleVendedor();

        switch ($acao) :
case 'inserir': 
         if (!empty($_POST['idPessoa']) && !empty($_POST['numeroConta']) && !empty($_POST['banco']) && !empty($_POST['operacao']) && !empty($_POST['agencia']) && !empty($_POST['cpf'])):
$vendedor= new Vendedor($_POST['idPessoa'] , $_POST['numeroConta'] , $_POST['banco'] , $_POST['operacao'] , $_POST['agencia'] , $_POST['cpf']); 
       $controle->inserir($vendedor);
           endif; 
           break;
case 'atualizar': 
         if (!empty($_POST['idPessoa']) && !empty($_POST['numeroConta']) && !empty($_POST['banco']) && !empty($_POST['operacao']) && !empty($_POST['agencia']) && !empty($_POST['cpf'])):
$vendedor= new Vendedor($_POST['idPessoa'] , $_POST['numeroConta'] , $_POST['banco'] , $_POST['operacao'] , $_POST['agencia'] , $_POST['cpf']); 
       $controle->atualizar($vendedor);
           endif; 
           break;
case 'remover': 
         if (!empty($_POST['idPessoa']) && !empty($_POST['numeroConta']) && !empty($_POST['banco']) && !empty($_POST['operacao']) && !empty($_POST['agencia']) && !empty($_POST['cpf'])):
$vendedor= new Vendedor($_POST['idPessoa'] , $_POST['numeroConta'] , $_POST['banco'] , $_POST['operacao'] , $_POST['agencia'] , $_POST['cpf']); 
       $controle->remover($vendedor);
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