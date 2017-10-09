<?php

        if (!isset($_SESSION)) {
            session_start();
        }

        require_once '../../controle/ControleEvento.class.php';
        require_once '../../modelo/Evento.class.php';

        if (!empty($_REQUEST['acao'])) {
              $acao = $_REQUEST['acao'];
        }

        $controle = new ControleEvento();

        switch ($acao) :
case 'inserir': 
         if (!empty($_POST['idEvento']) && !empty($_POST['nomeEvento']) && !empty($_POST['banner']) && !empty($_POST['descricao']) && !empty($_POST['dataEvento']) && !empty($_POST['dataCriado']) && !empty($_POST['regulamento']) && !empty($_POST['kit']) && !empty($_POST['localEvento']) && !empty($_POST['vencimentoPagamento'])):
$evento= new Evento($_POST['idEvento'] , $_POST['nomeEvento'] , $_POST['banner'] , $_POST['descricao'] , $_POST['dataEvento'] , $_POST['dataCriado'] , $_POST['regulamento'] , $_POST['kit'] , $_POST['localEvento'] , $_POST['vencimentoPagamento']); 
       $controle->inserir($evento);
           endif; 
           break;
case 'atualizar': 
         if (!empty($_POST['idEvento']) && !empty($_POST['nomeEvento']) && !empty($_POST['banner']) && !empty($_POST['descricao']) && !empty($_POST['dataEvento']) && !empty($_POST['dataCriado']) && !empty($_POST['regulamento']) && !empty($_POST['kit']) && !empty($_POST['localEvento']) && !empty($_POST['vencimentoPagamento'])):
$evento= new Evento($_POST['idEvento'] , $_POST['nomeEvento'] , $_POST['banner'] , $_POST['descricao'] , $_POST['dataEvento'] , $_POST['dataCriado'] , $_POST['regulamento'] , $_POST['kit'] , $_POST['localEvento'] , $_POST['vencimentoPagamento']); 
       $controle->atualizar($evento);
           endif; 
           break;
case 'remover': 
         if (!empty($_POST['idEvento']) && !empty($_POST['nomeEvento']) && !empty($_POST['banner']) && !empty($_POST['descricao']) && !empty($_POST['dataEvento']) && !empty($_POST['dataCriado']) && !empty($_POST['regulamento']) && !empty($_POST['kit']) && !empty($_POST['localEvento']) && !empty($_POST['vencimentoPagamento'])):
$evento= new Evento($_POST['idEvento'] , $_POST['nomeEvento'] , $_POST['banner'] , $_POST['descricao'] , $_POST['dataEvento'] , $_POST['dataCriado'] , $_POST['regulamento'] , $_POST['kit'] , $_POST['localEvento'] , $_POST['vencimentoPagamento']); 
       $controle->remover($evento);
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