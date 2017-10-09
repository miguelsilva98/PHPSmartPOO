<?php

        require_once '../../dao/DaoEndereco.class.php';
        require_once '../../modelo/Endereco.class.php';

        class ControleEndereco {

        private $controle;

        function __construct() {
          $this->controle = new DaoEndereco();
        }

        function inserir(Endereco $endereco) {
           return $this->controle->inserir($endereco);
         }

        function atualizar(Endereco $endereco) {
           return $this->controle->atualizar($endereco);
        }

        function remover(Endereco $endereco) {
             return $this->controle->remover($endereco);
        }

        function obterTodos() {
             $sql = "SELECT * FROM Endereco ";        
         return $this->controle->obterTodosByParametro($sql);
        }

        function obterById($id) {
           $sql  = 'SELECT * FROM Endereco WHERE id=:id';
         return $this->controle->obter($sql, ':id', $id, PDO::PARAM_INT);  
         }
        }