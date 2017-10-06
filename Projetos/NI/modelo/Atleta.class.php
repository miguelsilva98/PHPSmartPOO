<?php
class Atleta{ 
private $idLogin;
private $idEvento;
private $tamCamisa;
private $idCategoria;
private $dataInscricao;
function __construct($idLogin,$idEvento,$tamCamisa,$idCategoria,$dataInscricao){
$this->idLogin = idLogin;
$this->idEvento = idEvento;
$this->tamCamisa = tamCamisa;
$this->idCategoria = idCategoria;
$this->dataInscricao = dataInscricao;
}function getIdLogin() {
         return $this->idLogin;
    }function getIdEvento() {
         return $this->idEvento;
    }function getTamCamisa() {
         return $this->tamCamisa;
    }function getIdCategoria() {
         return $this->idCategoria;
    }function getDataInscricao() {
         return $this->dataInscricao;
    }
}