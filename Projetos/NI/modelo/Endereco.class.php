<?php
class Endereco{ 
private $idEndereco;
private $cep;
private $endereco;
private $numCasa;
private $estado;
private $cidade;
private $bairro;
private $complemento;
function __construct($idEndereco,$cep,$endereco,$numCasa,$estado,$cidade,$bairro,$complemento){
$this->idEndereco = idEndereco;
$this->cep = cep;
$this->endereco = endereco;
$this->numCasa = numCasa;
$this->estado = estado;
$this->cidade = cidade;
$this->bairro = bairro;
$this->complemento = complemento;
}function getIdEndereco() {
         return $this->idEndereco;
    }function getCep() {
         return $this->cep;
    }function getEndereco() {
         return $this->endereco;
    }function getNumCasa() {
         return $this->numCasa;
    }function getEstado() {
         return $this->estado;
    }function getCidade() {
         return $this->cidade;
    }function getBairro() {
         return $this->bairro;
    }function getComplemento() {
         return $this->complemento;
    }
}