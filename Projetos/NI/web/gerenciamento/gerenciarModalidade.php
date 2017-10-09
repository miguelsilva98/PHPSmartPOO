<?php

        if (!isset($_SESSION)) {
            session_start();
        }

        require_once '../../controle/ControleModalidade.class.php';
        require_once '../../modelo/Modalidade.class.php';

        if (!empty($_REQUEST['acao'])) {
              $acao = $_REQUEST['acao'];
        }

        $controle = new ControleModalidade();

        switch ($acao) :
case 'inserir': 
         if (!empty($_POST['idModalidade']) && !empty($_POST['nomeModalidade']) && !empty($_POST['idEvento'])):
$modalidade= new Modalidade($_POST['idModalidade'] , $_POST['nomeModalidade'] , $_POST['idEvento']); 
       $controle->inserir($modalidade);
           endif; 
           break;
case 'atualizar': 
         if (!empty($_POST['idModalidade']) && !empty($_POST['nomeModalidade']) && !empty($_POST['idEvento'])):
$modalidade= new Modalidade($_POST['idModalidade'] , $_POST['nomeModalidade'] , $_POST['idEvento']); 
       $controle->atualizar($modalidade);
           endif; 
           break;
case 'remover': 
         if (!empty($_POST['idModalidade']) && !empty($_POST['nomeModalidade']) && !empty($_POST['idEvento'])):
$modalidade= new Modalidade($_POST['idModalidade'] , $_POST['nomeModalidade'] , $_POST['idEvento']); 
       $controle->remover($modalidade);
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