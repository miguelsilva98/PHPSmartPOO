<?php
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="bootstrap.css"/>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12"><h1 class="h1">PHP Smart POO</h1></div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <form>
                        <div class="form-inline">
                            <div class="form-group">
                                <label>Nome do Projeto</label>
                                <input type="text" id="nomeProjeto" class="form-control" placeholder="Nome da pasta principal" >
                            </div>

                            <div class="form-group">
                                <label>Nome da Classe</label>
                                <input type="text" class="form-control" id="nomeClass" placeholder="Nome da classe" >
                            </div>
                        </div>

                        <div class="form-group form-inline">
                            <label>Variaveis</label> <br/>
                            <div id="variaveis">
                                <label>1:(PK)</label> <input type="text" class="form-control" name="pk[]"  />
                                <select name="tipo[]" class="form-control">
                                    <option value="txt">Texto</option>
                                    <option value="INT" selected>Numero</option>
                                </select><br/>

                            </div>
                        </div>
                        <button type="button" class="btn btn-default" onclick="novaVariavel()">ADD Variavel</button>
                        <button type="button" class="btn btn-default" onclick="novaVariavelPK()">ADD PK</button>
                        <button type="button" class="btn btn-default"  onclick="cria()">ver resultado</button>
                        <button type="reset" class="btn btn-default"  onclick="baixar()">Baixar</button>

                    </form>
                </div>
            </div>
            <div class="row">
                <div id="resultado">

                </div>
            </div>
        </div>
        <script src="jquery.js"></script>

        <script>
                            var contVar = 1;
                            function novaVariavel() {
                                contVar++;
                                var newVar = $('#variaveis');
                                var criar = '<label>' + contVar + ':</label> <input type="text" class="form-control" name="var[]"/>' +
                                        '<select name="tipo[]" class="form-control">' +
                                        '<option value ="txt">Texto</option>' +
                                        '<option value="INT">Numero</option>' +
                                        '</select><br/>';
                                newVar.html(newVar.html() + criar);

                            }
                            function novaVariavelPK() {
                                contVar++;
                                var newVar = $('#variaveis');
                                var criar = '<label>' + contVar + ':(PK)</label> <input type="text" class="form-control" name="pk[]"/>' +
                                        '<select name="tipo[]" class="form-control">' +
                                        '<option value ="txt">Texto</option>' +
                                        '<option value="INT">Numero</option>' +
                                        '</select><br/>';
                                newVar.html(newVar.html() + criar);
                            }

                            function cria() {
                                var variaveis = new Array();
                                $("input[name='var[]']").each(function () {
                                    variaveis.push($(this).val());
                                });
                                var pk = new Array();
                                $("input[name='pk[]']").each(function () {
                                    pk.push($(this).val());
                                });
                                var tipo = new Array();
                                $("select[name='tipo[]']").each(function () {
                                    tipo.push($(this).val());
                                });
                                $.ajax({
                                    type: 'POST',
                                    url: 'criar.php',
                                    beforeSend: function () {
                                        // $("#resultado").html('<div class="loader"></div>');
                                    },
                                    data: {
                                        variavel: variaveis,
                                        pk: pk,
                                        nomeClass: $('#nomeClass').val(),
                                        nomeProjeto: $('#nomeProjeto').val(),
                                        tipo: tipo,
                                        acao: 'criar'
                                    },
                                    success: function (msg)
                                    {
                                        $("#resultado").html(msg);
                                    }});
                            }

                            function baixar() {
                                $.ajax({
                                    type: 'POST',
                                    url: 'criar.php',
                                    beforeSend: function () {
                                        // $("#resultado").html('<div class="loader"></div>');
                                    },
                                    data: {
                                        nomeClass: $('#nomeClass').val(),
                                        nomeProjeto: $('#nomeProjeto').val(),
                                        acao: 'baixar'
                                    },
                                    success: function (msg)
                                    {
                                        $("#resultado").html(msg);
                                    }});
                            }

        </script>
    </body>
</html>
