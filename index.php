<?php
include('session.php');
$title = "FITJOURNEY";
include "header.php";
include('conex.php');
?>
<?php
$email = $_SESSION['user_email'];
if(isset($email)){
  $plan = $_GET['plan'];
  echo $plan;
  if($plan == "medium"){
    $basic = "medium";
    $sqli = "UPDATE usuarios SET planes = '$basic' WHERE correo = '$email' ";
    $sqli_check = pg_query($conexion, $sqli);
  } elseif($plan == "premium"){
    $basic = "premium";
    $sqli = "UPDATE usuarios SET planes = '$basic' WHERE correo = '$email' ";
    $sqli_check = pg_query($conexion, $sqli);
  }
}
?>
<!-- NAVBAR -->
<header class="fixed-top">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">
        <!-- Agregar imagen del encabezado -->
        <img src="images/WL.png" width="50" height="50" class="rounded d-inline-block align-middle" alt="Logo">
        FITJOURNEY
        </a>
      <!-- BOTON NAVBAR RESPONSIVE -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>

      <!-- LISTA NAVBAR -->
      <div class="collapse navbar-collapse justify-content-beetwen" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link current" aria-current="page" href="index.php">Inicio</a></li>
          <li class="nav-item"><a class="nav-link" href="calculator.php">Calculadora</a></li>
          <li class="nav-item">
            <a class="nav-link" href="<?php 
            if(isset($_SESSION['user_name'])) {
              echo "alimentacion.php";
            } else {
              echo "login.php?link=alimentacion.php";
            }
          ?>
          ">Alimentación</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php 
            if(isset($_SESSION['user_name'])) {
              echo "entrenamientos.php";
            } else {
              echo "login.php?link=entrenamientos.php";
            }
          ?>
          ">Entrenamientos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php 
            if(isset($_SESSION['user_name'])) {
              echo "consejos.php";
            } else {
              echo "login.php?link=consejos.php";
            }
          ?>
          ">Consejos</a>
          </li>
          
          <!--<li class="container-fluid d-flex justify-content-end nav-item float-right"><a class="nav-link" href="#"><i class="bi bi-person-circle"></i></a></li>-->
        </ul>
        <div class="container-fluid d-flex justify-content-end">
          <?php
            if(isset($_SESSION['user_name'])) {
              echo "
                  <a href='logout.php' class='p-0  d-flex align-items-center me-2 text-decoration-none fs-2 text-white fw-normal m-0 exit'>
                    <i class='bi bi-box-arrow-left'></i>
                  </a>
              ";
            } else {
              echo "";
            }

          ?>
          <a class="d-flex align-items-center ms-2 text-decoration-none fs-2 text-white fw-normal m-0 login" href="
          <?php 
            if(isset($_SESSION['user_name'])) {
              echo "perfilusuario.php";
            } else {
              echo "login.php";
            }
          ?>
          ">
            <!-- funcion para poder ver el nombre de usuario -->
            <span class="fs-5 me-2">
              <?php
                if(empty($_SESSION['user_name'])) {
                  echo "";
                } else {
                  echo "Bienvenid@,";
                }
              ?>
              <span class="fw-light">
                <?php 
                if(isset($_SESSION['user_name'])) {
                    echo $_SESSION['user_name'];
                } else {
                    echo "Iniciar sesión";
                }
                ?>
              </span>                
            </span>

            <i class="bi bi-person-circle"></i>
          </a>
        </div>
      </div>
    </div>
  </nav>
