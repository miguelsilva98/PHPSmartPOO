<?php
class PessoaJuridica{ 
private $idLogin;
private $cnpj;
private $nomeResp;
private $statusJuridico;
private $idEndereco;
function __construct($idLogin,$cnpj,$nomeResp,$statusJuridico,$idEndereco){
$this->idLogin = idLogin;
$this->cnpj = cnpj;
$this->nomeResp = nomeResp;
$this->statusJuridico = statusJuridico;
$this->idEndereco = idEndereco;
}function getIdLogin() {
         return $this->idLogin;
    }function getCnpj() {
         return $this->cnpj;
    }function getNomeResp() {
         return $this->nomeResp;
    }function getStatusJuridico() {
         return $this->statusJuridico;
    }function getIdEndereco() {
         return $this->idEndereco;
    }
}