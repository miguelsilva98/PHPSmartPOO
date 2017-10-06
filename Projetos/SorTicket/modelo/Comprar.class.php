<?php

class Comprar {

    private $idTicket;
    private $idPessoa;
    private $codPagamento;

    function __construct($idTicket, $idPessoa, $codPagamento) {
        $this->idTicket = idTicket;
        $this->idPessoa = idPessoa;
        $this->codPagamento = codPagamento;
    }

    function getIdTicket() {
        return $this->idTicket;
    }

    function getIdPessoa() {
        return $this->idPessoa;
    }

    function getCodPagamento() {
        return $this->codPagamento;
    }

}