</header>
<!-- MAIN -->
<main class="container-fluid p-0 mt-5">
  <!-- IMAGEN INICIAL "PROMO" -->
  <div class="container-fluid text-light m-0 row align-items-center text-left contenedor-portada" style="height:50vh">
    <div class="container-fluid">
      <p class="fw-light fs-4 ms-3 mt-2 mb-0">A tu alcance</p>
      <p class="fs-1 fw-bolder fst-italic">FitJourney</p>
      <p class="fw-normal ms-3 text-justify">Estas listo para comenzar? <br> Si quieres comenzar en el Fitness pero no sabes como, nosotros somos tu solución.</p>
      <?php 
      if(isset($_SESSION['user_name'])) {
        echo "
        <a href='alimentacion.php' class='mb-1 btn btn-outline-warning fw-bold fst-italic' style='border-radius:25px;width:200px'>Aliméntate</a>
        <a href='entrenamientos.php' class='mb-1 btn btn-outline-info fw-bold fst-italic' style='border-radius:25px;width:200px'>Ejercítate</a>
        <a href='consejos.php' class='mb-1 btn btn-outline-danger fw-bold fst-italic' style='border-radius:25px;width:200px'>Aconséjate</a>
        ";
      } else {
        echo "<a href='login.php' class='mb-1 btn btn-outline-warning fw-bold fst-italic' style='border-radius:25px;width:200px'>Comienza Ya</a>";
      }
      ?>
      <p></p>
    </div>
  </div>

  <!-- SECCIÓN 1-->
  <div class="container-fluid p-5">
    <div class="row">
      <div class="col-md-6">
        <p class="fs-1 fw-bold">¡Tu sueño de ponerte fuerte más cerca que nunca antes con nosotros!</p>
        <hr>
        <p class="fs-4 text-justify">Ha llegado la hora, con el equipo de <span class="fst-italic fw-bold">FitJourney</span> lograrás tu meta, sea cuál sea, un cuerpo definido y musculoso a tu alcance, confía en nuestros métodos probados con distintos tipos de cuerpos, distintas personas, distintos planes de entrenamiento y todos ellos con el resultado deseado.</p>
      </div>
      <div class="col-md-6 p-2">
        <img class="rounded img-fluid" src="images/persona-levanta-peso.jpg" alt="Persona levantando peso">
      </div>
    </div>
  </div>

  <!-- MIDSECCIÓN -->

  <div class="container-fluid p-0 py-5 bg-warning">
    <div class="container-fluid row px-5 m-0">
      <div class="col-md-6">
        <h3 class="fs-1 fw-bolder text-uppercase fst-italic">¿Listo para unirte al fitness?</h3>
        <p class="fs-4 fw-lighter text-uppercase">Préparate para una aventura, donde encontrarás tu mejor versión de ti mismo.</p>
      </div>
      <div class="col-md-6 text-center d-flex justify-content-center align-items-center">
        <div class="img-fluid">
          <img src="images/barbell.svg" alt="imagen de unas pesas" width="100px">          
        </div>

        <!--<i class="fs-1 bi bi-activity"></i>-->
      </div>
    </div>
  </div>
  
  <!-- SECCIÓN 2 -->
  <div class="container-fluid p-5 bg-primary text-white">
    <div class="row">

      <div class="col-md-6">
        <img class="rounded img-fluid" src="images/comida-saludable.jpg" alt="Comida saludable">
      </div>

      <div class="col-md-6 p-2">
        <p class="fs-1 fw-bold">¡Quieres bajar de peso, nosotros te ayudamos!</p>
        <hr>
        <p class="fs-4">Con nuestra selección de dietas y platillos te ayudaremos a alcanzar tu meta o tu peso ideal, además todo estara vinculado a tu progreso por lo cual intentaremos recomendarte los platillos que cumplan con tus macros diarias.</p>
      </div>
    </div>
  </div>

  <!-- SECCIÓN3 ¿Quieres descubrir tu tipo de cuerpo? -->
  <div class="container-fluid text-light m-0 row align-items-center text-center background-descubre" style="height: 60vh">
    <div class="container-fluid">
      <p class="fw-light fs-4 ms-3 mt-2 mb-0">¿Quieres conocer tu índice de masa corporal y las calorías que has de comer?</p>
      <p class="fs-1 fw-bolder fst-italic">¡Utiliza nuestras calculadoras a tu servicio!</p>
      <p class="fw-normal ms-3 text-justify">¿A qué esperas? ¡Haz clic en el botón! </p>
      <a href="calculator.php" class="btn btn-outline-warning fw-bold fst-italic" style="border-radius:25px;width:230px">¡Entra a las Calculadoras!</a>
      <p></p>
    </div>
  </div>




</main>


<?php 
include "footer.php";
?>
