<?php

        require_once '../../dao/DaoPessoaFisica.class.php';
        require_once '../../modelo/PessoaFisica.class.php';

        class ControlePessoaFisica {

        private $controle;

        function __construct() {
          $this->controle = new DaoPessoaFisica();
        }

        function inserir(PessoaFisica $pessoafisica) {
           return $this->controle->inserir($pessoafisica);
         }

        function atualizar(PessoaFisica $pessoafisica) {
           return $this->controle->atualizar($pessoafisica);
        }

        function remover(PessoaFisica $pessoafisica) {
             return $this->controle->remover($pessoafisica);
        }

        function obterTodos() {
             $sql = "SELECT * FROM PessoaFisica ";        
         return $this->controle->obterTodosByParametro($sql);
        }

        function obterById($id) {
           $sql  = 'SELECT * FROM PessoaFisica WHERE id=:id';
         return $this->controle->obter($sql, ':id', $id, PDO::PARAM_INT);  
         }
        }