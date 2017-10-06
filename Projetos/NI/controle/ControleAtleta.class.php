<?php

        require_once '../../dao/DaoAtleta.class.php';
        require_once '../../modelo/Atleta.class.php';

        class ControleAtleta {

        private $controle;

        function __construct() {
          $this->controle = new DaoAtleta();
        }

        function inserir(Atleta $atleta) {
           return $this->controle->inserir($atleta);
         }

        function atualizar(Atleta $atleta) {
           return $this->controle->atualizar($atleta);
        }

        function remover(Atleta $atleta) {
             return $this->controle->remover($atleta);
        }

        function obterTodos() {
             $sql = "SELECT * FROM Atleta ";        
         return $this->controle->obterTodosByParametro($sql);
        }

        function obterById($id) {
           $sql  = 'SELECT * FROM Atleta WHERE id=:id';
         return $this->controle->obter($sql, ':id', $id, PDO::PARAM_INT);  
         }
        }