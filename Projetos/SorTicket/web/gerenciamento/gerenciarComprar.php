<?php

if (!isset($_SESSION)) {
    session_start();
}

require_once '../../controle/ControleComprar.class.php';
require_once '../../modelo/Comprar.class.php';

if (!empty($_REQUEST['acao'])) {
    $acao = $_REQUEST['acao'];
}

$controle = new ControleComprar();

switch ($acao) :
    case 'inserir':
        if (!empty($_POST['idTicket']) && !empty($_POST['idPessoa']) && !empty($_POST['codPagamento'])):
            $comprar = new Comprar($_POST['idTicket'], $_POST['idPessoa'], $_POST['codPagamento']);
            $controle->inserir($comprar);
        endif;
        break;
    case 'atualizar':
        if (!empty($_POST['idTicket']) && !empty($_POST['idPessoa']) && !empty($_POST['codPagamento'])):
            $comprar = new Comprar($_POST['idTicket'], $_POST['idPessoa'], $_POST['codPagamento']);
            $controle->atualizar($comprar);
        endif;
        break;
    case 'remover':
        if (!empty($_POST['idTicket']) && !empty($_POST['idPessoa']) && !empty($_POST['codPagamento'])):
            $comprar = new Comprar($_POST['idTicket'], $_POST['idPessoa'], $_POST['codPagamento']);
            $controle->remover($comprar);
        endif;
        break;
    case 'listarTodos':
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
