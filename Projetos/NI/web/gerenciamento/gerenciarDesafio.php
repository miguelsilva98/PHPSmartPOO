<?php

        if (!isset($_SESSION)) {
            session_start();
        }

        require_once '../../controle/ControleDesafio.class.php';
        require_once '../../modelo/Desafio.class.php';

        if (!empty($_REQUEST['acao'])) {
              $acao = $_REQUEST['acao'];
        }

        $controle = new ControleDesafio();

        switch ($acao) :
case 'inserir': 
         if (!empty($_POST['idDesafio']) && !empty($_POST['idDesafiante']) && !empty($_POST['idEvento']) && !empty($_POST['idDesafiado']) && !empty($_POST['situacao']) && !empty($_POST['dataDesafio'])):
$desafio= new Desafio($_POST['idDesafio'] , $_POST['idDesafiante'] , $_POST['idEvento'] , $_POST['idDesafiado'] , $_POST['situacao'] , $_POST['dataDesafio']); 
       $controle->inserir($desafio);
           endif; 
           break;
case 'atualizar': 
         if (!empty($_POST['idDesafio']) && !empty($_POST['idDesafiante']) && !empty($_POST['idEvento']) && !empty($_POST['idDesafiado']) && !empty($_POST['situacao']) && !empty($_POST['dataDesafio'])):
$desafio= new Desafio($_POST['idDesafio'] , $_POST['idDesafiante'] , $_POST['idEvento'] , $_POST['idDesafiado'] , $_POST['situacao'] , $_POST['dataDesafio']); 
       $controle->atualizar($desafio);
           endif; 
           break;
case 'remover': 
         if (!empty($_POST['idDesafio']) && !empty($_POST['idDesafiante']) && !empty($_POST['idEvento']) && !empty($_POST['idDesafiado']) && !empty($_POST['situacao']) && !empty($_POST['dataDesafio'])):
$desafio= new Desafio($_POST['idDesafio'] , $_POST['idDesafiante'] , $_POST['idEvento'] , $_POST['idDesafiado'] , $_POST['situacao'] , $_POST['dataDesafio']); 
       $controle->remover($desafio);
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