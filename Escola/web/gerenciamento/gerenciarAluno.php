&lt;?php

        if (!isset($_SESSION)) {
            session_start();
        }

        require_once '../../controle/ControleAluno.class.php';
        require_once '../../modelo/Aluno.class.php';

        if (!empty($_REQUEST['acao'])) {
              $acao = $_REQUEST['acao'];
        }

        $controle = new ControleAluno();

        switch ($acao) :
case 'inserir': 
         if (!empty($_POST['idAluno']) && !empty($_POST['idade']) && !empty($_POST['sexo'])):
$aluno= new Aluno($_POST['idAluno'] , $_POST['idade'] , $_POST['sexo']); 
       $controle->inserir($aluno);
           endif; 
           break;
case 'atualizar': 
         if (!empty($_POST['idAluno']) && !empty($_POST['idade']) && !empty($_POST['sexo'])):
$aluno= new Aluno($_POST['idAluno'] , $_POST['idade'] , $_POST['sexo']); 
       $controle->atualizar($aluno);
           endif; 
           break;
case 'remover': 
         if (!empty($_POST['idAluno']) && !empty($_POST['idade']) && !empty($_POST['sexo'])):
$aluno= new Aluno($_POST['idAluno'] , $_POST['idade'] , $_POST['sexo']); 
       $controle->remover($aluno);
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