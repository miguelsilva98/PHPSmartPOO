<?php

        require_once '../../dao/DaoPromotor.class.php';
        require_once '../../modelo/Promotor.class.php';

        class ControlePromotor {

        private $controle;

        function __construct() {
          $this->controle = new DaoPromotor();
        }

        function inserir(Promotor $promotor) {
           return $this->controle->inserir($promotor);
         }

        function atualizar(Promotor $promotor) {
           return $this->controle->atualizar($promotor);
        }

        function remover(Promotor $promotor) {
             return $this->controle->remover($promotor);
        }

        function obterTodos() {
             $sql = "SELECT * FROM Promotor ";        
         return $this->controle->obterTodosByParametro($sql);
        }

        function obterById($id) {
           $sql  = 'SELECT * FROM Promotor WHERE id=:id';
         return $this->controle->obter($sql, ':id', $id, PDO::PARAM_INT);  
         }
        }