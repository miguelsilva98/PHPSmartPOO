<?php

        if (!isset($_SESSION)) {
            session_start();
        }

        require_once '../../controle/ControleLogin.class.php';
        require_once '../../modelo/Login.class.php';

        if (!empty($_REQUEST['acao'])) {
              $acao = $_REQUEST['acao'];
        }

        $controle = new ControleLogin();

        switch ($acao) :
case 'inserir': 
         if (!empty($_POST['idLogin']) && !empty($_POST['email']) && !empty($_POST['senha']) && !empty($_POST['idSocial']) && !empty($_POST['statusConta']) && !empty($_POST['foto']) && !empty($_POST['ipLogin'])):
$login= new Login($_POST['idLogin'] , $_POST['email'] , $_POST['senha'] , $_POST['idSocial'] , $_POST['statusConta'] , $_POST['foto'] , $_POST['ipLogin']); 
       $controle->inserir($login);
           endif; 
           break;
case 'atualizar': 
         if (!empty($_POST['idLogin']) && !empty($_POST['email']) && !empty($_POST['senha']) && !empty($_POST['idSocial']) && !empty($_POST['statusConta']) && !empty($_POST['foto']) && !empty($_POST['ipLogin'])):
$login= new Login($_POST['idLogin'] , $_POST['email'] , $_POST['senha'] , $_POST['idSocial'] , $_POST['statusConta'] , $_POST['foto'] , $_POST['ipLogin']); 
       $controle->atualizar($login);
           endif; 
           break;
case 'remover': 
         if (!empty($_POST['idLogin']) && !empty($_POST['email']) && !empty($_POST['senha']) && !empty($_POST['idSocial']) && !empty($_POST['statusConta']) && !empty($_POST['foto']) && !empty($_POST['ipLogin'])):
$login= new Login($_POST['idLogin'] , $_POST['email'] , $_POST['senha'] , $_POST['idSocial'] , $_POST['statusConta'] , $_POST['foto'] , $_POST['ipLogin']); 
       $controle->remover($login);
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