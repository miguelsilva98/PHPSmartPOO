<?php

class ImagemVendedor {

    private $idImagem;
    private $idPessoa;

    function __construct($idImagem, $idPessoa) {
        $this->idImagem = idImagem;
        $this->idPessoa = idPessoa;
    }

    function getIdImagem() {
        return $this->idImagem;
    }

    function getIdPessoa() {
        return $this->idPessoa;
    }

}
