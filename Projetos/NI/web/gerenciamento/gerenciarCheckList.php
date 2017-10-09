<?php

        if (!isset($_SESSION)) {
            session_start();
        }

        require_once '../../controle/ControleCheckList.class.php';
        require_once '../../modelo/CheckList.class.php';

        if (!empty($_REQUEST['acao'])) {
              $acao = $_REQUEST['acao'];
        }

        $controle = new ControleCheckList();

        switch ($acao) :
case 'inserir': 
         if (!empty($_POST['idCheck']) && !empty($_POST['idPromotor']) && !empty($_POST['descricao']) && !empty($_POST['quantidade']) && !empty($_POST['inicio']) && !empty($_POST['fim']) && !empty($_POST['entrega']) && !empty($_POST['status']) && !empty($_POST['responsavel']) && !empty($_POST['telefone']) && !empty($_POST['valor']) && !empty($_POST['tipo']) && !empty($_POST['observacao'])):
$checklist= new CheckList($_POST['idCheck'] , $_POST['idPromotor'] , $_POST['descricao'] , $_POST['quantidade'] , $_POST['inicio'] , $_POST['fim'] , $_POST['entrega'] , $_POST['status'] , $_POST['responsavel'] , $_POST['telefone'] , $_POST['valor'] , $_POST['tipo'] , $_POST['observacao']); 
       $controle->inserir($checklist);
           endif; 
           break;
case 'atualizar': 
         if (!empty($_POST['idCheck']) && !empty($_POST['idPromotor']) && !empty($_POST['descricao']) && !empty($_POST['quantidade']) && !empty($_POST['inicio']) && !empty($_POST['fim']) && !empty($_POST['entrega']) && !empty($_POST['status']) && !empty($_POST['responsavel']) && !empty($_POST['telefone']) && !empty($_POST['valor']) && !empty($_POST['tipo']) && !empty($_POST['observacao'])):
$checklist= new CheckList($_POST['idCheck'] , $_POST['idPromotor'] , $_POST['descricao'] , $_POST['quantidade'] , $_POST['inicio'] , $_POST['fim'] , $_POST['entrega'] , $_POST['status'] , $_POST['responsavel'] , $_POST['telefone'] , $_POST['valor'] , $_POST['tipo'] , $_POST['observacao']); 
       $controle->atualizar($checklist);
           endif; 
           break;
case 'remover': 
         if (!empty($_POST['idCheck']) && !empty($_POST['idPromotor']) && !empty($_POST['descricao']) && !empty($_POST['quantidade']) && !empty($_POST['inicio']) && !empty($_POST['fim']) && !empty($_POST['entrega']) && !empty($_POST['status']) && !empty($_POST['responsavel']) && !empty($_POST['telefone']) && !empty($_POST['valor']) && !empty($_POST['tipo']) && !empty($_POST['observacao'])):
$checklist= new CheckList($_POST['idCheck'] , $_POST['idPromotor'] , $_POST['descricao'] , $_POST['quantidade'] , $_POST['inicio'] , $_POST['fim'] , $_POST['entrega'] , $_POST['status'] , $_POST['responsavel'] , $_POST['telefone'] , $_POST['valor'] , $_POST['tipo'] , $_POST['observacao']); 
       $controle->remover($checklist);
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