<?php

        if (!isset($_SESSION)) {
            session_start();
        }

        require_once '../../controle/ControleCategoria.class.php';
        require_once '../../modelo/Categoria.class.php';

        if (!empty($_REQUEST['acao'])) {
              $acao = $_REQUEST['acao'];
        }

        $controle = new ControleCategoria();

        switch ($acao) :
case 'inserir': 
         if (!empty($_POST['IdCategoria']) && !empty($_POST['nomeCategoria']) && !empty($_POST['idadeMin']) && !empty($_POST['idadeMax']) && !empty($_POST['restricao']) && !empty($_POST['percurso']) && !empty($_POST['sexoCategoria']) && !empty($_POST['valorCategoria']) && !empty($_POST['idModalidade'])):
$categoria= new Categoria($_POST['IdCategoria'] , $_POST['nomeCategoria'] , $_POST['idadeMin'] , $_POST['idadeMax'] , $_POST['restricao'] , $_POST['percurso'] , $_POST['sexoCategoria'] , $_POST['valorCategoria'] , $_POST['idModalidade']); 
       $controle->inserir($categoria);
           endif; 
           break;
case 'atualizar': 
         if (!empty($_POST['IdCategoria']) && !empty($_POST['nomeCategoria']) && !empty($_POST['idadeMin']) && !empty($_POST['idadeMax']) && !empty($_POST['restricao']) && !empty($_POST['percurso']) && !empty($_POST['sexoCategoria']) && !empty($_POST['valorCategoria']) && !empty($_POST['idModalidade'])):
$categoria= new Categoria($_POST['IdCategoria'] , $_POST['nomeCategoria'] , $_POST['idadeMin'] , $_POST['idadeMax'] , $_POST['restricao'] , $_POST['percurso'] , $_POST['sexoCategoria'] , $_POST['valorCategoria'] , $_POST['idModalidade']); 
       $controle->atualizar($categoria);
           endif; 
           break;
case 'remover': 
         if (!empty($_POST['IdCategoria']) && !empty($_POST['nomeCategoria']) && !empty($_POST['idadeMin']) && !empty($_POST['idadeMax']) && !empty($_POST['restricao']) && !empty($_POST['percurso']) && !empty($_POST['sexoCategoria']) && !empty($_POST['valorCategoria']) && !empty($_POST['idModalidade'])):
$categoria= new Categoria($_POST['IdCategoria'] , $_POST['nomeCategoria'] , $_POST['idadeMin'] , $_POST['idadeMax'] , $_POST['restricao'] , $_POST['percurso'] , $_POST['sexoCategoria'] , $_POST['valorCategoria'] , $_POST['idModalidade']); 
       $controle->remover($categoria);
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