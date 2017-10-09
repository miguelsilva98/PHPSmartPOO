<?php
class Comentar{ 
private $idLogin;
private $idEvento;
private $idComentario;
function __construct($idLogin,$idEvento,$idComentario){
$this->idLogin = idLogin;
$this->idEvento = idEvento;
$this->idComentario = idComentario;
}function getIdLogin() {
         return $this->idLogin;
    }function getIdEvento() {
         return $this->idEvento;
    }function getIdComentario() {
         return $this->idComentario;
    }
}