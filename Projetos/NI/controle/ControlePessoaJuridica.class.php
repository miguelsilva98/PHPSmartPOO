<?php

        require_once '../../dao/DaoPessoaJuridica.class.php';
        require_once '../../modelo/PessoaJuridica.class.php';

        class ControlePessoaJuridica {

        private $controle;

        function __construct() {
          $this->controle = new DaoPessoaJuridica();
        }

        function inserir(PessoaJuridica $pessoajuridica) {
           return $this->controle->inserir($pessoajuridica);
         }

        function atualizar(PessoaJuridica $pessoajuridica) {
           return $this->controle->atualizar($pessoajuridica);
        }

        function remover(PessoaJuridica $pessoajuridica) {
             return $this->controle->remover($pessoajuridica);
        }

        function obterTodos() {
             $sql = "SELECT * FROM PessoaJuridica ";        
         return $this->controle->obterTodosByParametro($sql);
        }

        function obterById($id) {
           $sql  = 'SELECT * FROM PessoaJuridica WHERE id=:id';
         return $this->controle->obter($sql, ':id', $id, PDO::PARAM_INT);  
         }
        }