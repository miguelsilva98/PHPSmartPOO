<?php

        require_once '../../dao/DaoContaBancaria.class.php';
        require_once '../../modelo/ContaBancaria.class.php';

        class ControleContaBancaria {

        private $controle;

        function __construct() {
          $this->controle = new DaoContaBancaria();
        }

        function inserir(ContaBancaria $contabancaria) {
           return $this->controle->inserir($contabancaria);
         }

        function atualizar(ContaBancaria $contabancaria) {
           return $this->controle->atualizar($contabancaria);
        }

        function remover(ContaBancaria $contabancaria) {
             return $this->controle->remover($contabancaria);
        }

        function obterTodos() {
             $sql = "SELECT * FROM ContaBancaria ";        
         return $this->controle->obterTodosByParametro($sql);
        }

        function obterById($id) {
           $sql  = 'SELECT * FROM ContaBancaria WHERE id=:id';
         return $this->controle->obter($sql, ':id', $id, PDO::PARAM_INT);  
         }
        }