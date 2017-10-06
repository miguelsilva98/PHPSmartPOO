<?php
class PessoaFisica{ 
private $idPessoaFisica;
private $nome;
private $dataNascimento;
private $cpf;
private $sexo;
private $numCelular;
private $numFixo;
private $statusConta;
private $idEndereco;
private $deficiencia;
private $email;
private $ipPessoa;
private $foto;
function __construct($idPessoaFisica,$nome,$dataNascimento,$cpf,$sexo,$numCelular,$numFixo,$statusConta,$idEndereco,$deficiencia,$email,$ipPessoa,$foto){
$this->idPessoaFisica = idPessoaFisica;
$this->nome = nome;
$this->dataNascimento = dataNascimento;
$this->cpf = cpf;
$this->sexo = sexo;
$this->numCelular = numCelular;
$this->numFixo = numFixo;
$this->statusConta = statusConta;
$this->idEndereco = idEndereco;
$this->deficiencia = deficiencia;
$this->email = email;
$this->ipPessoa = ipPessoa;
$this->foto = foto;
}function getIdPessoaFisica() {
         return $this->idPessoaFisica;
    }function getNome() {
         return $this->nome;
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
    }function getStatusConta() {
         return $this->statusConta;
    }function getIdEndereco() {
         return $this->idEndereco;
    }function getDeficiencia() {
         return $this->deficiencia;
    }function getEmail() {
         return $this->email;
    }function getIpPessoa() {
         return $this->ipPessoa;
    }function getFoto() {
         return $this->foto;
    }
}