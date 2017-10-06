<?php
class Sorteio{ 
private $idTicket;
private $dataSorteio;
private $numSorteio;
function __construct($idTicket,$dataSorteio,$numSorteio){
$this->idTicket = idTicket;
$this->dataSorteio = dataSorteio;
$this->numSorteio = numSorteio;
}function getIdTicket() {
         return $this->idTicket;
    }function getDataSorteio() {
         return $this->dataSorteio;
    }function getNumSorteio() {
         return $this->numSorteio;
    }
}