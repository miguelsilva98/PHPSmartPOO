<?php

interface DaoGenerico {

    function inserir($objeto);

    function atualizar($objeto);

    function remover($objeto);

    function obterTodosByParametro($sql, $atributoSQL, $variavel, $pdoPARAM);

    function obter($sql, $atributoSQL, $variavel, $pdoPARAM);
}


