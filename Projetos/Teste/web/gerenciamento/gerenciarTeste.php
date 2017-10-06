&lt;?php

        if (!isset($_SESSION)) {
            session_start();
        }

        require_once '../../controle/ControleTeste.class.php';
        require_once '../../modelo/Teste.class.php';

        if (!empty($_REQUEST['acao'])) {
              $acao = $_REQUEST['acao'];
        }

        $controle = new ControleTeste();

        switch ($acao) :
case 'inserir': 
         if (!empty($_POST['teste'])):
$teste= new Teste($_POST['teste']); 
       $controle->inserir($teste);
           endif; 
           break;
case 'atualizar': 
         if (!empty($_POST['teste'])):
$teste= new Teste($_POST['teste']); 
       $controle->atualizar($teste);
           endif; 
           break;
case 'remover': 
         if (!empty($_POST['teste'])):
$teste= new Teste($_POST['teste']); 
       $controle->remover($teste);
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
        endswitch;&lt;?php

        if (!isset($_SESSION)) {
            session_start();
        }

        require_once '../../controle/Controleteste.class.php';
        require_once '../../modelo/teste.class.php';

        if (!empty($_REQUEST['acao'])) {
              $acao = $_REQUEST['acao'];
        }

        $controle = new Controleteste();

        switch ($acao) :
case 'inserir': 
         if (!empty($_POST['teste'])):
$teste= new teste($_POST['teste']); 
       $controle->inserir($teste);
           endif; 
           break;
case 'atualizar': 
         if (!empty($_POST['teste'])):
$teste= new teste($_POST['teste']); 
       $controle->atualizar($teste);
           endif; 
           break;
case 'remover': 
         if (!empty($_POST['teste'])):
$teste= new teste($_POST['teste']); 
       $controle->remover($teste);
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
        endswitch;&lt;?php

        if (!isset($_SESSION)) {
            session_start();
        }

        require_once '../../controle/Controleteste.class.php';
        require_once '../../modelo/teste.class.php';

        if (!empty($_REQUEST['acao'])) {
              $acao = $_REQUEST['acao'];
        }

        $controle = new Controleteste();

        switch ($acao) :
case 'inserir': 
         if (!empty($_POST['teste'])):
$teste= new teste($_POST['teste']); 
       $controle->inserir($teste);
           endif; 
           break;
case 'atualizar': 
         if (!empty($_POST['teste'])):
$teste= new teste($_POST['teste']); 
       $controle->atualizar($teste);
           endif; 
           break;
case 'remover': 
         if (!empty($_POST['teste'])):
$teste= new teste($_POST['teste']); 
       $controle->remover($teste);
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