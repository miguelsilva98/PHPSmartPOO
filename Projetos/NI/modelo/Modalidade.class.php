<?php
class Modalidade{ 
private $idModalidade;
private $nomeModalidade;
private $idEvento;
function __construct($idModalidade,$nomeModalidade,$idEvento){
$this->idModalidade = idModalidade;
$this->nomeModalidade = nomeModalidade;
$this->idEvento = idEvento;
}function getIdModalidade() {
         return $this->idModalidade;
    }function getNomeModalidade() {
         return $this->nomeModalidade;
    }function getIdEvento() {
         return $this->idEvento;
    }
}