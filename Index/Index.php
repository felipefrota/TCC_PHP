<?php require_once("../conexao/conexao.php"); ?>
<?php
//variavel de sessao
session_start();

if (isset($_POST["usuario"])) {
  $usuario = $_POST["usuario"];
  $senha = $_POST["senha"];

  $login = "SELECT * ";
  $login .= "FROM tb_usuario ";
  $login .= "WHERE email = '{$usuario}' and senha = '{$senha}' ";

  $acesso = mysqli_query($conecta, $login);
  if (!$acesso) {
    die("Falha na consulta ao banco");
  }


  $informacao = mysqli_fetch_assoc($acesso);

  if (empty($informacao)) {
    $mensagem = "<script>alert('Login incorreto'); location.href='index.php';</script>";
    header("location:Index/index.php");
  } else {

    $_SESSION["user_portal"] = $informacao["usuario_instituicaoID"];
    header("location:../afterLogin/usuario.php");
  }




  //------------------------------------------------------------------------------------------------------//
  //Puxando as instituições do banco
  $instituicoes = "SELECT * ";
  $instituicoes .= "FROM tb_usuario ";
  $instituicoes .= "WHERE tipo = 2 ";
  $lista_instituicoes = mysqli_query($conecta, $instituicoes);
  if (!$lista_instituicoes) {
    die("erro no banco ao procurar instituções");
  }






  // echo $usuario . "<br>";
  // echo $senha;    
}

?>




<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE-edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <link href="../Bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../_CSS/styles.css" rel="stylesheet">


  <title>PROJETO-TCC</title>


  <!------------------------------------ERROR LOGIN---------------------------------------------->
  <?php
  if (isset($mensagem)) {
    ?>
    <p><?php echo $mensagem ?></p>

  <?php
  }
  ?>
  <!--------------------------------------------------------------------------------------------->

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link href="../Bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="css/agency.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Modal voce se cadastrou com sucesso-->
  <div class="modal fade" id="modalCadastrado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Você foi cadastrado com sucesso! </br> Agora faça login</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" href="#top">Fechar</button>

        </div>
      </div>
    </div>
  </div>


  <!--Mostrar Janela Login-->
  <form action="../login.php" method="post">

    <div class="container-fluid">
      <div class="modal fade" id="telaLogin" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="login">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-black-50" id="tituloTela">
                Faca seu Login</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal">
                <div class="form-group row">
                  <div class="col-sm-10">
                    <input class="form-control" type="email" name="usuario" placeholder="Email">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-10">
                    <input class="form-control" type="password" name="senha" placeholder="Senha">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-10">
                    <a href="../recuperarSenha/recuperarSenha.php">Esqueceu
                      sua senha?</a>
                  </div>
                </div>
              </form>
            </div>
            <div class="modal-footer">

              <button type="submit" id="submit" value="login" class="btn btn-info">Login</button>


            </div>
          </div>
        </div>
      </div>
      <!--Fechando modal/ Fechando tela login-->


      <!-- Navigation -->
      <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
          <a class="navbar-brand js-scroll-trigger" href="#page-top">Novel Life</a>
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ml-auto">
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#services">Serviços</a>
              </li>
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#portfolio">Instituições</a>
              </li>
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#about">Sobre</a>
              </li>
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#team">Nosso time</a>
              </li>
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#contact">Contato</a>
              </li>
              <!---------botão cadastro-------->
              <li>
                <a class="nav-item">
                  <button type="button" class="btn btn-outline-warning janelaLogin" data-toggle="modal" data-target="#telaLogin">Login</button>
                </a>
              <li>
                <div class="nav-item">
                  <button type="button" class="btn btn-outline-warning" data-toggle="dropdown" data-target="">Cadastro</button>

                  <ul class="nav nav-pills">
                    <li class="nav-item pill-1">
                      <form class="dropdown-menu p-3 dropdown-menu-right mr-5 ">
                        <div class="form-group">
                          <a class="nav-link active js-scroll-trigger btn btn-dark" href="#cadastro_usuario" role="button" aria-pressed="true">Usuario</a>
                        </div>
                        <div class="form-group">
                          <a class="nav-link active js-scroll-trigger btn btn-dark" href="#cadastro_instituicao" role="button" aria-pressed="true">Instituição</a>
                        </div>
                    </li>
                  </ul>

                </div>

              </li>
          </div>
        </div>
  </form>


  </div>
  </form>
  </li>

  <!---MODAL 2--->



  <!--Modal login ou senha invalido-->
  <!-- <button type="button" class="btn btn-primary" data-toggle="modal"
