<?php
class Evento{ 
private $idEvento;
private $nomeEvento;
private $banner;
private $descricao;
private $dataEvento;
private $dataCriado;
private $regulamento;
private $kit;
private $localEvento;
private $vencimentoPagamento;
function __construct($idEvento,$nomeEvento,$banner,$descricao,$dataEvento,$dataCriado,$regulamento,$kit,$localEvento,$vencimentoPagamento){
$this->idEvento = idEvento;
$this->nomeEvento = nomeEvento;
$this->banner = banner;
$this->descricao = descricao;
$this->dataEvento = dataEvento;
$this->dataCriado = dataCriado;
$this->regulamento = regulamento;
$this->kit = kit;
$this->localEvento = localEvento;
$this->vencimentoPagamento = vencimentoPagamento;
}function getIdEvento() {
         return $this->idEvento;
    }function getNomeEvento() {
         return $this->nomeEvento;
    }function getBanner() {
         return $this->banner;
    }function getDescricao() {
         return $this->descricao;
    }function getDataEvento() {
         return $this->dataEvento;
    }function getDataCriado() {
         return $this->dataCriado;
    }function getRegulamento() {
         return $this->regulamento;
    }function getKit() {
         return $this->kit;
    }function getLocalEvento() {
         return $this->localEvento;
    }function getVencimentoPagamento() {
         return $this->vencimentoPagamento;
    }
}