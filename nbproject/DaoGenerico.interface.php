<?php

interface DaoGenerico {

    function inserir($objeto);

    function atualizar($objeto);

    function remover($objeto);

    function obterTodos();

    function obterById($id);
}


