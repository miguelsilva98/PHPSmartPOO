<?php

        require_once '../../dao/DaoCheckList.class.php';
        require_once '../../modelo/CheckList.class.php';

        class ControleCheckList {

        private $controle;

        function __construct() {
          $this->controle = new DaoCheckList();
        }

        function inserir(CheckList $checklist) {
           return $this->controle->inserir($checklist);
         }

        function atualizar(CheckList $checklist) {
           return $this->controle->atualizar($checklist);
        }

        function remover(CheckList $checklist) {
             return $this->controle->remover($checklist);
        }

        function obterTodos() {
             $sql = "SELECT * FROM CheckList ";        
         return $this->controle->obterTodosByParametro($sql);
        }

        function obterById($id) {
           $sql  = 'SELECT * FROM CheckList WHERE id=:id';
         return $this->controle->obter($sql, ':id', $id, PDO::PARAM_INT);  
         }
        }