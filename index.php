<?php
require "./logica/mail.php";
function validar($nombre,$correo,$asunto,$mensaje,$form){
    return !empty($nombre) && !empty($correo) && !empty($asunto) && !empty($mensaje);
}
$estatus = "";
if(isset($_POST['form'])){
    if(validar($_POST['nombre'],$_POST['correo'], $_POST['asunto'], $_POST['mensaje'],"")){
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $asunto = $_POST['asunto'];
        $mensaje = $_POST['mensaje'];
        
        $body = "$nombre <$correo> te envia el siguiente mensaje:<br><br> $mensaje";
        //mandar Correo
        sendMail($asunto,$body,$correo,$nombre,true);
        $estatus = "success";
    }else{
        $estatus = "danger";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="./css/estilos.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@100;300;500&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/cbc1fa9a75.js" crossorigin="anonymous"></script>
    <title>Formulario Contacto</title>
</head>
<body>
    <main>
        <section class="content-header">
            <h1>Contactanos</h1>
        </section>

        <div class="main-title">
            <p>Registra tus Datos</p>
        </div>
        
        
       <form action="./" method="post">
           <div class="main-form">
                <input type="nombre" name="nombre" id="nombre" placeholder="Nombre Completo">
                <span><img src="./img/user-solid.svg" alt=""></span>
           </div>

           <div class="main-form">
                <input type="email" name="correo" id="correo" placeholder="Correo Electronico">
                <span><img src="./img/envelope-solid.svg" alt=""></span>
           </div>
            
           <div class="main-form">
                <input type="text" name="asunto" id="asunto" placeholder="Asunto">
                <span><img src="./img/message-solid.svg" alt=""></span>
           </div>
            
           <div class="main-form-text">
                <textarea name="mensaje" class="textarea" rows="7" placeholder="Escribe aqui tu mensaje"></textarea>
           </div>
           <div class="main-form-subm">
                <div>
                <?php if($estatus == "success"):?>
                    <p class="success">Llena todos los campos</p>
                <?php endif; ?>
                <?php if($estatus == "danger"):?>
                    <p class="danger">Llena todos los campos</p>
                <?php endif; ?>
                </div>
               
                
                <input type="submit" value="Enviar" name="form">
                
           </div>
       </form> 
    </main>
</body>
</html>