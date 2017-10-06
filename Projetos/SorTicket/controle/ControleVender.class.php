<?php

        require_once '../../dao/DaoVender.class.php';
        require_once '../../modelo/Vender.class.php';

        class ControleVender {

        private $controle;

        function __construct() {
          $this->controle = new DaoVender();
        }

        function inserir(Vender $vender) {
           return $this->controle->inserir($vender);
         }

        function atualizar(Vender $vender) {
           return $this->controle->atualizar($vender);
        }

        function remover(Vender $vender) {
             return $this->controle->remover($vender);
        }

        function obterTodos() {
             $sql = "SELECT * FROM Vender ";        
         return $this->controle->obterTodosByParametro($sql);
        }

        function obterById($id) {
           $sql  = 'SELECT * FROM Vender WHERE id=:id';
         return $this->controle->obter($sql, ':id', $id, PDO::PARAM_INT);  
         }
        }