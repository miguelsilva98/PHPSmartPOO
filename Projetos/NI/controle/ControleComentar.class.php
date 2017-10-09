<?php

        require_once '../../dao/DaoComentar.class.php';
        require_once '../../modelo/Comentar.class.php';

        class ControleComentar {

        private $controle;

        function __construct() {
          $this->controle = new DaoComentar();
        }

        function inserir(Comentar $comentar) {
           return $this->controle->inserir($comentar);
         }

        function atualizar(Comentar $comentar) {
           return $this->controle->atualizar($comentar);
        }

        function remover(Comentar $comentar) {
             return $this->controle->remover($comentar);
        }

        function obterTodos() {
             $sql = "SELECT * FROM Comentar ";        
         return $this->controle->obterTodosByParametro($sql);
        }

        function obterById($id) {
           $sql  = 'SELECT * FROM Comentar WHERE id=:id';
         return $this->controle->obter($sql, ':id', $id, PDO::PARAM_INT);  
         }
        }