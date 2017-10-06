<?php

        if (!isset($_SESSION)) {
            session_start();
        }

        require_once '../../controle/ControleAtleta.class.php';
        require_once '../../modelo/Atleta.class.php';

        if (!empty($_REQUEST['acao'])) {
              $acao = $_REQUEST['acao'];
        }

        $controle = new ControleAtleta();

        switch ($acao) :
case 'inserir': 
         if (!empty($_POST['idLogin']) && !empty($_POST['idEvento']) && !empty($_POST['tamCamisa']) && !empty($_POST['idCategoria']) && !empty($_POST['dataInscricao'])):
$atleta= new Atleta($_POST['idLogin'] , $_POST['idEvento'] , $_POST['tamCamisa'] , $_POST['idCategoria'] , $_POST['dataInscricao']); 
       $controle->inserir($atleta);
           endif; 
           break;
case 'atualizar': 
         if (!empty($_POST['idLogin']) && !empty($_POST['idEvento']) && !empty($_POST['tamCamisa']) && !empty($_POST['idCategoria']) && !empty($_POST['dataInscricao'])):
$atleta= new Atleta($_POST['idLogin'] , $_POST['idEvento'] , $_POST['tamCamisa'] , $_POST['idCategoria'] , $_POST['dataInscricao']); 
       $controle->atualizar($atleta);
           endif; 
           break;
case 'remover': 
         if (!empty($_POST['idLogin']) && !empty($_POST['idEvento']) && !empty($_POST['tamCamisa']) && !empty($_POST['idCategoria']) && !empty($_POST['dataInscricao'])):
$atleta= new Atleta($_POST['idLogin'] , $_POST['idEvento'] , $_POST['tamCamisa'] , $_POST['idCategoria'] , $_POST['dataInscricao']); 
       $controle->remover($atleta);
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