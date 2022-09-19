<?php
session_start();
if (empty($_SESSION["id"]))
{
  header("location: login.php");
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <link rel="stylesheet" href="../plugins/css/style.css">

</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">

  
    </div>
    <ul class="nav navbar-nav">
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Menu <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="inicio.php">Inicio</a></li>
          <li><a href="#">Usuarios</a></li>
        </ul>
      </li>
    </ul>
    <form method="POST" >
    <ul class="nav navbar-nav navbar-right">
      <li><a href="../controller/cerrar_sesion.php"><span class="glyphicon glyphicon-log-in"></span> Salir</a></li>
    </ul>
    </form>
  </div>
</nav>
  
<div class="container text-center"> 

        <div style="text-align:center;">
          <img src="../plugins/img/umg.png" id="icon" alt="User Icon" />
        </div>

  <h2>BIENVENIDO:</h2>
  <h2  >
        <?php
        echo $_SESSION["nombres"]." ".$_SESSION["apellidos"];
        ?>
  </h2>

</div>






</body>
</html>

