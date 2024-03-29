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

  <link href="../Bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="../_CSS/agency.min.css" rel="stylesheet">

</head>

<body id="page-top">

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

              <button type="submit" id="submit" value="login" class="btn btn-dark text-warning">Login</button>
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
              </li>
              <li>
                <div class="dropdown nav-item">
                  <button class="btn btn-outline-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <h8> Cadastro </h8>
                  </button>
                  <div class="dropdown-menu dropdown-menuIndex " style="color: red;" aria-labelledby="dropdownMenuButton">
                    <a class="nav-link active js-scroll-trigger btn-dark" href="../DataRegister/registerPeople.php" role="button" aria-pressed="true">Usuario</a>
                    <a class="nav-link active js-scroll-trigger btn-dark" href="../DataRegister/registerInstitution.php">Instituição</a>

                  </div>
                </div>
              </li>

          </div>

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
          <p class="text-muted">Aqui ajudamos você a encontrar um lugar para que possa se recuperar e ter uma vida nova.</p>
        </div>
        <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
          </span>
          <h4 class="service-heading">Divulgação da sua empresa</h4>
          <p class="text-muted">Empresa criada com o intuito de ajudar as pessoas que estão passando por momentos complicados relacionados a vicios e depressão.</p>
        </div>
        <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fas fa-user-md fa-stack-1x fa-inverse"></i>
          </span>
          <h4 class="service-heading">Auxílio Psicológico</h4>
          <p class="text-muted">O site dispõe de um chat localizado no canto inferior direito, que vai levar o usuario a um chat com o psicologo. Essa ferramenta deve usada em momentos de crise do paciente.</p>
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
                    <?php echo $linha["numero"] ?>, <?php echo $linha["estado"] ?> - <?php echo $linha["UF"] ?>, <?php echo $linha["cep"] ?></small>
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
          <h3 class="section-subheading text-muted">Origem da ideia</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <ul class="timeline">
            <li>
              <div class="timeline-image">
                <img class="rounded-circle img-fluid" src="../Images/about/1.jpg" alt="">
              </div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                  <h4>2018</h4>
                  <h4 class="subheading">Causa social sempre foi desejada</h4>
                </div>
                <div class="timeline-body">
                  <p class="text-muted">A ideia teve iniciativa após ser observado o aumento de pessoas em situação de rua em consequência ao vicio em drogas, após essa observação tivemos a ideia de criar um sistema que pudesse ajudar essas pessoas.</p>
                </div>
              </div>
            </li>
            <li class="timeline-inverted">
              <div class="timeline-image">
                <img class="rounded-circle img-fluid" src="../Images/about/2.jpg" alt="">
              </div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                  <h4>Março 2019</h4>
                  <h4 class="subheading">Desenvolvendo a ideia</h4>
                </div>
                <div class="timeline-body">
                  <p class="text-muted">A ideia inicial do sistema era ajudar pessoas com vicios, mas vimos em jornais que a taxa de suicídio relacionado a depressão aumentava cada vez mais, então pensamos, por que não ajudar essas pessoas também?</p>
                </div>
              </div>
            </li>
            <li>
              <div class="timeline-image">
                <img class="rounded-circle img-fluid" src="../Images/about/3.jpg" alt="">
              </div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                  <h4>Julho 2019</h4>
                  <h4 class="subheading">Colocando a ideia em prática</h4>
                </div>
                <div class="timeline-body">
                  <p class="text-muted">Estávamos finalizando nosso curso e tinhamos que fazer o trabalho de conclusão, e foi nesse momento que o site saiu do papel e começou a tomar novas formas.</p>
                </div>
              </div>
            </li>
            <li class="timeline-inverted">
              <div class="timeline-image">
                <img class="rounded-circle img-fluid" src="../Images/about/4.jpg" alt="">
              </div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                  <h4>Novembro 2019</h4>
                  <h4 class="subheading">Conclusão do Site</h4>
                </div>
                <div class="timeline-body">
                  <p class="text-muted">Enfim o site foi finalizado com diversas melhorias em relação a ideia inicial. Hoje contamos com um psicólogo que está sempre disponivel para ajudar quem está precisando em um momento de crise, temos cadastro e acompanhamento de protuário do usuário, dentre outras funcionalidades.</p>
                </div>
              </div>
            </li>
            <li class="timeline-inverted">
              <div class="timeline-image">
                <h4>Faça Parte
                  <br>Da Nossa
                  <br>História!</h4>
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
          <h3 class="section-subheading text-muted">Desenvolvedores do Sistema</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4">
          <div class="team-member">
            <img class="mx-auto rounded-circle" src="../Images/team/4.jpeg" alt="">
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
            <img class="mx-auto rounded-circle" src="../Images/team/6.jpeg" alt="">
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
            <img class="mx-auto rounded-circle" src="../Images/team/5.jpeg" alt="">
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
          <p class="large text-muted">Encare os desafios com seriedade e ultrapasse-os com força de vontade e capacidade de superação.</p>
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
            <img class="img-fluid d-block mx-auto" src="../Images/logos/envato.jpg" alt="">
          </a>
        </div>
        <div class="col-md-3 col-sm-6">
          <a href="#">
            <img class="img-fluid d-block mx-auto" src="../Images/logos/designmodo.jpg" alt="">
          </a>
        </div>
        <div class="col-md-3 col-sm-6">
          <a href="#">
            <img class="img-fluid d-block mx-auto" src="../Images/logos/themeforest.jpg" alt="">
          </a>
        </div>
        <div class="col-md-3 col-sm-6">
          <a href="#">
            <img class="img-fluid d-block mx-auto" src="../Images/logos/creative-market.jpg" alt="">
          </a>
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
          <h3 class="section-subheading text-muted">Suporte do Site.</h3>
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
                <img class="img-fluid d-block mx-auto" src="../Images/portfolio/01-full.jpg" alt="">
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
                <img class="img-fluid d-block mx-auto" src="../Images/portfolio/02-full.jpg" alt="">
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
                <img class="img-fluid d-block mx-auto" src="../Images/portfolio/03-full.jpg" alt="">
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
                <img class="img-fluid d-block mx-auto" src="../Images/portfolio/04-full.jpg" alt="">
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
                <img class="img-fluid d-block mx-auto" src="../Images/portfolio/05-full.jpg" alt="">
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
                <img class="img-fluid d-block mx-auto" src="../Images/portfolio/06-full.jpg" alt="">
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

  <!----------------------------------------------------------------------------------------->
  <!-- Bootstrap core JavaScript -->
  <script src="../Scripts/vendor/jquery/jquery.min.js"></script>
  <script src="../Scripts/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="../Scripts/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Contact form JavaScript -->
  <script src="../Scripts/js/jqBootstrapValidation.js"></script>
  <script src="../Scripts/js/contact_me.js"></script>

  <!-- Custom scripts for this template -->
  <script src="../Scripts/js/agency.min.js"></script>

</body>

</html>