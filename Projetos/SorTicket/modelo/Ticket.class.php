<?php
class Ticket{ 
private $idTicket;
private $nomeTicket;
private $valor;
private $descricao;
function __construct($idTicket,$nomeTicket,$valor,$descricao){
$this->idTicket = idTicket;
$this->nomeTicket = nomeTicket;
$this->valor = valor;
$this->descricao = descricao;
}function getIdTicket() {
         return $this->idTicket;
    }function getNomeTicket() {
         return $this->nomeTicket;
    }function getValor() {
         return $this->valor;
    }function getDescricao() {
         return $this->descricao;
    }
}