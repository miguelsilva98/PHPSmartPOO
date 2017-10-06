<?php

        require_once '../../dao/DaoTitular.class.php';
        require_once '../../modelo/Titular.class.php';

        class ControleTitular {

        private $controle;

        function __construct() {
          $this->controle = new DaoTitular();
        }

        function inserir(Titular $titular) {
           return $this->controle->inserir($titular);
         }

        function atualizar(Titular $titular) {
           return $this->controle->atualizar($titular);
        }

        function remover(Titular $titular) {
             return $this->controle->remover($titular);
        }

        function obterTodos() {
             $sql = "SELECT * FROM Titular ";        
         return $this->controle->obterTodosByParametro($sql);
        }

        function obterById($id) {
           $sql  = 'SELECT * FROM Titular WHERE id=:id';
         return $this->controle->obter($sql, ':id', $id, PDO::PARAM_INT);  
         }
        }