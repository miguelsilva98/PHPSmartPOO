<?php

class SmartPOO {

    function modelo($class, $variavel) {
        $texto = htmlentities("<?php") . "\nclass " . $class . "{ \n";

        foreach ($variavel as $var) : //variaveis
            $texto .= "private $" . $var . ";\n";
        endforeach;

        $texto .= "function __construct("; //construtor
        foreach ($variavel as $var):
            $texto .= "\$" . $var . ",";
        endforeach;
        $texto = substr($texto, 0, strlen($texto) - 1); //Remover ultimo caracter
        $texto .= "){";

        foreach ($variavel as $var):
            $texto .= "\n\$this->" . $var . " = " . $var . ";";
        endforeach;
        $texto .= "\n}";

        foreach ($variavel as $var) { //metodo get
            $texto .= " <p> function get" . ucfirst($var) . "() {
         return \$this->" . $var . ";
    }";
        }
        $texto .= "\n}";
        return $texto;
    }

    function conexaoBD($nomeBanco, $host, $user, $senha) {
        $texto = "Banco = $nomeBanco \n Host = $host \n Usuario = $user \n Senha = $senha";
        return $texto;
    }

    function dao($class, $pk, $variavel, $tipagem) {

        $texto = htmlentities("<?php") . "\nrequire_once 'DbConnection.class.php';
        require_once 'DaoGenerico.interface.php';
        require_once '../../modelo/$class.class.php';

        class Dao$class implements DaoGenerico {

        public function atualizar(\$objeto) {
         \$conexao = DbConnection::retornaConexao();
        \$sql = \"UPDATE $class SET ";

        foreach ($variavel as $var):
            $texto .= $var . "=:$var,";
        endforeach;
        $texto = substr($texto, 0, strlen($texto) - 1); //Remover ultimo caracter
        $texto .= " where ";

        foreach ($pk as $var):
            $texto .= $var . "=:$var and";
        endforeach;
        $texto = substr($texto, 0, strlen($texto) - 3) . "\";\n"; //Remover 3 ultimos caracters

        $texto .= $this->prepareBind($variavel, $tipagem) . "
        
        }

        public function inserir(\$objeto) {
        \$conexao = DbConnection::retornaConexao();
        \$sql = \"INSERT $class(";
        foreach ($variavel as $var):
            $texto .= $var . ",";
        endforeach;
        $texto = substr($texto, 0, strlen($texto) - 1);
        $texto .= ") VALUES (";
        foreach ($variavel as $var):
            $texto .= ":$var,";
        endforeach;
        $texto = substr($texto, 0, strlen($texto) - 1);
        $texto .= ")\";"
                . $this->prepareBind($variavel, $tipagem) . "
}

        public function obter(\$sql, \$atributoSQL, \$variavel, \$pdoPARAM) {
        \$conexao = DbConnection::retornaConexao();
        \$statement = \$conexao->prepare(\$sql);
        \$statement->bindValue(\$atributoSQL, \$variavel, \$pdoPARAM);
        \$statement->execute();
        \$statement = \$statement->fetch(PDO::FETCH_ASSOC);

        \$resultado = null;
        if (\$statement != false && !empty(\$statement)) {
            \$resultado = new $class(";
        foreach ($variavel as $var):
            $texto .= "\$statement['$var'],";
        endforeach;
        $texto = substr($texto, 0, strlen($texto) - 1); //Remover ultimo caracter
        $texto .= ");
        }
        return \$resultado;
        }

        public function obterTodosByParametro(\$sql, \$atributoSQL=NULL, \$variavel=NULL, \$pdoPARAM=NULL) {
        \$conexao = DbConnection::retornaConexao();
        \$statement = \$conexao->prepare(\$sql);
        \if(\$atributoSQL != null):
        \$statement->bindValue(\$atributoSQL, \$variavel, \$pdoPARAM);
        \endif;
        \$statement->execute();
        \$statement = \$statement->fetchAll(PDO::FETCH_ASSOC);
        \$lista = null;
        if (\$statement != false && !empty(\$statement)) {
            foreach (\$statement as \$linha) {
                \$lista [] = new $class(";
        foreach ($variavel as $var):
            $texto .= "\$statement['$var'],";
        endforeach;
        $texto = substr($texto, 0, strlen($texto) - 1); //Remover ultimo caracter
        $texto .= ");
            }
        }
        return \$lista;
    }


    public function remover(\$objeto) {
        \$conexao = DbConnection::retornaConexao();
        \$sql = \"delete from  $class where ";
        foreach ($pk as $var):
            $texto .= $var . "=:$var and ";
        endforeach;
        $texto = substr($texto, 0, strlen($texto) - 3) . "\";"; //Remover ultimo caracter
        $texto .= $this->prepareBind($variavel, $tipagem) . "
    }

    }";
        return $texto;
    }

    function prepareBind($variavel, $tipagem) {
        $msg = "\$stmt = \$conexao->prepare(\$sql);";
        foreach ($tipagem as $key => $value):
            $msg .= "\n\$stmt->bindValue(':" . $variavel[$key] . "', \$objeto->get" . ucfirst($variavel[$key]) . "(),";
            if ($tipagem[$key] == "INT"):
                $msg .= "PDO::PARAM_INT);";
            else:
                $msg .= "PDO::PARAM_STR);";
            endif;
        endforeach;
        $msg .= "\n return \$stmt->execute();";
        return $msg;
    }

    function controle($class) {
        $texto = htmlentities("<?php") . "\n
        require_once '../../dao/Dao$class.class.php';
        require_once '../../modelo/$class.class.php';

        class Controle$class {

        private \$controle;

        function __construct() {
          \$this->controle = new Dao$class();
        }

        function inserir($class $" . strtolower($class) . ") {
           return \$this->controle->inserir($" . strtolower($class) . ");
         }

        function atualizar($class $" . strtolower($class) . ") {
           return \$this->controle->atualizar($" . strtolower($class) . ");
        }

        function remover($class $" . strtolower($class) . ") {
             return \$this->controle->remover($" . strtolower($class) . ");
        }

        function obterTodos() {
             \$sql = \"SELECT * FROM $class \";        
         return \$this->controle->obterTodosByParametro(\$sql);
        }

        function obterById(\$id) {
           \$sql  = 'SELECT * FROM $class WHERE id=:id';
         return \$this->controle->obter(\$sql, ':id', \$id, PDO::PARAM_INT);  
         }
        }";
        return $texto;
    }

    function gerenciamento($class, $variaveis) {
        $texto = htmlentities("<?php") . "\n
        if (!isset(\$_SESSION)) {
            session_start();
        }

        require_once '../../controle/Controle$class.class.php';
        require_once '../../modelo/$class.class.php';

        if (!empty(\$_REQUEST['acao'])) {
              \$acao = \$_REQUEST['acao'];
        }

        \$controle = new Controle$class();

        switch (\$acao) :";
        $cud = ['inserir', 'atualizar', 'remover'];
        foreach ($cud as $op) :
            $texto .= "\ncase '$op': 
         if (";
            $post = '';
            foreach ($variaveis as $var):
                $post .= "!empty(\$_POST['$var']) && ";
            endforeach;
            $post = substr($post, 0, strlen($post) - 4);
            $texto .= $post;
            $post = str_replace("!empty(", "", $post);
            $post = str_replace(")", "", $post);
            $post = str_replace("&&", ",", $post);
            $texto .= "):";
            $texto .= "\n$" . strtolower($class) . "= new $class($post); 
       \$controle->$op($" . strtolower($class) . ");
           endif; 
           break;";
        endforeach;
        $texto .= "case 'listarTodos':
        \$lista = \$controle->obterTodos();
        break;
        case 'consultar':
        if (!empty(\$_POST['id'])):
            \$controle->obterById(\$_POST['id']);
        endif;
           break;
        default :
          echo \"Não foi possivel realizar esta ação \";
        endswitch;";
        return $texto;
    }

}
