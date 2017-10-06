<?php

        require_once '../../dao/DaoPessoa.class.php';
        require_once '../../modelo/Pessoa.class.php';

        class ControlePessoa {

        private $controle;

        function __construct() {
          $this->controle = new DaoPessoa();
        }

        function inserir(Pessoa $pessoa) {
           return $this->controle->inserir($pessoa);
         }

        function atualizar(Pessoa $pessoa) {
           return $this->controle->atualizar($pessoa);
        }

        function remover(Pessoa $pessoa) {
             return $this->controle->remover($pessoa);
        }

        function obterTodos() {
             $sql = "SELECT * FROM Pessoa ";        
         return $this->controle->obterTodosByParametro($sql);
        }

        function obterById($id) {
           $sql  = 'SELECT * FROM Pessoa WHERE id=:id';
         return $this->controle->obter($sql, ':id', $id, PDO::PARAM_INT);  
         }
        }