data-target="#modalExemplo">
Abrir modal de demonstração
</button> -->

  <!-- Modal -->
  <!---------------------------------------------------------------------------->




  </ul>
  </div>
  </div>
  </nav>


  </div>
  </div>


  </header>
  <!--Fechando o Div:Nav-Bar-->


  <!----------------------------------------------------------------------------------------->



  </ul>
  </div>
  </div>
  </nav>

  <!-- Header -->
  <header class="masthead">
    <div class="container">
      <div class="intro-text">
        <div class="intro-lead-in"> Projeto Novel Life</div>
        <div class="intro-heading text-uppercase">É um prazer conhecer você </div>
        <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#services">Me conte mais</a>
      </div>
    </div>

    <!-----------------------------------------Botão fluuante whatsapp-------------------------------------------------->
    <a href="https://api.whatsapp.com/send?l=pt&amp;phone=5561985294948"><img src="../Images/botao_flutuante.png" style="height:80px; position:fixed; bottom: 25px; right: 25px; z-index:100;" data-selector="img"></a>

  </header>


  <!-- Services -->
  <section class="page-section" id="services">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Nossos Serviços</h2>
          <h3 class="section-subheading text-muted">Conheça nossos serviços prestados.</h3>
        </div>
      </div>
      <div class="row text-center">
        <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fas fa-chalkboard-teacher fa-stack-1x fa-inverse"></i>
          </span>
          <h4 class="service-heading">Plataforma Intermediadora</h4>
          <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
        </div>
        <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
          </span>
          <h4 class="service-heading">Divulgação da sua empresa</h4>
          <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
        </div>
        <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fas fa-user-md fa-stack-1x fa-inverse"></i>
          </span>
          <h4 class="service-heading">Auxílio Psicológico</h4>
          <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Portfolio CART -->
  <section class="bg-light page-section" id="portfolio">
    <div class="container">
      <!-- <div class="row"> -->
      <div class="col-lg-12 text-center">
        <h2 class="section-heading text-uppercase">Instituições Cadastradas</h2>
        <h3 class="section-subheading text-muted">Conheça nossas instituições parceiras.</h3>
      </div>
      <hr>
      <!--CART-->
      <div class="row">
        <?php
        //consultar no banco de dados
        $result_usuario = "SELECT * FROM tb_usuario where tipo = 2 ";
        $resultado_usuario = mysqli_query($conecta, $result_usuario);
        while ($linha = mysqli_fetch_assoc($resultado_usuario)) {
          ?>

          <div class=" col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <div class="card bg-light">
              <img class="card-img-top img-fluid" src="../Uploads/<?php echo $linha["upload_file"] ?>" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title"><?php echo $linha["nomeUsuario_nomeFantasia"] ?></h5>
                <p class="card-text"><?php echo $linha["brev_apresent"] ?></p>
                <div class="card-footer">
                  <small class="text-muted">
                    <h5>Endereço:</h5>
                  </small>
                  <small class="text-muted"><?php echo $linha["rua_avenida"] ?>,
                    <?php echo $linha["numero"] ?>, <?php echo $linha["estado"] ?> - <?php echo $linha["cidade"] ?>, <?php echo $linha["cep"] ?></small>
                </div>
                <div class="card-footer">
                  <small class="text-muted">
                    <h5>Contato:</h5>
                  </small>
                  <small class="text-muted">Telefone: <?php echo $linha["telefoneFixo"] ?> <br> Celular:
                    <?php echo $linha["telefoneCelular"] ?> <br> WhatsApp: <?php echo $linha["wpp"] ?></small>
                </div>
                <a href="<?php echo $linha["url"] ?>" class="btn btn-primary">Visitar</a>
              </div>
            </div>
          </div>
          <!--Fechando a div col-xs-12 col-sm-6 col-md-4 col-lg-4-->
        <?php
        }
        ?>


      </div>
      <!--Fechando a div row-->

    </div>
    <!--Fechando o div instituicoes -->
    </div>
    <!--Fechando a div container-fluid-->
  </section>

  <!-- About -->
  <section class="page-section" id="about">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Sobre</h2>
          <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <ul class="timeline">
            <li>
              <div class="timeline-image">
                <img class="rounded-circle img-fluid" src="img/about/1.jpg" alt="">
              </div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                  <h4>2018</h4>
                  <h4 class="subheading">Causa social sempre foi desejada</h4>
                </div>
                <div class="timeline-body">
                  <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                </div>
              </div>
            </li>
            <li class="timeline-inverted">
              <div class="timeline-image">
                <img class="rounded-circle img-fluid" src="img/about/2.jpg" alt="">
              </div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                  <h4>March 2011</h4>
                  <h4 class="subheading">An Agency is Born</h4>
                </div>
                <div class="timeline-body">
                  <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                </div>
              </div>
            </li>
            <li>
              <div class="timeline-image">
                <img class="rounded-circle img-fluid" src="img/about/3.jpg" alt="">
              </div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                  <h4>December 2012</h4>
                  <h4 class="subheading">Transition to Full Service</h4>
                </div>
                <div class="timeline-body">
                  <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                </div>
              </div>
            </li>
            <li class="timeline-inverted">
              <div class="timeline-image">
                <img class="rounded-circle img-fluid" src="img/about/4.jpg" alt="">
              </div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                  <h4>July 2014</h4>
                  <h4 class="subheading">Phase Two Expansion</h4>
                </div>
                <div class="timeline-body">
                  <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                </div>
              </div>
            </li>
            <li class="timeline-inverted">
              <div class="timeline-image">
                <h4>Be Part
                  <br>Of Our
                  <br>Story!</h4>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- Team -->
  <section class="bg-light page-section" id="team">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Nosso Time</h2>
          <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4">
          <div class="team-member">
            <img class="mx-auto rounded-circle" src="img/team/4.jpeg" alt="">
            <h4>Hallana Keury</h4>
            <p class="text-muted">Estudante</p>
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-facebook-f"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-linkedin-in"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="team-member">
            <img class="mx-auto rounded-circle" src="img/team/6.jpeg" alt="">
            <h4>Vinicius Almeida</h4>
            <p class="text-muted"></p>
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-facebook-f"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-linkedin-in"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="team-member">
            <img class="mx-auto rounded-circle" src="img/team/5.jpeg" alt="">
            <h4>Felipe Frota</h4>
            <p class="text-muted">Estudante</p>
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-facebook-f"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-linkedin-in"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-8 mx-auto text-center">
          <p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Clients -->
  <section class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-6">
          <a href="#">
            <img class="img-fluid d-block mx-auto" src="img/logos/envato.jpg" alt="">
          </a>
        </div>
        <div class="col-md-3 col-sm-6">
          <a href="#">
            <img class="img-fluid d-block mx-auto" src="img/logos/designmodo.jpg" alt="">
          </a>
        </div>
        <div class="col-md-3 col-sm-6">
          <a href="#">
            <img class="img-fluid d-block mx-auto" src="img/logos/themeforest.jpg" alt="">
          </a>
        </div>
        <div class="col-md-3 col-sm-6">
          <a href="#">
            <img class="img-fluid d-block mx-auto" src="img/logos/creative-market.jpg" alt="">
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- Cadastro Usuario -->
  <section class="page-section" id="cadastro_usuario">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">



          <span class="d-block p-2 bg-dark text-white">Cadastro Usuário</span>
          <hr /> <br />

          <!-------------------------------------------------------------------------------------------------------------->

          <div class="container-fluid">

            <form class="was-validated" id="register" action="../cadastroUsuario.php" method="post">

              <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="usuario">Seu Nome</label>
                  <input class="form-control" type="text" name="usuario" id="usuario" placeholder="Usuario" required minlength="2">
                  <div class="invalid-feedback">
                    Nome Obrigatorio!
                  </div>
                </div>

                <div class="form-group col-md-4">
                  <label for="senha">Sobrenome:</label>
                  <input class="form-control" type="text" name="sobrenome" id="sobrenome" placeholder="Sobrenome" required minlength="4">
                  <div class="invalid-feedback">
                    Sobrenome Obrigatorio!
                  </div>
                </div>

                <div class="form-group col-md-4">
                  <label for="senha">Senha</label>
                  <input class="form-control" type="password" name="senha" id="senha" placeholder="Senha" required minlength="4">
                  <div class="invalid-feedback">
                    Senha Obrigatoria!
                  </div>
                </div>

              </div>


              <div class="form-group">
                <label for="email">Seu Email</label>
                <input class="form-control" type="email" name="email" id="email" placeholder="seuemail@email.com" required>
                <div class="invalid-feedback">
                  Email Obrigatorio!
                </div>
              </div>


              <div class="form-row">
                <div class="form-group col-md-3">
                  <label for="cpf">CPF</label>
                  <input class="form-control" type="text" name="cpf" id="cpf" placeholder="000.000.000.00" required minlength="14">
                  <div class="invalid-feedback">
                    CPF Obrigatorio!
                  </div>
                </div>

                <div class="form-group col-md-3">
                  <label for="dataNascimento">Data de Nascimento</label>
                  <input class="form-control" name="dataNascimento" id="dataNascimento" type="date" required>
                  <div class="invalid-feedback">
                    Data de Nascimento Obrigatorio!
                  </div>
                </div>

                <div class="form-group col-md-3">
                  <label for="sexo">Sexo</label>
                  <select name="sexo" id="sexo" class="form-control" required>
                    <option value="" selected>Escolher...</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Feminino">Feminino</option>
                    <option value="Outro">Outro...</option>
                  </select>
                  <div class="invalid-feedback">
                    Sexo Obrigatorio!
                  </div>
                </div>

                <div class="form-group col-md-3">
                  <label for="estadoCivil">Estado Civil</label>
                  <select class="form-control" name="estadoCivil" id="estadoCivil" required>
                    <option value="" selected>Escolher...</option>
                    <option value="Solteiro(a)">Solteiro(a)</option>
                    <option value="Casado(a)">Casado(a)</option>
                    <option value="Divorciado(a)">Divorciado(a)</option>
                    <option value="Viuvo(a)">Viuvo(a)</option>
                  </select>
                  <div class="invalid-feedback">
                    Estado Civil Obrigatorio!
                  </div>
                </div>
              </div>


              <div class="form-row">
                <div class="form-group col-md-3">
                  <label for="telefoneCelular">Telefone Celular</label>
                  <input class="form-control" type="tel" name="telefoneCelular" id="telefoneCelular" placeholder="EX: (ddd)90000-0000">
                </div>

                <div class="form-group col-md-3">
                  <label for="telefoneFixo">Telefone Fixo</label>
                  <input class="form-control" type="tel" name="telefoneFixo" id="telefoneFixo" placeholder="EX: (ddd)0000-0000">
                </div>
              </div>




              <!---------------------------------------------------------------------------------------------------------->
              <hr>
              <span class="d-block p-2 bg-dark text-white">Endereço</span>
              <br />
              <!---------------------------------------------------------------------------------------------------------->
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="cep">CEP</label>
                  <input class="form-control" type="text" name="cep" id="cep" id="cep" placeholder="EX: 00000-000" required minlength="9">
                  <div class="invalid-feedback">
                    CEP Obrigatorio!
                  </div>
                </div>

                <div class="form-group col-md-4">
                  <label for="estado">Estado</label>
                  <input class="form-control" type="text" name="estado" id="estado" placeholder="EX: Distrito Federal" required minlength="4">
                  <div class="invalid-feedback">
                    Estado Obrigatorio!
                  </div>
                </div>

                <div class="form-group col-md-4">
                  <label for="cidade">Cidade</label>
                  <select class="form-control" name="cidade" id="cidade" required>
                    <option selected value="">Selecione o Estado...</option>
                    <option value="AC">AC</option>
                    <option value="AC">AC</option>
                    <option value="AM">AM</option>
                    <option value="AP">AP</option>
                    <option value="BA">BA</option>
                    <option value="CE">CE</option>
                    <option value="DF">DF</option>
                    <option value="ES">ES</option>
                    <option value="GO">GO</option>
                    <option value="MA">MA</option>
                    <option value="MT">MT</option>
                    <option value="MS">MS</option>
                    <option value="MG">MG</option>
                    <option value="PA">PA</option>
                    <option value="PB">PB</option>
                    <option value="PR">PR</option>
                    <option value="PE">PE</option>
                    <option value="PI">PI</option>
                    <option value="RJ">RJ</option>
                    <option value="RN">RN</option>
                    <option value="RO">RO</option>
                    <option value="RS">RS</option>
                    <option value="RR">RR</option>
                    <option value="SC">SC</option>
                    <option value="SE">SE</option>
                    <option value="SP">SP</option>
                    <option value="TO">TO</option>
                  </select>
                  <div class="invalid-feedback">
                    Cidade Obrigatoria!
                  </div>
                </div>
              </div>


              <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="bairro">Bairro</label>
                  <input class="form-control" type="text" name="bairro" id="bairro" placeholder="EX: Asa Norte" required minlength="3">
                  <div class="invalid-feedback">
                    Bairro Obrigatorio!
                  </div>
                </div>

                <div class="form-group col-md-4">
                  <label for="rua_avenida">Rua/Avenida</label>
                  <input class="form-control" type="text" name="rua_avenida" id="rua_avenida" required minlength="2">
                  <div class="invalid-feedback">
                    Rua ou Avenida Obrigatorio!
                  </div>
                </div>

                <div class="form-group col-md-4">
                  <label for="numero">Número</label>
                  <input class="form-control" type="number" name="numero" id="numero" placeholder="Numero casa ou Apt" required minlength="1">
                  <div class="invalid-feedback">
                    Número Obrigatorio!
                  </div>
                </div>
              </div>


              <div class="form-group">
                <label for="adicional">Adicional</label>
                <input class="form-control" type="text" name="adicional" id="adicional" placeholder="Dados adicionais(Opcional)">
              </div>



              <!---------------------------------------------------------------------------------------------------------->
              <hr>
              <span class="d-block p-2 bg-dark text-white">Prontuario</span>
              <br />
              <!---------------------------------------------------------------------------------------------------------->



              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="motivoInternacao">Qual o motivo da internação?</label>
                  <select name="motivoInternacao" id="motivoInternacao" class="form-control" required>
                    <option value="" selected>Escolher...</option>
                    <option value="Drogas">Drogas</option>
                    <option value="Depressao">Depressão</option>
                    <option value="Reabilitacao Social">Reabilitação Social</option>
                    <option value="Outros">Outros</option>
                  </select>
                  <div class="invalid-feedback">
                    Motivo Obrigatorio!
                  </div>
                </div>

                <div class="form-group col-md-6">
                  <label for="motiv_Adicional">Se clicou em outros nós conte qual foi o motivo?</label>
                  <input class="form-control" type="text" name="motiv_Adicional" id="motiv_Adicional" placeholder="Opcional...">
                </div>
              </div>
              <!------------------------------------------------------------------------------------------------>
              <hr>
              <span class="d-block p-2 bg-dark text-white">Remédios</span>
              <br />
              <!------------------------------------------------------------------------------------------------>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="remed">Toma algum remédio?</label>
                  <input class="form-control" type="text" name="remed" id="remed" placeholder="Ex:Remédio, Remédio 2, Remédio 3">
                </div>

                <div class="form-group col-md-6">
                  <label for="alergRemedio">Alérgico a alguma medicação?</label>
                  <input class="form-control" type="text" name="alergRemedio" id="alergRemedio" placeholder="Ex: Remédio, Remédio 02, Remédio 03">
                </div>
              </div>


              <div class="form-group">
                <label for="sintom">Tem sintomas? Quais?</label>
                <input class="form-control" type="text" name="sintom" id="sintom" placeholder="Descreva os sintomas">
              </div>


              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="doenc_Cronic">Alguma doença cronica?</label>
                  <input class="form-control" type="text" name="doenc_Cronic" id="doenc_Cronic" placeholder="Digite aqui a doença">
                </div>

              </div>

              <!------------------------------------------------------------------------------------------------>
              <hr>
              <span class="d-block p-2 bg-dark text-white">Instituição</span>
              <br />
              <!------------------------------------------------------------------------------------------------>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="instit">Qual instituição de preferencia?</label>
                  <select name="instit" id="instit" class="form-control" required>
                    <?php
                    // $minhaInst = $dataUser_login["instit"];
                    // while($linha = mysqli_fetch_assoc($lista_instituicoes)) {
                    while ($linha = mysqli_fetch_assoc($lista_instituicoes)) {
                      ?>
                      <option value="<?php echo $linha["nomeUsuario_nomeFantasia"];  ?>">
                        <?php echo utf8_encode($linha["nomeUsuario_nomeFantasia"]);  ?>
                      </option>
                    <?php
                    }

                    ?>

                    <!------->


                  </select>
                </div>

                <div class="form-group col-md-6">
                  <label for="levar_Inst">Vai levar alguma coisa para a instituição?</label>
                  <input class="form-control" type="text" name="levar_Inst" id="levar_Inst" placeholder="Ex: cobertor, tavesseiro, etc...">
                </div>

              </div>


              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="obs_Inst">Alergia a algum produto?</label>
                  <input class="form-control" type="text" name="obs_Inst" id="obs_Inst" placeholder="Ex: amaciante, sabão em pó, etc...">
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="obs_Intolerancia">Intolerância a algum alimento?</label>
                  <input class="form-control" type="text" name="obs_Intolerancia" id="obs_Intolerancia" placeholder="Ex: lactose, glúten, etc...">
                </div>
              </div>



              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalCadastrado">
                Enviar
              </button>






            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!---PARA AQUI--->

  <!-- Cadastro Instituicao -->
  <section class="page-section" id="cadastro_instituicao">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">



          <span class="d-block p-3 bg-dark text-warning">Cadastro Instituição</span>

          <div class="container-fluid">

            <form class="was-validated" action="../cadastroInstituicao.php" method="post">

              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="razao_Social">Razão Social:</label>
                  <input class="form-control" type="text" name="razao_Social" id="razao_Social" placeholder="" required minlength="2">
                  <div class="invalid-feedback">
                    Razão Social Obrigatoria!
                  </div>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="nome_Fantasia">Nome Fantasia:</label>
                  <input class="form-control" type="text" name="nome_Fantasia" id="nome_Fantasia" placeholder="" required minlength="2">
                  <div class="invalid-feedback">
                    Nome Fantasia Obrigatorio!
                  </div>
                </div>
              </div>


              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="cnpj">CNPJ:</label>
                  <input class="form-control" type="text" name="cnpj" id="cnpj" placeholder="" required minlength="18">
                  <div class="invalid-feedback">
                    CNPJ Obrigatorio!
                  </div>
                </div>
              </div>


              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="email">Email:</label>
                  <input class="form-control" type="email" name="email" id="email" placeholder="" required minlength="2">
                  <div class="invalid-feedback">
                    Email Obrigatorio!
                  </div>
                </div>

                <div class="form-group col-md-6">
                  <label for="senha">Senha:</label>
                  <input class="form-control" type="password" name="senha" id="senha" placeholder="" required minlength="4">
                  <div class="invalid-feedback">
                    Senha Obrigatorio!
                  </div>
                </div>
              </div>

              <!---------------------------------------------------------------------------------------------------------->
              <hr>
              <span class="d-block p-2 bg-dark text-white">Dados da Instituição</span>
              <br>
              <!---------------------------------------------------------------------------------------------------------->

              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="tel1">Telefone 1:</label>
                  <input class="form-control" type="tel" name="telefoneFixo1" id="telefoneFixo1" placeholder="" required minlength="14">
                  <div class="invalid-feedback">
                    Telefone Obrigatorio!
                  </div>
                </div>

                <div class="form-group col-md-6">
                  <label for="tel2">Telefone 2:</label>
                  <input class="form-control" type="tel" name="telefoneFixo2" id="telefoneFixo2" placeholder="">
                </div>
              </div>


              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="cel1">Telefone Celular:</label>
                  <input class="form-control" type="tel" name="telefoneCelular" id="telefoneCelular" placeholder="" required minlength="15">
                  <div class="invalid-feedback">
                    Telefone Celular Obrigatorio!
                  </div>
                </div>

                <div class="form-group col-md-6">
                  <label for="wpp">WhatsApp:</label>
                  <input class="form-control" type="tel" name="wpp" id="wpp" placeholder="">
                </div>
              </div>


              <!---------------------------------------------------------------------------------------------------------->
              <hr>
              <span class="d-block p-2 bg-dark text-white">Endereço</span>
              <br />
              <!---------------------------------------------------------------------------------------------------------->
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="cep">CEP</label>
                  <input class="form-control" type="text" name="cep" id="cep" id="cep" placeholder="EX: 00000-000" required minlength="9">
                  <div class="invalid-feedback">
                    CEP Obrigatorio!
                  </div>
                </div>

                <div class="form-group col-md-4">
                  <label for="estado">Estado</label>
                  <input class="form-control" type="text" name="estado" id="estado" placeholder="EX: Distrito Federal" required minlength="4">
                  <div class="invalid-feedback">
                    Estado Obrigatorio!
                  </div>
                </div>

                <div class="form-group col-md-4">
                  <label for="cidade">Cidade</label>
                  <select class="form-control" name="cidade" id="cidade" required>
                    <option selected value="">Selecione o Estado...</option>
                    <option value="AC">AC</option>
                    <option value="AC">AC</option>
                    <option value="AM">AM</option>
                    <option value="AP">AP</option>
                    <option value="BA">BA</option>
                    <option value="CE">CE</option>
                    <option value="DF">DF</option>
                    <option value="ES">ES</option>
                    <option value="GO">GO</option>
                    <option value="MA">MA</option>
                    <option value="MT">MT</option>
                    <option value="MS">MS</option>
                    <option value="MG">MG</option>
                    <option value="PA">PA</option>
                    <option value="PB">PB</option>
                    <option value="PR">PR</option>
                    <option value="PE">PE</option>
                    <option value="PI">PI</option>
                    <option value="RJ">RJ</option>
                    <option value="RN">RN</option>
                    <option value="RO">RO</option>
                    <option value="RS">RS</option>
                    <option value="RR">RR</option>
                    <option value="SC">SC</option>
                    <option value="SE">SE</option>
                    <option value="SP">SP</option>
                    <option value="TO">TO</option>
                  </select>
                  <div class="invalid-feedback">
                    Cidade Obrigatoria!
                  </div>
                </div>
              </div>


              <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="bairro">Bairro</label>
                  <input class="form-control" type="text" name="bairro" id="bairro" placeholder="EX: Asa Norte" required minlength="3">
                  <div class="invalid-feedback">
                    Bairro Obrigatorio!
                  </div>
                </div>

                <div class="form-group col-md-4">
                  <label for="rua_avenida">Rua/Avenida</label>
                  <input class="form-control" type="text" name="rua_avenida" id="rua_avenida" required minlength="2">
                  <div class="invalid-feedback">
                    Rua ou Avenida Obrigatorio!
                  </div>
                </div>

                <div class="form-group col-md-4">
                  <label for="numero">Número</label>
                  <input class="form-control" type="number" name="numero" id="numero" placeholder="Numero casa ou Apt" required minlength="1">
                  <div class="invalid-feedback">
                    Número Obrigatorio!
                  </div>
                </div>
              </div>


              <div class="form-group">
                <label for="adicional">Adicional</label>
                <input class="form-control" type="text" name="adicional" id="adicional" placeholder="Dados adicionais(Opcional)">
              </div>


              <!---------------------------------------------------------------------------------------------------------->
              <hr>
              <span class="d-block p-2 bg-dark text-white">Coloque o site da instituição</span>
              <br>
              <!---------------------------------------------------------------------------------------------------------->
              <div class="form-group">
                <label for="url">URL</label>
                <input class="form-control" type="text" name="url" id="url" placeholder="Coloque o link do site da empresa">
              </div>




              <button type="submit" class="btn btn-dark">Enviar</button>


            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact -->
  <section class="page-section" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Contact Us</h2>
          <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <form id="contactForm" name="sentMessage" novalidate="novalidate">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <input class="form-control" id="name" type="text" placeholder="Your Name *" required="required" data-validation-required-message="Please enter your name.">
                  <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                  <input class="form-control" id="email" type="email" placeholder="Your Email *" required="required" data-validation-required-message="Please enter your email address.">
                  <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                  <input class="form-control" id="phone" type="tel" placeholder="Your Phone *" required="required" data-validation-required-message="Please enter your phone number.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <textarea class="form-control" id="message" placeholder="Your Message *" required="required" data-validation-required-message="Please enter a message."></textarea>
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="col-lg-12 text-center">
                <div id="success"></div>
                <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit">Send Message</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>





  <!-- Footer -->
  <footer class="footer">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-4">
          <span class="copyright">Copyright &copy; Novel Life 2019</span>
        </div>
        <div class="col-md-4">
          <ul class="list-inline social-buttons">
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-twitter"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-facebook-f"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </li>
          </ul>
        </div>
        <div class="col-md-4">
          <ul class="list-inline quicklinks">
            <li class="list-inline-item">
              <a href="#">Privacy Policy</a>
            </li>
            <li class="list-inline-item">
              <a href="#">Terms of Use</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

  <!-- Portfolio Modals -->

  <!-- Modal 1 -->
  <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
          <div class="lr">
            <div class="rl"></div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <div class="modal-body">
                <!-- Project Details Go Here -->
                <h2 class="text-uppercase">Project Name</h2>
                <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                <img class="img-fluid d-block mx-auto" src="img/portfolio/01-full.jpg" alt="">
                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                <ul class="list-inline">
                  <li>Date: January 2017</li>
                  <li>Client: Threads</li>
                  <li>Category: Illustration</li>
                </ul>
                <button class="btn btn-primary" data-dismiss="modal" type="button">
                  <i class="fas fa-times"></i>
                  Close Project</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal 2 -->
  <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
          <div class="lr">
            <div class="rl"></div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <div class="modal-body">
                <!-- Project Details Go Here -->
                <h2 class="text-uppercase">Project Name</h2>
                <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                <img class="img-fluid d-block mx-auto" src="img/portfolio/02-full.jpg" alt="">
                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                <ul class="list-inline">
                  <li>Date: January 2017</li>
                  <li>Client: Explore</li>
                  <li>Category: Graphic Design</li>
                </ul>
                <button class="btn btn-primary" data-dismiss="modal" type="button">
                  <i class="fas fa-times"></i>
                  Close Project</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal 3 -->
  <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
          <div class="lr">
            <div class="rl"></div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <div class="modal-body">
                <!-- Project Details Go Here -->
                <h2 class="text-uppercase">Project Name</h2>
                <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                <img class="img-fluid d-block mx-auto" src="img/portfolio/03-full.jpg" alt="">
                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                <ul class="list-inline">
                  <li>Date: January 2017</li>
                  <li>Client: Finish</li>
                  <li>Category: Identity</li>
                </ul>
                <button class="btn btn-primary" data-dismiss="modal" type="button">
                  <i class="fas fa-times"></i>
                  Close Project</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal 4 -->
  <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
          <div class="lr">
            <div class="rl"></div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <div class="modal-body">
                <!-- Project Details Go Here -->
                <h2 class="text-uppercase">Project Name</h2>
                <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                <img class="img-fluid d-block mx-auto" src="img/portfolio/04-full.jpg" alt="">
                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                <ul class="list-inline">
                  <li>Date: January 2017</li>
                  <li>Client: Lines</li>
                  <li>Category: Branding</li>
                </ul>
                <button class="btn btn-primary" data-dismiss="modal" type="button">
                  <i class="fas fa-times"></i>
                  Close Project</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal 5 -->
  <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
          <div class="lr">
            <div class="rl"></div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <div class="modal-body">
                <!-- Project Details Go Here -->
                <h2 class="text-uppercase">Project Name</h2>
                <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                <img class="img-fluid d-block mx-auto" src="img/portfolio/05-full.jpg" alt="">
                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                <ul class="list-inline">
                  <li>Date: January 2017</li>
                  <li>Client: Southwest</li>
                  <li>Category: Website Design</li>
                </ul>
                <button class="btn btn-primary" data-dismiss="modal" type="button">
                  <i class="fas fa-times"></i>
                  Close Project</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal 6 -->
  <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
          <div class="lr">
            <div class="rl"></div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <div class="modal-body">
                <!-- Project Details Go Here -->
                <h2 class="text-uppercase">Project Name</h2>
                <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                <img class="img-fluid d-block mx-auto" src="img/portfolio/06-full.jpg" alt="">
                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                <ul class="list-inline">
                  <li>Date: January 2017</li>
                  <li>Client: Window</li>
                  <li>Category: Photography</li>
                </ul>
                <button class="btn btn-primary" data-dismiss="modal" type="button">
                  <i class="fas fa-times"></i>
                  Close Project</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Contact form JavaScript -->
  <script src="js/jqBootstrapValidation.js"></script>
  <script src="js/contact_me.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/agency.min.js"></script>

</body>

</html>