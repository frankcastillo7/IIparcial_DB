<?php  

 function registrar(){
    include('../conexion/conexion.php');
    if(!empty($_POST["registro"])){
    if(empty($_POST["nombres"]) or empty($_POST["apellidos"]) or empty($_POST["correo"]) or empty($_POST["usuario"]) or empty($_POST["contraseña"])){
        echo '<script>
        Swal.fire({
         icon: "error",
         title: "¡Existen campos vacios!",
         text: "Debe de llenar todos los campos",
         showConfirmButton: true,
         confirmButtonText: "Cerrar"
         });
        </script>';
    }
    else{
        $nombres=$_POST["nombres"];
        $apellidos=$_POST["apellidos"];
        $correo=$_POST["correo"];
        $usuario=$_POST["usuario"];
        $clave=$_POST["contraseña"];
        $sql=$conexion->query("insert into tb_usuarios(nombres, apellidos, correo, usuario, contraseña, token)values('$nombres','$apellidos','$correo','$usuario','$clave','0')");

        if( $sql==0){


            echo '<script>
        Swal.fire({
        icon: "error",
        title: "¡El usuario no se pudo registrar!",
        showConfirmButton: false,
        timer: 2500,
        }).then(function (result) {
        if (true) {
        window.location = "login.php";
        }
        });
        </script>';
        }
        else{

            echo '<script>
        Swal.fire({
        icon: "success",
        title: "¡Usuario creado correctamente!",
        text: "Ya puede iniciar sesión",
        showConfirmButton: false,
        timer: 2500,
        }).then(function (result) {
        if (true) {
        window.location = "login.php";
        }
        });
        </script>';

        }

    }
} 
}



function login(){
    include('../conexion/conexion.php');
    session_start();
    if(!empty($_POST["btn_ingresar"]))
{
    if(!empty($_POST["usuario"]) or !empty($_POST["pass"]))
    {
        $usuario=$_POST["usuario"];
        $clave=$_POST["pass"];
        $sql=$conexion->query("select * from tb_usuarios where usuario='$usuario' and contraseña='$clave'");
        if($datos=$sql->fetch_object())
        {
        $_SESSION["id"]=$datos->id;
        $_SESSION["nombres"]=$datos->nombres;
        $_SESSION["apellidos"]=$datos->apellidos;
        $_SESSION["usuario"]=$datos->usuario;

        echo '<script>
        Swal.fire({
        icon: "success",
        title: "Verificación Correcta",
        text: "Iniciando Sesión",
        showConfirmButton: false,
        timer: 1000,
        }).then(function (result) {
        if (true) {
        window.location = "inicio.php";
        }
        });
        </script>';
        }
        else
        {
            echo '<script>
        Swal.fire({
         icon: "error",
         title: "¡Credenciales Invalidas!",
         text: "Ingrese sus credenciales de manera correcta",
         showConfirmButton: true,
         confirmButtonText: "Cerrar"
         }).then(function(result){
            if(result.value){                   
             window.location = "../views/login.php";
            }
         });
        </script>';
        }
    }
    else
    {
        echo '<script>
        Swal.fire({
         icon: "error",
         title: "¡Existen campos vacios!",
         text: "Ingrese correctamente el usuario y contraseña",
         showConfirmButton: true,
         confirmButtonText: "Cerrar"
         }).then(function(result){
            if(result.value){                   
             window.location = "../views/login.php";
            }
         });
        </script>';
        }
    }  
}



