<?php

        if (!isset($_SESSION)) {
            session_start();
        }

        require_once '../../controle/ControleTitular.class.php';
        require_once '../../modelo/Titular.class.php';

        if (!empty($_REQUEST['acao'])) {
              $acao = $_REQUEST['acao'];
        }

        $controle = new ControleTitular();

        switch ($acao) :
case 'inserir': 
         if (!empty($_POST['idLogin']) && !empty($_POST['idContaBancaria'])):
$titular= new Titular($_POST['idLogin'] , $_POST['idContaBancaria']); 
       $controle->inserir($titular);
           endif; 
           break;
case 'atualizar': 
         if (!empty($_POST['idLogin']) && !empty($_POST['idContaBancaria'])):
$titular= new Titular($_POST['idLogin'] , $_POST['idContaBancaria']); 
       $controle->atualizar($titular);
           endif; 
           break;
case 'remover': 
         if (!empty($_POST['idLogin']) && !empty($_POST['idContaBancaria'])):
$titular= new Titular($_POST['idLogin'] , $_POST['idContaBancaria']); 
       $controle->remover($titular);
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