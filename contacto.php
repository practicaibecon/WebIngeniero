<!DOCTYPE html>
<!-- cambio idioma español:es -->
<html lang="ca">

<head>
    <script type="text/javascript">
        window.onload = function () {

            var ln = x = window.navigator.language || navigator.browserLanguage;
            //  alert (ln);

            if (ln == 'ca-CAx') {
                window.location.href = 'contacto.html'; //si esta en inglés va a ingles

            }
        }
    </script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- SEO -->
    <!-- HTML Meta Tags -->
    <title>Contacte</title>
    <meta name="description" content="Ingeniero en Mallorca">
    <!--  la descripcion de arriba se puede repetir en otros SEO  -->

    <!-- Google / Search Engine Tags -->
    <meta itemprop="name" content="Contacte">
    <meta itemprop="description" content="Ingeniero en Mallorca">
    <meta itemprop="image" content="http://www.contacto.es">
    <!-- las imagenes no son obligatorias, pero se recomienda poner una foto que representa el negocio -->

    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="http://www.contacto.es">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Contacte">
    <meta property="og:description" content="Ingeniero en Mallorca">
    <meta property="og:image" content="http://www.contacto.es">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Contacte">
    <meta name="twitter:description" content="Ingeniero en Mallorca">
    <meta name="twitter:image" content="http://www.contacto.es">

    <!-- Enlace a biblioteca a iconos tipograficos : https://fontawesome.com/ , donde hay iconos y tipografias -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
          crossorigin="anonymous">

    <!-- nuestros estilos de CSS -->
    <link rel="stylesheet" href="css/estilos.css">

</head>

<body>
<header class="menu">

    <nav class="menu__encabezado">

        <a href="index.html" class="menu__encabezado__logo">

            <img src='icons/LlorençBisquerra.svg' alt="LlorençBisquerra">
            <span>
                    Llorenç Bisquerra
                </span>

        </a>

        <!-- Menú movil -->

        <input id=activar type='checkbox'>
        <label class='menu__encabezado__inputlabel' for='activar'>
            <i class='menu__icono fas fa-bars'></i>
        </label>
        <div class='menu__encabezado__desplegable'>

            <a class='menu__encabezado__desplegable__a' href='sobremi.html'>
                Sobre mí
            </a>
            <a class='menu__encabezado__desplegable__a' href='servicios.html'>
                Serveis
            </a>
            <a class='menu__encabezado__desplegable__a' href='contacto.html'>
                Contacte
            </a>
            <div class='menu__encabezado__desplegable__banderas'>
                <a class='menu__encabezado__desplegable__banderas__a'>
                    <img src="icons/cat.svg" alt="cat">
                </a>
                <a class='menu__encabezado__desplegable__banderas__a' href='contacto_es.html'>
                    <img src="icons/esp.svg" alt="esp">
                </a>

            </div>
        </div>
    </nav>

