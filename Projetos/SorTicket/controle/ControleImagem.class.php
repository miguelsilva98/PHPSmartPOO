<?php

        require_once '../../dao/DaoImagem.class.php';
        require_once '../../modelo/Imagem.class.php';

        class ControleImagem {

        private $controle;

        function __construct() {
          $this->controle = new DaoImagem();
        }

        function inserir(Imagem $imagem) {
           return $this->controle->inserir($imagem);
         }

        function atualizar(Imagem $imagem) {
           return $this->controle->atualizar($imagem);
        }

        function remover(Imagem $imagem) {
             return $this->controle->remover($imagem);
        }

        function obterTodos() {
             $sql = "SELECT * FROM Imagem ";        
         return $this->controle->obterTodosByParametro($sql);
        }

        function obterById($id) {
           $sql  = 'SELECT * FROM Imagem WHERE id=:id';
         return $this->controle->obter($sql, ':id', $id, PDO::PARAM_INT);  
         }
        }