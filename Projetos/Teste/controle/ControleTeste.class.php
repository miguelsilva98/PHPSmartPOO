&lt;?php

        require_once '../../dao/DaoTeste.class.php';
        require_once '../../modelo/Teste.class.php';

        class ControleTeste {

        private $controle;

        function __construct() {
          $this->controle = new DaoTeste();
        }

        function inserir(Teste $teste) {
           return $this->controle->inserir($teste);
         }

        function atualizar(Teste $teste) {
           return $this->controle->atualizar($teste);
        }

        function remover(Teste $teste) {
             return $this->controle->remover($teste);
        }

        function obterTodos() {
             $sql = "SELECT * FROM Teste ";        
         return $this->controle->obterTodosByParametro($sql);
        }

        function obterById($id) {
           $sql  = 'SELECT * FROM Teste WHERE id=:id';
         return $this->controle->obter($sql, ':id', $id, PDO::PARAM_INT);  
         }
        }&lt;?php

        require_once '../../dao/Daoteste.class.php';
        require_once '../../modelo/teste.class.php';

        class Controleteste {

        private $controle;

        function __construct() {
          $this->controle = new Daoteste();
        }

        function inserir(teste $teste) {
           return $this->controle->inserir($teste);
         }

        function atualizar(teste $teste) {
           return $this->controle->atualizar($teste);
        }

        function remover(teste $teste) {
             return $this->controle->remover($teste);
        }

        function obterTodos() {
             $sql = "SELECT * FROM teste ";        
         return $this->controle->obterTodosByParametro($sql);
        }

        function obterById($id) {
           $sql  = 'SELECT * FROM teste WHERE id=:id';
         return $this->controle->obter($sql, ':id', $id, PDO::PARAM_INT);  
         }
        }&lt;?php

        require_once '../../dao/Daoteste.class.php';
        require_once '../../modelo/teste.class.php';

        class Controleteste {

        private $controle;

        function __construct() {
          $this->controle = new Daoteste();
        }

        function inserir(teste $teste) {
           return $this->controle->inserir($teste);
         }

        function atualizar(teste $teste) {
           return $this->controle->atualizar($teste);
        }

        function remover(teste $teste) {
             return $this->controle->remover($teste);
        }

        function obterTodos() {
             $sql = "SELECT * FROM teste ";        
         return $this->controle->obterTodosByParametro($sql);
        }

        function obterById($id) {
           $sql  = 'SELECT * FROM teste WHERE id=:id';
         return $this->controle->obter($sql, ':id', $id, PDO::PARAM_INT);  
         }
        }