</header>
<section>
    <!-- respuesta del servidor -->
    <?php

    include "PHPMailer/PHPMailer.php";
    include "PHPMailer/SMTP.php";

    use PHPMailer\PHPMailer\PHPMailer;


    //Capturo los valores pasados por parametros
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $condicion = $_POST['condicion'];
    $consulta = $_POST['consulta'];
    $comments=$_POST['comments'];

    $email_user = "*****";
    $email_password = "*****";
    $the_subject = "Envio de email desde la pagina de contacto";
    $address_to ="*****";
    $from_name = "Llorenç";
    $phpmailer = new PHPMailer();

    // ---------- datos de la cuenta de Gmail -------------------------------
    $phpmailer->Username = $email_user;
    $phpmailer->Password = $email_password;
    //-----------------------------------------------------------------------
    // Habilitar para debug
    //$phpmailer->SMTPDebug = 1;

    $phpmailer->SMTPSecure = 'ssl';
    $phpmailer->Host = "smtp.gmail.com"; // GMail
    $phpmailer->Port = 465;
    $phpmailer->IsSMTP(); // use SMTP
    $phpmailer->SMTPAuth = true;
    $phpmailer->setFrom($phpmailer->Username , $from_name);
    $phpmailer->AddAddress($address_to);
    $phpmailer->Subject = $the_subject;
    $phpmailer->Body .="<h1 style='color:#3498db;'>Han intentado contactar contigo via web</h1>";
    $phpmailer->Body .= "<p>Nombre :" . $nombre ."</p>";
    $phpmailer->Body .= "<p>Email :" . $email ."</p>";
    $phpmailer->Body .= "<p>Tel&eacute;fono :" . $telefono ."</p>";
    $phpmailer->Body .= "<p>Condici&oacute;n :" . $condicion ."</p>";
    $phpmailer->Body .= "<p>Tipo de consulta :" . $consulta ."</p>";
    $phpmailer->Body .= "<p>Comentarios : <br>" . $comments ."</p>";
    $phpmailer->Body .= "<p>Fecha y Hora : " . date("d-m-Y h:i:s") . "</p>";

    $phpmailer->IsHTML(true);

    ?>
    <div class="contactform" style="height: 500px;">
            <div class="contactform__h2form">
    <?php
    // Si va bien o mal
    if ( ! $phpmailer->Send() )
    {
        $error = "Mailer Error: " . $mail->ErrorInfo;
        echo '<p id="para">' . $error . '</p>';
    }
    else
        {
            echo 'Tu mensaje ha sido enviado .</div>';
            echo '<div class="contactform__nombre">';
            echo  'En breve nos pondremos en contacto contigo.';
            echo '<br>';
            echo 'Gracias.';
            echo "</div>";
        }


    /*
    foreach ($_POST as $key => $value)
    {
        echo "Field ".htmlspecialchars($key)." is ".htmlspecialchars($value)."<br>";
    }
    */
    ?>
    <!-- fin de respuesta del servidor -->
            </div>

    </div>
    <!--
            Bloque Footer
        -->
    <footer class="pie">
        <a href="index.html" class="pie__logo">
            <img src='icons/LlorençBisquerra.svg' alt="LlorençBisquerra">
            <span>
                    Llorenç Bisquerra
                </span>

        </a>
        <div class="pie__menu">
            <a class='pie__menu__a' href='sobremi.html'>
                Qui sóc
            </a>
            <a class='pie__menu__a' href='servicios.html'>
                Serveis
            </a>
            <a class='pie__menu__a' href='contacto.html'>
                Contacte
            </a>
            <div class='pie__menu__banderas' href="#">
                <a class='pie__menu__banderas__a' href='#'>
                    <img src="icons/cat.svg" alt="cat">
                </a>
                <a class='pie__menu__banderas__a' href='#'>
                    <img src="icons/esp.svg" alt="esp">
                </a>

            </div>
        </div>


        <div class="pie__social">
            <!-- <div class="pie__social__icons"> -->
            <div class="pie__social__icons1">
                <a class="twitter" href="https://twitter.com/LlorenBisquerr1"> <i class="fab fa-twitter-square"></i></a>
                <a class="facebook" href=""><i class="fab fa-facebook-square"></i></a>

            </div>
            <div class="pie__social__icons2">
                <a class="linkedin" href="https://es.linkedin.com/in/lloren%C3%A7-bisquerra-cantallops-372983174"><i class="fab fa-linkedin"></i></a>
                <a class="instagram" href="https://www.instagram.com/llorencbisquerracantallops/?hl=es"> <i class="fab fa-instagram"></i></a>
            </div>
            <!-- </div> -->
        </div>

        <div class="pie__terms">
            <a href=""><h4>Terms</h4></a>
            <a href=""><h4>Cookies</h4></a>
            <a href=""><h4>Privacitat</h4></a>

        </div>
        </div>
        <div class="pie__contacto">
                <span> <i class="fas fa-envelope"></i>
                    ll.bisquerracantallops@gmail.com</span>
            <span> <i class="fab fa-whatsapp"></i> Telèfon</span>
        </div>
        <h4 class="pie__copy">Copyright 2018</h4>
    </footer>
</section>
</body>
</html>
