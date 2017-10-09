<?php
class Categoria{ 
private $IdCategoria;
private $nomeCategoria;
private $idadeMin;
private $idadeMax;
private $restricao;
private $percurso;
private $sexoCategoria;
private $valorCategoria;
private $idModalidade;
function __construct($IdCategoria,$nomeCategoria,$idadeMin,$idadeMax,$restricao,$percurso,$sexoCategoria,$valorCategoria,$idModalidade){
$this->IdCategoria = IdCategoria;
$this->nomeCategoria = nomeCategoria;
$this->idadeMin = idadeMin;
$this->idadeMax = idadeMax;
$this->restricao = restricao;
$this->percurso = percurso;
$this->sexoCategoria = sexoCategoria;
$this->valorCategoria = valorCategoria;
$this->idModalidade = idModalidade;
}function getIdCategoria() {
         return $this->IdCategoria;
    }function getNomeCategoria() {
         return $this->nomeCategoria;
    }function getIdadeMin() {
         return $this->idadeMin;
    }function getIdadeMax() {
         return $this->idadeMax;
    }function getRestricao() {
         return $this->restricao;
    }function getPercurso() {
         return $this->percurso;
    }function getSexoCategoria() {
         return $this->sexoCategoria;
    }function getValorCategoria() {
         return $this->valorCategoria;
    }function getIdModalidade() {
         return $this->idModalidade;
    }
}