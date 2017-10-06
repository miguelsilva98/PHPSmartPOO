<?php

require_once '../../dao/DaoComprar.class.php';
require_once '../../modelo/Comprar.class.php';

class ControleComprar {

    private $controle;

    function __construct() {
        $this->controle = new DaoComprar();
    }

    function inserir(Comprar $comprar) {
        return $this->controle->inserir($comprar);
    }

    function atualizar(Comprar $comprar) {
        return $this->controle->atualizar($comprar);
    }

    function remover(Comprar $comprar) {
        return $this->controle->remover($comprar);
    }

    function obterTodos() {
        $sql = "SELECT * FROM Comprar ";
        return $this->controle->obterTodosByParametro($sql);
    }

    function obterById($id) {
        $sql = 'SELECT * FROM Comprar WHERE id=:id';
        return $this->controle->obter($sql, ':id', $id, PDO::PARAM_INT);
    }

}
