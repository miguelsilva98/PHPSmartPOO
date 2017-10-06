<?php
class Login{ 
private $idLogin;
private $email;
private $senha;
private $idSocial;
private $statusConta;
private $foto;
private $ipLogin;
function __construct($idLogin,$email,$senha,$idSocial,$statusConta,$foto,$ipLogin){
$this->idLogin = idLogin;
$this->email = email;
$this->senha = senha;
$this->idSocial = idSocial;
$this->statusConta = statusConta;
$this->foto = foto;
$this->ipLogin = ipLogin;
}function getIdLogin() {
         return $this->idLogin;
    }function getEmail() {
         return $this->email;
    }function getSenha() {
         return $this->senha;
    }function getIdSocial() {
         return $this->idSocial;
    }function getStatusConta() {
         return $this->statusConta;
    }function getFoto() {
         return $this->foto;
    }function getIpLogin() {
         return $this->ipLogin;
    }
}