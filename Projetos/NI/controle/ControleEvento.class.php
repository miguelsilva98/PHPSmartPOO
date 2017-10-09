<?php

        require_once '../../dao/DaoEvento.class.php';
        require_once '../../modelo/Evento.class.php';

        class ControleEvento {

        private $controle;

        function __construct() {
          $this->controle = new DaoEvento();
        }

        function inserir(Evento $evento) {
           return $this->controle->inserir($evento);
         }

        function atualizar(Evento $evento) {
           return $this->controle->atualizar($evento);
        }

        function remover(Evento $evento) {
             return $this->controle->remover($evento);
        }

        function obterTodos() {
             $sql = "SELECT * FROM Evento ";        
         return $this->controle->obterTodosByParametro($sql);
        }

        function obterById($id) {
           $sql  = 'SELECT * FROM Evento WHERE id=:id';
         return $this->controle->obter($sql, ':id', $id, PDO::PARAM_INT);  
         }
        }