<?php
class Imagem{ 
private $idImagem;
private $imagem;
function __construct($idImagem,$imagem){
$this->idImagem = idImagem;
$this->imagem = imagem;
}function getIdImagem() {
         return $this->idImagem;
    }function getImagem() {
         return $this->imagem;
    }
}