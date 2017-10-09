<?php

        if (!isset($_SESSION)) {
            session_start();
        }

        require_once '../../controle/ControleComentarioEvento.class.php';
        require_once '../../modelo/ComentarioEvento.class.php';

        if (!empty($_REQUEST['acao'])) {
              $acao = $_REQUEST['acao'];
        }

        $controle = new ControleComentarioEvento();

        switch ($acao) :
case 'inserir': 
         if (!empty($_POST['idComentario']) && !empty($_POST['dataComentario']) && !empty($_POST['comentario'])):
$comentarioevento= new ComentarioEvento($_POST['idComentario'] , $_POST['dataComentario'] , $_POST['comentario']); 
       $controle->inserir($comentarioevento);
           endif; 
           break;
case 'atualizar': 
         if (!empty($_POST['idComentario']) && !empty($_POST['dataComentario']) && !empty($_POST['comentario'])):
$comentarioevento= new ComentarioEvento($_POST['idComentario'] , $_POST['dataComentario'] , $_POST['comentario']); 
       $controle->atualizar($comentarioevento);
           endif; 
           break;
case 'remover': 
         if (!empty($_POST['idComentario']) && !empty($_POST['dataComentario']) && !empty($_POST['comentario'])):
$comentarioevento= new ComentarioEvento($_POST['idComentario'] , $_POST['dataComentario'] , $_POST['comentario']); 
       $controle->remover($comentarioevento);
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