<?php

        if (!isset($_SESSION)) {
            session_start();
        }

        require_once '../../controle/ControleTicket.class.php';
        require_once '../../modelo/Ticket.class.php';

        if (!empty($_REQUEST['acao'])) {
              $acao = $_REQUEST['acao'];
        }

        $controle = new ControleTicket();

        switch ($acao) :
case 'inserir': 
         if (!empty($_POST['idTicket']) && !empty($_POST['nomeTicket']) && !empty($_POST['valor']) && !empty($_POST['descricao'])):
$ticket= new Ticket($_POST['idTicket'] , $_POST['nomeTicket'] , $_POST['valor'] , $_POST['descricao']); 
       $controle->inserir($ticket);
           endif; 
           break;
case 'atualizar': 
         if (!empty($_POST['idTicket']) && !empty($_POST['nomeTicket']) && !empty($_POST['valor']) && !empty($_POST['descricao'])):
$ticket= new Ticket($_POST['idTicket'] , $_POST['nomeTicket'] , $_POST['valor'] , $_POST['descricao']); 
       $controle->atualizar($ticket);
           endif; 
           break;
case 'remover': 
         if (!empty($_POST['idTicket']) && !empty($_POST['nomeTicket']) && !empty($_POST['valor']) && !empty($_POST['descricao'])):
$ticket= new Ticket($_POST['idTicket'] , $_POST['nomeTicket'] , $_POST['valor'] , $_POST['descricao']); 
       $controle->remover($ticket);
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