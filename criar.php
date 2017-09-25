<?php

require './SmartPOO.class.php';
$smart = new SmartPOO();

function arquivo($projeto, $class, $tipo, $texto) {
    // "a" representa que o arquivo é aberto para ser escrito
    $fp = fopen($projeto . $class . $tipo, "a");
    //permissões da pasta e do arquivo
    chmod($projeto . $class . $tipo, 0777);
    //Escrever
    fwrite($fp, $texto);
    // Fecha o arquivo
    fclose($fp);
}

if (!empty($_POST['nomeClass']) && !empty($_POST['nomeProjeto']) && !empty($_POST['tipo']) && !empty($_POST['pk'])):
    $class = $_POST['nomeClass'];
    $pk = $_POST['pk'];
    if (isset($_POST['variavel'])):
        $variavel = $_POST['variavel'];
        $variaveis = array_merge($pk, $variavel);
    else:
        $variaveis = $pk;
    endif;
    $tipagem = $_POST['tipo'];

    //Criar projeto
    $projeto = $_POST['nomeProjeto'] . "/";
    if (!file_exists($projeto)):
        mkdir($projeto);
        chmod($projeto, 0777);
        mkdir($projeto . "modelo/");
        chmod($projeto . "modelo/", 0777);
        mkdir($projeto . "dao/");
        chmod($projeto . "dao/", 0777);
        mkdir($projeto . "controle/");
        chmod($projeto . "controle/", 0777);
        mkdir($projeto . "web/");
        mkdir($projeto . "web/gerenciamento/");
        chmod($projeto . "web/", 0777);
        chmod($projeto . "web/gerenciamento/", 0777);
        copy("DaoGenerico.interface.php", "copia.php");
        chmod("copia.php", 0777);
        rename("copia.php", $projeto . "dao/DaoGenerico.interface.php");
        copy("DbConnection.class.php", "copia.php");
        chmod("copia.php", 0777);
        rename("copia.php", $projeto . "dao/DbConnection.class.php");
    endif;

    //Criar Classe de negocios (Modelo)
    arquivo($projeto, "modelo/" . $class, ".class.php", $smart->modelo($class, $variaveis));
    //Criar Dao
    arquivo($projeto, "dao/" . "Dao" . $class, ".class.php", $smart->dao($class, $pk, $variaveis, $tipagem));
    //Criar controle
    arquivo($projeto, "controle/" . "Controle" . $class, ".class.php", $smart->controle($class));
    //Criar Gerenciamento
    arquivo($projeto, "web/gerenciamento/gerenciar" . $class, ".php", $smart->gerenciamento($class, $variaveis));
    echo "Sucesso!";
else:
    echo "Preencha todos os  campos";
endif;
