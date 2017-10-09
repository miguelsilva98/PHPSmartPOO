<?php

        require_once '../../dao/DaoCategoria.class.php';
        require_once '../../modelo/Categoria.class.php';

        class ControleCategoria {

        private $controle;

        function __construct() {
          $this->controle = new DaoCategoria();
        }

        function inserir(Categoria $categoria) {
           return $this->controle->inserir($categoria);
         }

        function atualizar(Categoria $categoria) {
           return $this->controle->atualizar($categoria);
        }

        function remover(Categoria $categoria) {
             return $this->controle->remover($categoria);
        }

        function obterTodos() {
             $sql = "SELECT * FROM Categoria ";        
         return $this->controle->obterTodosByParametro($sql);
        }

        function obterById($id) {
           $sql  = 'SELECT * FROM Categoria WHERE id=:id';
         return $this->controle->obter($sql, ':id', $id, PDO::PARAM_INT);  
         }
        }