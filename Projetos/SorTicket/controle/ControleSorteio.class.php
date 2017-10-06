<?php

        require_once '../../dao/DaoSorteio.class.php';
        require_once '../../modelo/Sorteio.class.php';

        class ControleSorteio {

        private $controle;

        function __construct() {
          $this->controle = new DaoSorteio();
        }

        function inserir(Sorteio $sorteio) {
           return $this->controle->inserir($sorteio);
         }

        function atualizar(Sorteio $sorteio) {
           return $this->controle->atualizar($sorteio);
        }

        function remover(Sorteio $sorteio) {
             return $this->controle->remover($sorteio);
        }

        function obterTodos() {
             $sql = "SELECT * FROM Sorteio ";        
         return $this->controle->obterTodosByParametro($sql);
        }

        function obterById($id) {
           $sql  = 'SELECT * FROM Sorteio WHERE id=:id';
         return $this->controle->obter($sql, ':id', $id, PDO::PARAM_INT);  
         }
        }