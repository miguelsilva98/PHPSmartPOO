<?php
class ContaBancaria{ 
private $idContaBancaria;
private $agencia;
private $conta;
private $nomeTitular;
private $cpf_cnpj;
private $operacaoConta;
function __construct($idContaBancaria,$agencia,$conta,$nomeTitular,$cpf_cnpj,$operacaoConta){
$this->idContaBancaria = idContaBancaria;
$this->agencia = agencia;
$this->conta = conta;
$this->nomeTitular = nomeTitular;
$this->cpf_cnpj = cpf_cnpj;
$this->operacaoConta = operacaoConta;
}function getIdContaBancaria() {
         return $this->idContaBancaria;
    }function getAgencia() {
         return $this->agencia;
    }function getConta() {
         return $this->conta;
    }function getNomeTitular() {
         return $this->nomeTitular;
    }function getCpf_cnpj() {
         return $this->cpf_cnpj;
    }function getOperacaoConta() {
         return $this->operacaoConta;
    }
}