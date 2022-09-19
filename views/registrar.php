
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="../plugins/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <title>Document</title>
</head>
<body>
    

    <div class="wrapper fadeInDown">
      <div id="formContent">
        <!-- Tabs Titles -->
    
        <!-- Icon -->
        <div class="fadeIn first">
          <img src="../plugins/img/user-add.png" id="icon" alt="User Icon" />
        </div>
    
        <!-- Login Form -->
        <form method="POST"  >

        <?php
        include('../controller/consultas.php');
        registrar();
       ?>
    
          <input type="text" id="nombres" class="fadeIn second" autocomplete="text" name="nombres" placeholder="Nombres">
          <input type="text" id="apellidos" class="fadeIn second" autocomplete="off" name="apellidos" placeholder="Apellidos">
          <input type="text" id="correo" class="fadeIn second" autocomplete="text" name="correo" placeholder="Correo Electronico">
          <input type="text" id="usuario" class="fadeIn second" autocomplete="off" name="usuario" placeholder="Nombre de Usuario">
          <input type="text" id="contraseña" class="fadeIn third" autocomplete="off" name="contraseña" placeholder="Contraseña">
          
                <input type="submit" class="fadeIn fourth" name="registro" value="Crear Cuenta">
        </form>
    
        <!-- Remind Passowrd -->
        <div id="formFooter">
            <a class="underlineHover" href="../views/login.php"><i class="fas fa-arrow-alt-circle-left"></i> Regresar</a>
            <br>
          
        </div>
    
      </div>
    </div>
</body>
</html>