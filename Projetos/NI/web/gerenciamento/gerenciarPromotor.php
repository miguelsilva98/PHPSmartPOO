<?php

        if (!isset($_SESSION)) {
            session_start();
        }

        require_once '../../controle/ControlePromotor.class.php';
        require_once '../../modelo/Promotor.class.php';

        if (!empty($_REQUEST['acao'])) {
              $acao = $_REQUEST['acao'];
        }

        $controle = new ControlePromotor();

        switch ($acao) :
case 'inserir': 
         if (!empty($_POST['idEvento']) && !empty($_POST['idLogin']) && !empty($_POST['contaPadrao'])):
$promotor= new Promotor($_POST['idEvento'] , $_POST['idLogin'] , $_POST['contaPadrao']); 
       $controle->inserir($promotor);
           endif; 
           break;
case 'atualizar': 
         if (!empty($_POST['idEvento']) && !empty($_POST['idLogin']) && !empty($_POST['contaPadrao'])):
$promotor= new Promotor($_POST['idEvento'] , $_POST['idLogin'] , $_POST['contaPadrao']); 
       $controle->atualizar($promotor);
           endif; 
           break;
case 'remover': 
         if (!empty($_POST['idEvento']) && !empty($_POST['idLogin']) && !empty($_POST['contaPadrao'])):
$promotor= new Promotor($_POST['idEvento'] , $_POST['idLogin'] , $_POST['contaPadrao']); 
       $controle->remover($promotor);
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