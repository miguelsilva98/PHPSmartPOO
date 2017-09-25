&lt;?php

        require_once '../../dao/DaoAluno.class.php';
        require_once '../../modelo/Aluno.class.php';

        class ControleAluno {

        private $controle;

        function __construct() {
          $this->controle = new DaoAluno();
        }

        function inserir(Aluno $aluno) {
           return $this->controle->inserir($aluno);
         }

        function atualizar(Aluno $aluno) {
           return $this->controle->atualizar($aluno);
        }

        function remover(Aluno $aluno) {
             return $this->controle->remover($aluno);
        }

        function obterTodos() {
             $sql = "SELECT * FROM Aluno ";        
         return $this->controle->obterTodosByParametro($sql);
        }

        function obterById($id) {
           $sql  = 'SELECT * FROM Aluno WHERE id=:id';
         return $this->controle->obter($sql, ':id', $id, PDO::PARAM_INT);  
         }
        }