<html>

<head>
    <title>Cadastro</title>
    <link href="Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="estilos.css" rel="stylesheet">
</head>

<body>

    <span class="d-block p-3 bg-primary text-white">Cadastro Instituição</span>

    <div class="container-fluid">

        <form class="was-validated">
            <div class="form-row">
                <div class="form-group custom-control-input col-md-12">
                    <label for="razao_Social">Razão Social:</label>
                    <input class="custom-control-input" type="text" id="razao_Social" placeholder="">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="nome_Fantasia">Nome Fantasia:</label>
                    <input class="form-control" type="text" id="nome_Fantasia" placeholder="">
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="cnpj">CNPJ:</label>
                    <input class="form-control" type="text" id="cnpj" placeholder="">
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email">Email:</label>
                    <input class="form-control" type="email" id="email" placeholder="">
                </div>

                <div class="form-group col-md-6">
                    <label for="senha">Senha:</label>
                    <input class="form-control" type="password" id="senha" placeholder="">
                </div>
            </div>

            <!---------------------------------------------------------------------------------------------------------->
            <hr>
            <span class="d-block p-2 bg-dark text-white">Dados do Cliente</span>
            <br>
            <!---------------------------------------------------------------------------------------------------------->

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="tel1">Telefone 1:</label>
                    <input class="form-control" type="tel" id="tel1" placeholder="">
                </div>

                <div class="form-group col-md-6">
                    <label for="tel2">Telefone 2:</label>
                    <input class="form-control" type="tel" id="tel1" placeholder="">
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="cel1">Telefone Celular:</label>
                    <input class="form-control" type="tel" id="cel1" placeholder="">
                </div>

                <div class="form-group col-md-6">
                    <label for="wpp">WhatsApp:</label>
                    <input class="form-control" type="tel" id="wpp" placeholder="">
                </div>
            </div>

            <!---------------------------------------------------------------------------------------------------------->
            <hr>
            <span class="d-block p-2 bg-dark text-white">Dados do Cliente</span>
            <br>
            <!---------------------------------------------------------------------------------------------------------->

            <div class="form-row">
                <div class="form-group col-md-10">
                    <label for="endereco">Endereço:</label>
                    <input class="form-control" type="text" id="endereco" placeholder="">
                </div>

                <div class="form-group col-md-2">
                    <label for="numero">Numero:</label>
                    <input class="form-control" type="number" id="numero" placeholder="">
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="complemento">Complemento:</label>
                    <input class="form-control" type="text" id="complemento" placeholder="">
                </div>

                <div class="form-group col-md-3">
                    <label for="bairro">Bairro:</label>
                    <input class="form-control" type="text" id="bairro" placeholder="">
                </div>

                <div class="form-group col-md-3">
                    <label for="uf">UF</label>
                    <select class="form-control" id="uf" required name="uf" ngModel autocomplete="off"> 
                                                <option selected>Selecione o Estado...</option> 
                                                <option value="ac">Acre</option> 
                                                <option value="al">Alagoas</option> 
                                                <option value="am">Amazonas</option> 
                                                <option value="ap">Amapá</option> 
                                                <option value="ba">Bahia</option> 
                                                <option value="ce">Ceará</option> 
                                                <option value="df">Distrito Federal</option> 
                                                <option value="es">Espírito Santo</option> 
                                                <option value="go">Goiás</option> 
                                                <option value="ma">Maranhão</option> 
                                                <option value="mt">Mato Grosso</option> 
                                                <option value="ms">Mato Grosso do Sul</option> 
                                                <option value="mg">Minas Gerais</option> 
                                                <option value="pa">Pará</option> 
                                                <option value="pb">Paraíba</option> 
                                                <option value="pr">Paraná</option> 
                                                <option value="pe">Pernambuco</option> 
                                                <option value="pi">Piauí</option> 
                                                <option value="rj">Rio de Janeiro</option> 
                                                <option value="rn">Rio Grande do Norte</option> 
                                                <option value="ro">Rondônia</option> 
                                                <option value="rs">Rio Grande do Sul</option> 
                                                <option value="rr">Roraima</option> 
                                                <option value="sc">Santa Catarina</option> 
                                                <option value="se">Sergipe</option> 
                                                <option value="sp">São Paulo</option> 
                                                <option value="to">Tocantins</option> 
                                            </select>
                </div>

                <div class="form-group col-md-3">
                    <label for="municipio">Municipio:</label>
                    <input class="form-control" type="text" id="municipio" placeholder="">
                </div>
            </div>



            <button type="button" class="btn btn-info">Enviar</button>


        </form>
    </div>

    <!-------------------------------------------------------------------------------------------------------------->
    <script src="https://unpkg.com/popper.js@1.15.0/dist/umd/popper.min.js"></script>
    <script src="Bootstrap/js/jquery-3.4.1.min.js "></script>
    <script src="Bootstrap/js/bootstrap.min.js "></script>
</body>

</html>