<?php

        if (!isset($_SESSION)) {
            session_start();
        }

        require_once '../../controle/ControleImagem.class.php';
        require_once '../../modelo/Imagem.class.php';

        if (!empty($_REQUEST['acao'])) {
              $acao = $_REQUEST['acao'];
        }

        $controle = new ControleImagem();

        switch ($acao) :
case 'inserir': 
         if (!empty($_POST['idImagem']) && !empty($_POST['imagem'])):
$imagem= new Imagem($_POST['idImagem'] , $_POST['imagem']); 
       $controle->inserir($imagem);
           endif; 
           break;
case 'atualizar': 
         if (!empty($_POST['idImagem']) && !empty($_POST['imagem'])):
$imagem= new Imagem($_POST['idImagem'] , $_POST['imagem']); 
       $controle->atualizar($imagem);
           endif; 
           break;
case 'remover': 
         if (!empty($_POST['idImagem']) && !empty($_POST['imagem'])):
$imagem= new Imagem($_POST['idImagem'] , $_POST['imagem']); 
       $controle->remover($imagem);
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