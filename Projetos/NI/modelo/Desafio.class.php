<?php
class Desafio{ 
private $idDesafio;
private $idDesafiante;
private $idEvento;
private $idDesafiado;
private $situacao;
private $dataDesafio;
function __construct($idDesafio,$idDesafiante,$idEvento,$idDesafiado,$situacao,$dataDesafio){
$this->idDesafio = idDesafio;
$this->idDesafiante = idDesafiante;
$this->idEvento = idEvento;
$this->idDesafiado = idDesafiado;
$this->situacao = situacao;
$this->dataDesafio = dataDesafio;
}function getIdDesafio() {
         return $this->idDesafio;
    }function getIdDesafiante() {
         return $this->idDesafiante;
    }function getIdEvento() {
         return $this->idEvento;
    }function getIdDesafiado() {
         return $this->idDesafiado;
    }function getSituacao() {
         return $this->situacao;
    }function getDataDesafio() {
         return $this->dataDesafio;
    }
}