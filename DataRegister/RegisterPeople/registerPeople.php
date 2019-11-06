<html>

<head>
    <title>Cadastro Pessoa</title>
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=devide-width, initial-scale=1">

    <link href="../Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../_CSS/styles.css" rel="stylesheet">


</head>

<body>

    <span class="d-block p-2 bg-dark text-white">Cadastro</span>
    <hr/> <br/>

    <!-------------------------------------------------------------------------------------------------------------->

    <div class="container-fluid">

        <form>

            <div class="form-group">
                <label for="nome">Seu Nome</label>
                <input class="form-control" type="text" id="nome" placeholder="Seu Nome Completo">
            </div>

            <div class="form-group">
                <label for="email">Seu Email</label>
                <input class="form-control" type="email" id="email" placeholder="seuemail@email.com">
            </div>


            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="cpf">CPF</label>
                    <input class="form-control" type="text" id="cpf" placeholder="000.000.000.00">
                </div>

                <div class="form-group col-md-3">
                    <label for="dataNascimento">Data de Nascimento</label>
                    <input class="form-control" id="dataNascimento" type="date">
                </div>

                <div class="form-group col-md-3">
                    <label for="sexo">Sexo</label>
                    <select id="sexo" class="form-control">
                        <option selected>Escolher...</option>
                        <option value="masc">Masculino</option>
                        <option value="fem">Feminino</option>
                        <option value="other">Outro...</option>
                    </select>
                </div>

                <div class="form-group col-md-3">
                    <label for="estadoCivil">Estado Civil</label>
                    <select class="form-control" id="estadoCivil">
                        <option selected>Escolher...</option>
                        <option value="solt">Solteiro(a)</option>
                        <option value="casad">Casado(a)</option>
                        <option value="divor">Divorciado(a)</option>
                        <option value="viu">Viuvo(a)</option>
                    </select>
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="telefoneCelular">Telefone Celular</label>
                    <input class="form-control" type="tel" id="telefoneCelular" placeholder="EX: (ddd)90000-0000">
                </div>

                <div class="form-group col-md-3">
                    <label for="telefoneFixo">Telefone Fixo</label>
                    <input class="form-control" type="tel" id="telefoneFixo" placeholder="EX: (ddd)0000-0000">
                </div>
            </div>



            <button type="button" class="btn btn-info">Enviar</button>






        </form>
    </div>

    <!-- <div class="container-fluid">
        <form>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Email</label>
                <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Senha</label>
                <input type="password" class="form-control" id="inputPassword4" placeholder="Senha">
            </div>
    </div>
    <div class="form-group">
        <label for="inputAddress">Endereço</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="Rua dos Bobos, nº 0">
    </div>
    <div class="form-group">
        <label for="inputAddress2">Endereço 2</label>
        <input type="text" class="form-control" id="inputAddress2" placeholder="Apartamento, hotel, casa, etc.">
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputCity">Cidade</label>
            <input type="text" class="form-control" id="inputCity">
        </div>
        <div class="form-group col-md-4">
            <label for="inputEstado">Estado</label>
            <select id="inputEstado" class="form-control">
                  <option selected>Escolher...</option>
                  <option>...</option>
                </select>
        </div>
        <div class="form-group col-md-2">
            <label for="inputCEP">CEP</label>
            <input type="text" class="form-control" id="inputCEP">
        </div>
    </div>
    <div class="form-group">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck">
            <label class="form-check-label" for="gridCheck">
                  Clique em mim
                </label>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Entrar</button>
    </form>
    </div> -->





    <!-------------------------------------------------------------------------------------------------------------->
    <script src="https://unpkg.com/popper.js@1.15.0/dist/umd/popper.min.js"></script>
    <script src="../Bootstrap/js/jquery-3.4.1.min.js "></script>
    <script src="../Bootstrap/js/bootstrap.min.js"></script>
    <script src="Index.js" type="text/javascript"></script>
</body>

</html>