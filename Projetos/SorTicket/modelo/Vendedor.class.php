<?php

class Vendedor {

    private $idPessoa;
    private $numeroConta;
    private $banco;
    private $operacao;
    private $agencia;
    private $cpf;

    function __construct($idPessoa, $numeroConta, $banco, $operacao, $agencia, $cpf) {
        $this->idPessoa = idPessoa;
        $this->numeroConta = numeroConta;
        $this->banco = banco;
        $this->operacao = operacao;
        $this->agencia = agencia;
        $this->cpf = cpf;
    }

    function getIdPessoa() {
        return $this->idPessoa;
    }

    function getNumeroConta() {
        return $this->numeroConta;
    }

    function getBanco() {
        return $this->banco;
    }

    function getOperacao() {
        return $this->operacao;
    }

    function getAgencia() {
        return $this->agencia;
    }

    function getCpf() {
        return $this->cpf;
    }

}
