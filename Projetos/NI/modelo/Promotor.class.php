<?php
class Promotor{ 
private $idEvento;
private $idLogin;
private $contaPadrao;
function __construct($idEvento,$idLogin,$contaPadrao){
$this->idEvento = idEvento;
$this->idLogin = idLogin;
$this->contaPadrao = contaPadrao;
}function getIdEvento() {
         return $this->idEvento;
    }function getIdLogin() {
         return $this->idLogin;
    }function getContaPadrao() {
         return $this->contaPadrao;
    }
}