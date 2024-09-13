<!-- [
    author: drypzz and functions;
    type: .html and .php;
] -->

<!DOCTYPE html>
<html lang='pt-br'>
    <head>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0'>

        <title>Início - Sr. & Sra. Bem Estar</title>

        <link rel='stylesheet' href='../styled/global.css'>

        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css'>

        <link rel='shortcut icon' href='../gfx/primary/logo.png' type='image/x-icon'>

        <?php
            session_start();

            if((isset($_SESSION['logged']))){
                header('location: admin.php');
            }else{
                header('location: ../../index.php');
            };
        ?>
        
    </head>
    <body class='transition'>

        <!-- loader -->
        <div class='loader-container'>
            <div class='loader'></div>
        </div>

    </body>
</html>