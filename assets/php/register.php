<?php
    include '../mysql/pdo.php';

    function checkString($str){
        $str = trim($str);
        $str = stripslashes($str);
        $str = htmlspecialchars($str);
        return $str;
    };

    if( ($_GET['type'] === 'paciente') ){
        if( isset($_POST['name']) && isset($_POST['email']) && isset($_POST['date']) && isset($_POST['phone']) && isset($_POST['cpf']) && isset($_POST['password']) && isset($_POST['passwordC']) ){
            $name = checkString($_POST['name']);
            $email = checkString($_POST['email']);
            $date = checkString($_POST['date']);
            $phone = checkString($_POST['phone']);
            $cpf = checkString($_POST['cpf']);
            $password = checkString($_POST['password']);
            $passwordC = checkString($_POST['passwordC']);
        };
    }else{
        if( isset($_POST['nameR']) && isset($_POST['emailR']) && isset($_POST['dateR']) && isset($_POST['phoneR']) && isset($_POST['cpfR']) && isset($_POST['passwordR']) && isset($_POST['passwordCR']) ){
            $name = checkString($_POST['nameR']);
            $email = checkString($_POST['emailR']);
            $date = checkString($_POST['dateR']);
            $phone = checkString($_POST['phoneR']);
            $cpf = checkString($_POST['cpfR']);
            $password = checkString($_POST['passwordR']);
            $passwordC = checkString($_POST['passwordCR']);
        };
    };

?>