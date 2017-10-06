<?php

        if (!isset($_SESSION)) {
            session_start();
        }

        require_once '../../controle/ControleVender.class.php';
        require_once '../../modelo/Vender.class.php';

        if (!empty($_REQUEST['acao'])) {
              $acao = $_REQUEST['acao'];
        }

        $controle = new ControleVender();

        switch ($acao) :
case 'inserir': 
         if (!empty($_POST['idPessoa']) && !empty($_POST['idTicket'])):
$vender= new Vender($_POST['idPessoa'] , $_POST['idTicket']); 
       $controle->inserir($vender);
           endif; 
           break;
case 'atualizar': 
         if (!empty($_POST['idPessoa']) && !empty($_POST['idTicket'])):
$vender= new Vender($_POST['idPessoa'] , $_POST['idTicket']); 
       $controle->atualizar($vender);
           endif; 
           break;
case 'remover': 
         if (!empty($_POST['idPessoa']) && !empty($_POST['idTicket'])):
$vender= new Vender($_POST['idPessoa'] , $_POST['idTicket']); 
       $controle->remover($vender);
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