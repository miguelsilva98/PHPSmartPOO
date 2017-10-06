<?php
class Titular{ 
private $idLogin;
private $idContaBancaria;
function __construct($idLogin,$idContaBancaria){
$this->idLogin = idLogin;
$this->idContaBancaria = idContaBancaria;
}function getIdLogin() {
         return $this->idLogin;
    }function getIdContaBancaria() {
         return $this->idContaBancaria;
    }
}