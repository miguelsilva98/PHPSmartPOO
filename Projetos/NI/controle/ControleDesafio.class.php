<?php

        require_once '../../dao/DaoDesafio.class.php';
        require_once '../../modelo/Desafio.class.php';

        class ControleDesafio {

        private $controle;

        function __construct() {
          $this->controle = new DaoDesafio();
        }

        function inserir(Desafio $desafio) {
           return $this->controle->inserir($desafio);
         }

        function atualizar(Desafio $desafio) {
           return $this->controle->atualizar($desafio);
        }

        function remover(Desafio $desafio) {
             return $this->controle->remover($desafio);
        }

        function obterTodos() {
             $sql = "SELECT * FROM Desafio ";        
         return $this->controle->obterTodosByParametro($sql);
        }

        function obterById($id) {
           $sql  = 'SELECT * FROM Desafio WHERE id=:id';
         return $this->controle->obter($sql, ':id', $id, PDO::PARAM_INT);  
         }
        }