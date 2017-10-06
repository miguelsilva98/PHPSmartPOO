<?php

        require_once '../../dao/DaoTicket.class.php';
        require_once '../../modelo/Ticket.class.php';

        class ControleTicket {

        private $controle;

        function __construct() {
          $this->controle = new DaoTicket();
        }

        function inserir(Ticket $ticket) {
           return $this->controle->inserir($ticket);
         }

        function atualizar(Ticket $ticket) {
           return $this->controle->atualizar($ticket);
        }

        function remover(Ticket $ticket) {
             return $this->controle->remover($ticket);
        }

        function obterTodos() {
             $sql = "SELECT * FROM Ticket ";        
         return $this->controle->obterTodosByParametro($sql);
        }

        function obterById($id) {
           $sql  = 'SELECT * FROM Ticket WHERE id=:id';
         return $this->controle->obter($sql, ':id', $id, PDO::PARAM_INT);  
         }
        }