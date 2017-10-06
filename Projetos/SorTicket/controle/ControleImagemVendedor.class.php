<?php

        require_once '../../dao/DaoImagemVendedor.class.php';
        require_once '../../modelo/ImagemVendedor.class.php';

        class ControleImagemVendedor {

        private $controle;

        function __construct() {
          $this->controle = new DaoImagemVendedor();
        }

        function inserir(ImagemVendedor $imagemvendedor) {
           return $this->controle->inserir($imagemvendedor);
         }

        function atualizar(ImagemVendedor $imagemvendedor) {
           return $this->controle->atualizar($imagemvendedor);
        }

        function remover(ImagemVendedor $imagemvendedor) {
             return $this->controle->remover($imagemvendedor);
        }

        function obterTodos() {
             $sql = "SELECT * FROM ImagemVendedor ";        
         return $this->controle->obterTodosByParametro($sql);
        }

        function obterById($id) {
           $sql  = 'SELECT * FROM ImagemVendedor WHERE id=:id';
         return $this->controle->obter($sql, ':id', $id, PDO::PARAM_INT);  
         }
        }