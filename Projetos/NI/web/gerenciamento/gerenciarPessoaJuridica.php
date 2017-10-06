<?php

        if (!isset($_SESSION)) {
            session_start();
        }

        require_once '../../controle/ControlePessoaJuridica.class.php';
        require_once '../../modelo/PessoaJuridica.class.php';

        if (!empty($_REQUEST['acao'])) {
              $acao = $_REQUEST['acao'];
        }

        $controle = new ControlePessoaJuridica();

        switch ($acao) :
case 'inserir': 
         if (!empty($_POST['idLogin']) && !empty($_POST['cnpj']) && !empty($_POST['nomeResp']) && !empty($_POST['statusJuridico']) && !empty($_POST['idEndereco'])):
$pessoajuridica= new PessoaJuridica($_POST['idLogin'] , $_POST['cnpj'] , $_POST['nomeResp'] , $_POST['statusJuridico'] , $_POST['idEndereco']); 
       $controle->inserir($pessoajuridica);
           endif; 
           break;
case 'atualizar': 
         if (!empty($_POST['idLogin']) && !empty($_POST['cnpj']) && !empty($_POST['nomeResp']) && !empty($_POST['statusJuridico']) && !empty($_POST['idEndereco'])):
$pessoajuridica= new PessoaJuridica($_POST['idLogin'] , $_POST['cnpj'] , $_POST['nomeResp'] , $_POST['statusJuridico'] , $_POST['idEndereco']); 
       $controle->atualizar($pessoajuridica);
           endif; 
           break;
case 'remover': 
         if (!empty($_POST['idLogin']) && !empty($_POST['cnpj']) && !empty($_POST['nomeResp']) && !empty($_POST['statusJuridico']) && !empty($_POST['idEndereco'])):
$pessoajuridica= new PessoaJuridica($_POST['idLogin'] , $_POST['cnpj'] , $_POST['nomeResp'] , $_POST['statusJuridico'] , $_POST['idEndereco']); 
       $controle->remover($pessoajuridica);
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