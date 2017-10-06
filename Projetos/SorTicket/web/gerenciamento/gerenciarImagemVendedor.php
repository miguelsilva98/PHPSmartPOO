<?php

        if (!isset($_SESSION)) {
            session_start();
        }

        require_once '../../controle/ControleImagemVendedor.class.php';
        require_once '../../modelo/ImagemVendedor.class.php';

        if (!empty($_REQUEST['acao'])) {
              $acao = $_REQUEST['acao'];
        }

        $controle = new ControleImagemVendedor();

        switch ($acao) :
case 'inserir': 
         if (!empty($_POST['idImagem']) && !empty($_POST['idPessoa'])):
$imagemvendedor= new ImagemVendedor($_POST['idImagem'] , $_POST['idPessoa']); 
       $controle->inserir($imagemvendedor);
           endif; 
           break;
case 'atualizar': 
         if (!empty($_POST['idImagem']) && !empty($_POST['idPessoa'])):
$imagemvendedor= new ImagemVendedor($_POST['idImagem'] , $_POST['idPessoa']); 
       $controle->atualizar($imagemvendedor);
           endif; 
           break;
case 'remover': 
         if (!empty($_POST['idImagem']) && !empty($_POST['idPessoa'])):
$imagemvendedor= new ImagemVendedor($_POST['idImagem'] , $_POST['idPessoa']); 
       $controle->remover($imagemvendedor);
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