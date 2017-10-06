<?php

        require_once '../../dao/DaoVendedor.class.php';
        require_once '../../modelo/Vendedor.class.php';

        class ControleVendedor {

        private $controle;

        function __construct() {
          $this->controle = new DaoVendedor();
        }

        function inserir(Vendedor $vendedor) {
           return $this->controle->inserir($vendedor);
         }

        function atualizar(Vendedor $vendedor) {
           return $this->controle->atualizar($vendedor);
        }

        function remover(Vendedor $vendedor) {
             return $this->controle->remover($vendedor);
        }

        function obterTodos() {
             $sql = "SELECT * FROM Vendedor ";        
         return $this->controle->obterTodosByParametro($sql);
        }

        function obterById($id) {
           $sql  = 'SELECT * FROM Vendedor WHERE id=:id';
         return $this->controle->obter($sql, ':id', $id, PDO::PARAM_INT);  
         }
        }