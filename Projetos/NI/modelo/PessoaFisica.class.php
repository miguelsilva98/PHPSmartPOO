<?php
class PessoaFisica{ 
private $idLogin;
private $nomePessoa;
private $dataNascimento;
private $cpf;
private $sexo;
private $numCelular;
private $numFixo;
private $idEndereco;
private $cargo;
private $deficiencia;
function __construct($idLogin,$nomePessoa,$dataNascimento,$cpf,$sexo,$numCelular,$numFixo,$idEndereco,$cargo,$deficiencia){
$this->idLogin = idLogin;
$this->nomePessoa = nomePessoa;
$this->dataNascimento = dataNascimento;
$this->cpf = cpf;
$this->sexo = sexo;
$this->numCelular = numCelular;
$this->numFixo = numFixo;
$this->idEndereco = idEndereco;
$this->cargo = cargo;
$this->deficiencia = deficiencia;
}function getIdLogin() {
         return $this->idLogin;
    }function getNomePessoa() {
         return $this->nomePessoa;
    }function getDataNascimento() {
         return $this->dataNascimento;
    }function getCpf() {
         return $this->cpf;
    }function getSexo() {
         return $this->sexo;
    }function getNumCelular() {
         return $this->numCelular;
    }function getNumFixo() {
         return $this->numFixo;
    }function getIdEndereco() {
         return $this->idEndereco;
    }function getCargo() {
         return $this->cargo;
    }function getDeficiencia() {
         return $this->deficiencia;
    }
}