<?php

        require_once '../../dao/DaoModalidade.class.php';
        require_once '../../modelo/Modalidade.class.php';

        class ControleModalidade {

        private $controle;

        function __construct() {
          $this->controle = new DaoModalidade();
        }

        function inserir(Modalidade $modalidade) {
           return $this->controle->inserir($modalidade);
         }

        function atualizar(Modalidade $modalidade) {
           return $this->controle->atualizar($modalidade);
        }

        function remover(Modalidade $modalidade) {
             return $this->controle->remover($modalidade);
        }

        function obterTodos() {
             $sql = "SELECT * FROM Modalidade ";        
         return $this->controle->obterTodosByParametro($sql);
        }

        function obterById($id) {
           $sql  = 'SELECT * FROM Modalidade WHERE id=:id';
         return $this->controle->obter($sql, ':id', $id, PDO::PARAM_INT);  
         }
        }