function restablecer()
{
    include('../conexion/conexion.php');
    if(isset($_POST["recover"])){
        $email = $_POST["email"];

        $sql = mysqli_query($conexion, "SELECT * FROM tb_usuarios WHERE correo='$email'");
        $query = mysqli_num_rows($sql);
  	    $fetch = mysqli_fetch_assoc($sql);


          if(empty($_POST["email"])){
        echo '<script>
        Swal.fire({
         icon: "error",
         title: "¡Ingrese el correo!",
         text: "Debe de llenar el campo",
         showConfirmButton: true,
         confirmButtonText: "Cerrar"
         });
        </script>';
    }
        else {

            if(mysqli_num_rows($sql) <= 0){
          

                echo '<script>
        Swal.fire({
         icon: "error",
         title: "¡No se encontro el correo!",
         text: "Verifique que este bien escrito",
         showConfirmButton: true,
         confirmButtonText: "Cerrar"
         });
        </script>';

    
        }else{
            // generate token by binaryhexa 
            $token = bin2hex(random_bytes(50));

            require "../mail/phpmailer/PHPMailerAutoload.php";
            $mail = new PHPMailer;

            $mail->isSMTP();
            $mail->Host='smtp.gmail.com';
            $mail->Port=587;
            $mail->SMTPAuth=true;
            $mail->SMTPSecure='tls';

            // h-hotel account
            $mail->Username='fkv19987@gmail.com';
            $mail->Password='rcnfxfeqquvlpvzd';

            // send by h-hotel email
            $mail->setFrom('fkv19987@gmail.com', 'Password Reset');
            // get email from input
            $mail->addAddress($_POST["email"]);
            //$mail->addReplyTo('lamkaizhe16@gmail.com');

            // HTML body
            $mail->isHTML(true);
            $mail->Subject="Restablecer Credenciales";
            $mail->Body="<b>ESTIMADO USUARIO</b>
            <h3>Para poder restrablecer sus credenciales siga las siguientes instrucciones.</h3>
            <p>Copie el siguiente token de veificacián y peguelo en el campo que se solicita.</p>
            <b>TOKEN:</b>
            <p>$token</p>
            <br><br>
            <b>No comparta el token con ninguna persona.</b>";


            if(!$mail->send()){
                ?>
                    <script>
                        alert("<?php echo " Invalid Email "?>");
                    </script>
                <?php
            }else{
                $sqlT = mysqli_query($conexion, "UPDATE tb_usuarios SET token='$token' WHERE correo='$email'");
                if($sqlT==1){

        echo '<script>
        Swal.fire({
        icon: "success",
        title: "Se envio un token a su correo",
        text: "Verificar su correo",
        showConfirmButton: false,
        timer: 2400,
        }).then(function (result) {
        if (true) {
        window.location = "verificar.php";
        }
        });
        </script>';

                }
                else{
                    echo 'Error al guardar el token';

                }
            }
        }
    }



            }



        

}



function resetear()
{
    include('../conexion/conexion.php');
    if(isset($_POST["reset"])){
        $nuevapsw = $_POST["password"];
        $token = $_SESSION['token'];

        $sql = mysqli_query($conexion, "SELECT * FROM tb_usuarios WHERE correo='$token'");
        $query = mysqli_num_rows($sql);
  	    $fetch = mysqli_fetch_assoc($sql);

        if($token){
            mysqli_query($conexion, "UPDATE tb_usuarios SET contraseña='$nuevapsw' WHERE token='$token'");
            mysqli_query($conexion, "UPDATE tb_usuarios SET token='0' WHERE contraseña='$nuevapsw'");




            echo '<script>
        Swal.fire({
        icon: "success",
        title: "Se cambio la contraseña correctamente",
        text: "Inicie Sesión",
        showConfirmButton: false,
        timer: 3000,
        }).then(function (result) {
        if (true) {
        window.location = "inicio.php";
        }
        });
        </script>';


        }else{


            echo '<script>
        Swal.fire({
         icon: "error",
         title: "¡No se puede cambiar la contraseña!",
         text: "Ingrese la contraseña",
         showConfirmButton: true,
         confirmButtonText: "Cerrar"
         });
        </script>';
            }
    }

}



function verificar()
{
    include('../conexion/conexion.php');
    if(isset($_POST["verificar"])){
        $token = $_POST["tokenv"];
        $_SESSION['token'] = $_POST["tokenv"];
        $sqlTo = mysqli_query($conexion, "SELECT * FROM tb_usuarios WHERE token='$token'");
      if(mysqli_num_rows($sqlTo) <= 0){   
        echo '<script>
        Swal.fire({
         icon: "error",
         title: "¡Verificación Incorrecta!",
         text: "Ingrese correctamente el token",
         showConfirmButton: true,
         timer: 2400
         });
        </script>';
            }
            else{
        echo '<script>
            Swal.fire({
            icon: "success",
            title: "Verificacion Correcta",
            showConfirmButton: false,
            timer: 2400,
            }).then(function (result) {
            if (true) {
            window.location = "reset.php";
            }
            });
            </script>';




            }
    }

}

?>



