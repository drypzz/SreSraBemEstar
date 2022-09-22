<!DOCTYPE html>
<html lang='pt-br'>
    <head>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0'>

        <title>Início - Sr. & Sra. Bem Estar</title>

        <link rel='stylesheet' href='../styled/global.css'>

        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css'>

        <link rel='shortcut icon' href='../gfx/logo.png' type='image/x-icon'>
    </head>
    <body>
        <!-- loader -->
        <div class='loader-container'>
            <div class='loader'></div>
        </div>

        <!-- navbar -->
        <nav class='navbar'>
            <div class='navbar-container'>
                <div class='navbar-logo'>
                    <a href='#'>
                        <img class='unselectable' draggable='false' (dragstart)='false;' src='../gfx/logo.png' alt=''>
                    </a>
                </div>
                <div class='navbar-toggle' id='mobile-menu'>
                    <span class='bar'></span>
                    <span class='bar'></span>
                    <span class='bar'></span>
                </div>
                <ul class='navbar-menu'>
                    <li class='navbar-item'>
                        <a href='#' class='navbar-links active'>Pagina Inicial</a>
                    </li>
                    <li class='navbar-item'>
                        <a href='register' class='navbar-links'>Sair</a>
                    </li>
                </ul>
            </div> <!-- container -->
        </nav> <!-- navbar -->

        <!-- main -->
        <div class='transition main admin'>
            <div class='container'>
                <div class='main-content admin'>
                    <h1>ABA ADMINISTRATIVA<br>SR. & SRA. BEM ESTAR</h1>
                </div>
            </div> <!-- container -->
            <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1440 320'>
                <path fill='#f4f4f4' fill-opacity='1' d='M0,192L80,176C160,160,320,128,480,138.7C640,149,800,203,960,218.7C1120,235,1280,213,1360,202.7L1440,192L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z'></path>
            </svg>
        </div> <!-- main -->

        <div class='dark-container'>
            <button id='darkmode' onclick='darkmode()'></button>
        </div>

        <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1440 320'><path fill='#222222' fill-opacity='1' d='M0,192L1440,160L1440,320L0,320Z'></path></svg>
        <footer>
            <div class='footer-container'>
                <div class='footer-content'>
                    <p>Copyright © 2022 - <span id='date'></span>. Todos os direitos reservados.</p>
                </div>
            </div>
        </footer>
    
        <!-- jquery -->
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
        <script>
            $(window).on('load', function(){
                $('.loader-container').fadeOut(1000);
            });
        </script>

        <script src='../javascript/navbar.js'></script>
        <script src='../javascript/functions.js'></script>
        <script src='../javascript/darkmode.js'></script>
    </body>
</html>