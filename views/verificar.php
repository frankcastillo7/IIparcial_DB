<?php
session_start();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="stylesheet" href="../plugins/css/style.css">
    <title>Document</title>
</head>
<body>
    

    <div class="wrapper fadeInDown">
      <div id="formContent">
        <!-- Tabs Titles -->
    
        <!-- Icon -->
        <div class="fadeIn first">
          <img src="../plugins/img/verificado.png" id="icon" alt="User Icon" />
        </div>
    
        <!-- Login Form -->
        <form  method="POST" name="recover_psw">

          <input type="text" id="tokenv" class="fadeIn second" autocomplete="text" name="tokenv" placeholder="Ingrese el token ">
            <input type="submit" class="fadeIn fourth" name="verificar" value="Verificar">
        </form>
      </div>
    </div>
</body>
</html>

<?php
include('../controller/consultas.php');
verificar();
?>


