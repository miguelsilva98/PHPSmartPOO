<?php

        if (!isset($_SESSION)) {
            session_start();
        }

        require_once '../../controle/ControleSorteio.class.php';
        require_once '../../modelo/Sorteio.class.php';

        if (!empty($_REQUEST['acao'])) {
              $acao = $_REQUEST['acao'];
        }

        $controle = new ControleSorteio();

        switch ($acao) :
case 'inserir': 
         if (!empty($_POST['idTicket']) && !empty($_POST['dataSorteio']) && !empty($_POST['numSorteio'])):
$sorteio= new Sorteio($_POST['idTicket'] , $_POST['dataSorteio'] , $_POST['numSorteio']); 
       $controle->inserir($sorteio);
           endif; 
           break;
case 'atualizar': 
         if (!empty($_POST['idTicket']) && !empty($_POST['dataSorteio']) && !empty($_POST['numSorteio'])):
$sorteio= new Sorteio($_POST['idTicket'] , $_POST['dataSorteio'] , $_POST['numSorteio']); 
       $controle->atualizar($sorteio);
           endif; 
           break;
case 'remover': 
         if (!empty($_POST['idTicket']) && !empty($_POST['dataSorteio']) && !empty($_POST['numSorteio'])):
$sorteio= new Sorteio($_POST['idTicket'] , $_POST['dataSorteio'] , $_POST['numSorteio']); 
       $controle->remover($sorteio);
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