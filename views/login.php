
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
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
          <img src="../plugins/img/user.png" id="icon" alt="User Icon" />
        </div>
    
        <!-- Login Form -->
        <form method="POST" >
        <?php
        include('../controller/consultas.php');
       login();
       ?>
          <input type="text" id="usuario" class="fadeIn second" autocomplete="off" name="usuario" placeholder="Usuario">
          <input type="text" id="pass" class="fadeIn third" autocomplete="off" name="pass" placeholder="Contraseña">
          <div>
            <a class="underlineHover" href="../views/restablecer.php">¿Olvidaste la contraseña?</a>
          </div>
          <br>
                <input type="submit" class="fadeIn fourth" name="btn_ingresar" value="Iniciar Sesión">
        </form>
    
        <!-- Remind Passowrd -->
        <div id="formFooter">
            <a class="underlineHover" href="../views/registrar.php">Registrarse</a>
            <br>
          
        </div>
    
      </div>
    </div>
</body>
</html>