<?php
class CheckList{ 
private $idCheck;
private $idPromotor;
private $descricao;
private $quantidade;
private $inicio;
private $fim;
private $entrega;
private $status;
private $responsavel;
private $telefone;
private $valor;
private $tipo;
private $observacao;
function __construct($idCheck,$idPromotor,$descricao,$quantidade,$inicio,$fim,$entrega,$status,$responsavel,$telefone,$valor,$tipo,$observacao){
$this->idCheck = idCheck;
$this->idPromotor = idPromotor;
$this->descricao = descricao;
$this->quantidade = quantidade;
$this->inicio = inicio;
$this->fim = fim;
$this->entrega = entrega;
$this->status = status;
$this->responsavel = responsavel;
$this->telefone = telefone;
$this->valor = valor;
$this->tipo = tipo;
$this->observacao = observacao;
}function getIdCheck() {
         return $this->idCheck;
    }function getIdPromotor() {
         return $this->idPromotor;
    }function getDescricao() {
         return $this->descricao;
    }function getQuantidade() {
         return $this->quantidade;
    }function getInicio() {
         return $this->inicio;
    }function getFim() {
         return $this->fim;
    }function getEntrega() {
         return $this->entrega;
    }function getStatus() {
         return $this->status;
    }function getResponsavel() {
         return $this->responsavel;
    }function getTelefone() {
         return $this->telefone;
    }function getValor() {
         return $this->valor;
    }function getTipo() {
         return $this->tipo;
    }function getObservacao() {
         return $this->observacao;
    }
}