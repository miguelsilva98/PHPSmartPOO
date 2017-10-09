<?php

        if (!isset($_SESSION)) {
            session_start();
        }

        require_once '../../controle/ControleComentar.class.php';
        require_once '../../modelo/Comentar.class.php';

        if (!empty($_REQUEST['acao'])) {
              $acao = $_REQUEST['acao'];
        }

        $controle = new ControleComentar();

        switch ($acao) :
case 'inserir': 
         if (!empty($_POST['idLogin']) && !empty($_POST['idEvento']) && !empty($_POST['idComentario'])):
$comentar= new Comentar($_POST['idLogin'] , $_POST['idEvento'] , $_POST['idComentario']); 
       $controle->inserir($comentar);
           endif; 
           break;
case 'atualizar': 
         if (!empty($_POST['idLogin']) && !empty($_POST['idEvento']) && !empty($_POST['idComentario'])):
$comentar= new Comentar($_POST['idLogin'] , $_POST['idEvento'] , $_POST['idComentario']); 
       $controle->atualizar($comentar);
           endif; 
           break;
case 'remover': 
         if (!empty($_POST['idLogin']) && !empty($_POST['idEvento']) && !empty($_POST['idComentario'])):
$comentar= new Comentar($_POST['idLogin'] , $_POST['idEvento'] , $_POST['idComentario']); 
       $controle->remover($comentar);
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