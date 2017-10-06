<?php

        require_once '../../dao/DaoLogin.class.php';
        require_once '../../modelo/Login.class.php';

        class ControleLogin {

        private $controle;

        function __construct() {
          $this->controle = new DaoLogin();
        }

        function inserir(Login $login) {
           return $this->controle->inserir($login);
         }

        function atualizar(Login $login) {
           return $this->controle->atualizar($login);
        }

        function remover(Login $login) {
             return $this->controle->remover($login);
        }

        function obterTodos() {
             $sql = "SELECT * FROM Login ";        
         return $this->controle->obterTodosByParametro($sql);
        }

        function obterById($id) {
           $sql  = 'SELECT * FROM Login WHERE id=:id';
         return $this->controle->obter($sql, ':id', $id, PDO::PARAM_INT);  
         }
        }