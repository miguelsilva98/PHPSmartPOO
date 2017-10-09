<?php
class ComentarioEvento{ 
private $idComentario;
private $dataComentario;
private $comentario;
function __construct($idComentario,$dataComentario,$comentario){
$this->idComentario = idComentario;
$this->dataComentario = dataComentario;
$this->comentario = comentario;
}function getIdComentario() {
         return $this->idComentario;
    }function getDataComentario() {
         return $this->dataComentario;
    }function getComentario() {
         return $this->comentario;
    }
}