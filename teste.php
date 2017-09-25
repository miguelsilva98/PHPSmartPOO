<?php

$arquivos = [
    'arquivo' => array('nbproject/private/private.properties', 'teste'),
    'destino' => array('nbproject/private/', 'tt')
];


for ($i = 0; $i < count($arquivos); $i++):
    echo $arquivos['arquivo'][$i] . ' <br/>';
endfor;
