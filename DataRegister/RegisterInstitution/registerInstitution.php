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
                    <input class="form-control" type="tel" id="tel2" placeholder="">
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



            <button type="button" class="btn btn-info">Enviar</button>


        </form>
    </div>

    <!-------------------------------------------------------------------------------------------------------------->
    <script src="https://unpkg.com/popper.js@1.15.0/dist/umd/popper.min.js"></script>
    <script src="Bootstrap/js/jquery-3.4.1.min.js "></script>
    <script src="Bootstrap/js/bootstrap.min.js "></script>
</body>

</html>