<?php

        if (!isset($_SESSION)) {
            session_start();
        }

        require_once '../../controle/ControlePessoa.class.php';
        require_once '../../modelo/Pessoa.class.php';

        if (!empty($_REQUEST['acao'])) {
              $acao = $_REQUEST['acao'];
        }

        $controle = new ControlePessoa();

        switch ($acao) :
case 'inserir': 
         if (!empty($_POST['idPessoa']) && !empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['senha']) && !empty($_POST['foto'])):
$pessoa= new Pessoa($_POST['idPessoa'] , $_POST['nome'] , $_POST['email'] , $_POST['senha'] , $_POST['foto']); 
       $controle->inserir($pessoa);
           endif; 
           break;
case 'atualizar': 
         if (!empty($_POST['idPessoa']) && !empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['senha']) && !empty($_POST['foto'])):
$pessoa= new Pessoa($_POST['idPessoa'] , $_POST['nome'] , $_POST['email'] , $_POST['senha'] , $_POST['foto']); 
       $controle->atualizar($pessoa);
           endif; 
           break;
case 'remover': 
         if (!empty($_POST['idPessoa']) && !empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['senha']) && !empty($_POST['foto'])):
$pessoa= new Pessoa($_POST['idPessoa'] , $_POST['nome'] , $_POST['email'] , $_POST['senha'] , $_POST['foto']); 
       $controle->remover($pessoa);
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