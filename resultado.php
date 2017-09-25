<?php

require './SmartPOO.class.php';
$smart = new SmartPOO();

if (isset($_POST['nomeClass']) && isset($_POST['tipo']) && isset($_POST['pk'])):
    $class = $_POST['nomeClass'];
    $pk = $_POST['pk'];
    if (isset($_POST['variavel'])):
        $variavel = $_POST['variavel'];
        $variaveis = array_merge($pk, $variavel);
    else:
        $variaveis = $pk;
    endif;
    $tipagem = $_POST['tipo'];
    echo nl2br($smart->gerenciamento($class, $variaveis));
else:
    echo "Preencha os campos obrigatorios";
endif;










