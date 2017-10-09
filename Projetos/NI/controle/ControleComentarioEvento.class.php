<?php

        require_once '../../dao/DaoComentarioEvento.class.php';
        require_once '../../modelo/ComentarioEvento.class.php';

        class ControleComentarioEvento {

        private $controle;

        function __construct() {
          $this->controle = new DaoComentarioEvento();
        }

        function inserir(ComentarioEvento $comentarioevento) {
           return $this->controle->inserir($comentarioevento);
         }

        function atualizar(ComentarioEvento $comentarioevento) {
           return $this->controle->atualizar($comentarioevento);
        }

        function remover(ComentarioEvento $comentarioevento) {
             return $this->controle->remover($comentarioevento);
        }

        function obterTodos() {
             $sql = "SELECT * FROM ComentarioEvento ";        
         return $this->controle->obterTodosByParametro($sql);
        }

        function obterById($id) {
           $sql  = 'SELECT * FROM ComentarioEvento WHERE id=:id';
         return $this->controle->obter($sql, ':id', $id, PDO::PARAM_INT);  
         }
        }