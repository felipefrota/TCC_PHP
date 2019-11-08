<html>

<head>
    <title>Cadastro</title>
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=devide-width, initial-scale=1">

    <link href="../Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../_CSS/styles.css" rel="stylesheet">


</head>

<body>

    <span class="d-block p-3 bg-primary text-white">Cadastro Instituição</span>

    <div class="container-fluid">

        <form class="was-validated" action="../cadastroInstituicao.php" method="post">

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="razao_Social">Razão Social:</label>
                    <input class="form-control" type="text" name="razao_Social" id="razao_Social" placeholder="">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="nome_Fantasia">Nome Fantasia:</label>
                    <input class="form-control" type="text" name="nome_Fantasia" id="nome_Fantasia" placeholder="">
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="cnpj">CNPJ:</label>
                    <input class="form-control" type="text" name="cnpj" id="cnpj" placeholder="">
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email">Email:</label>
                    <input class="form-control" type="email" name="email" id="email" placeholder="">
                </div>

                <div class="form-group col-md-6">
                    <label for="senha">Senha:</label>
                    <input class="form-control" type="password" name="senha" id="senha" placeholder="">
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
                    <input class="form-control" type="tel" name="telefoneFixo1" id="telefoneFixo1" placeholder="">
                </div>

                <div class="form-group col-md-6">
                    <label for="tel2">Telefone 2:</label>
                    <input class="form-control" type="tel" name="telefoneFixo2" id="telefoneFixo2" placeholder="">
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="cel1">Telefone Celular:</label>
                    <input class="form-control" type="tel" name="telefoneCelular" id="telefoneCelular" placeholder="">
                </div>

                <div class="form-group col-md-6">
                    <label for="wpp">WhatsApp:</label>
                    <input class="form-control" type="tel" name="wpp" id="wpp" placeholder="">
                </div>
            </div>



            <button type="submit" class="btn btn-info">Enviar</button>


        </form>
    </div>

    <!-------------------------------------------------------------------------------------------------------------->
    <script src="https://unpkg.com/popper.js@1.15.0/dist/umd/popper.min.js"></script>
    <script src="../Bootstrap/js/jquery-3.4.1.min.js "></script>
    <script src="../Bootstrap/js/bootstrap.min.js"></script>
    <script src="fields.js" type="text/javascript"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
</body>

</html>