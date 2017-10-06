<?php

class Vender {

    private $idPessoa;
    private $idTicket;

    function __construct($idPessoa, $idTicket) {
        $this->idPessoa = idPessoa;
        $this->idTicket = idTicket;
    }

    function getIdPessoa() {
        return $this->idPessoa;
    }

    function getIdTicket() {
        return $this->idTicket;
    }

}
