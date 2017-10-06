<?php

        if (!isset($_SESSION)) {
            session_start();
        }

        require_once '../../controle/ControleEndereco.class.php';
        require_once '../../modelo/Endereco.class.php';

        if (!empty($_REQUEST['acao'])) {
              $acao = $_REQUEST['acao'];
        }

        $controle = new ControleEndereco();

        switch ($acao) :
case 'inserir': 
         if (!empty($_POST['idEndereco']) && !empty($_POST['cep']) && !empty($_POST['endereco']) && !empty($_POST['numCasa']) && !empty($_POST['estado']) && !empty($_POST['cidade']) && !empty($_POST['bairro']) && !empty($_POST['complemento'])):
$endereco= new Endereco($_POST['idEndereco'] , $_POST['cep'] , $_POST['endereco'] , $_POST['numCasa'] , $_POST['estado'] , $_POST['cidade'] , $_POST['bairro'] , $_POST['complemento']); 
       $controle->inserir($endereco);
           endif; 
           break;
case 'atualizar': 
         if (!empty($_POST['idEndereco']) && !empty($_POST['cep']) && !empty($_POST['endereco']) && !empty($_POST['numCasa']) && !empty($_POST['estado']) && !empty($_POST['cidade']) && !empty($_POST['bairro']) && !empty($_POST['complemento'])):
$endereco= new Endereco($_POST['idEndereco'] , $_POST['cep'] , $_POST['endereco'] , $_POST['numCasa'] , $_POST['estado'] , $_POST['cidade'] , $_POST['bairro'] , $_POST['complemento']); 
       $controle->atualizar($endereco);
           endif; 
           break;
case 'remover': 
         if (!empty($_POST['idEndereco']) && !empty($_POST['cep']) && !empty($_POST['endereco']) && !empty($_POST['numCasa']) && !empty($_POST['estado']) && !empty($_POST['cidade']) && !empty($_POST['bairro']) && !empty($_POST['complemento'])):
$endereco= new Endereco($_POST['idEndereco'] , $_POST['cep'] , $_POST['endereco'] , $_POST['numCasa'] , $_POST['estado'] , $_POST['cidade'] , $_POST['bairro'] , $_POST['complemento']); 
       $controle->remover($endereco);
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