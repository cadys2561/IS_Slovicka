<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<?php

require "const.php";
//zahrň nav.php navigaci
require "nav/nav.php";


//define("BR","<br/>\n");
//pokud  form. odeslan, pak zaznam ulozime do DB

if(isset($_POST["email"])) { //isset() vrací true pokud je hodnota nastavena 
    echo "formular odeslan".BR;
    echo "email ". $_POST ["email"].BR;
    echo "heslo ". $_POST ["heslo"].BR;
    echo "tel ". $_POST ["tel"].BR;

}

    //TODO - sestavíme  SQL insert into uzivatele

   /* $sql = "insert into uzivatele(email, heslo, role, telefon)\n"
    ."values('".$_POST["email"]."','".$_POST["heslo"]."','user','".$_POST["tel"]."');";
            
    //echo $sql.BR;

    //propojení s DB
    $host="localhost";
    $port=3306;
    $socket="";
    $user="root";
    $password="root";
    $dbname="prip_kurz";

    $con = new mysqli($host, $user, $password, $dbname, $port, $socket)
	or die ('Could not connect to the database server' . mysqli_connect_error());

//$con->close();

    if(mysqli_query($con,$sql)){
        echo "provedeno";
    } else{
        echo "chyba";
    }

    
    exit(); //ukoncení php


} else{
    echo "formular zatím nebyl odeslán";
}
*/



    if(isset($_SESSION["logged_in"]) 
        && $_SESSION["logged_in"])
    {
        echo "<form method='POST'> <!-- action odesílá na zadaný php skript -->
        <!-- id -- nutnu mít sekvenci-->
        
        
        
        <label for='email'> *Email: </label>
        <input id='email' type='email' name='email' required />
        <br/>
        <label for='heslo'> *Heslo: </label>
        <input id='heslo' type='password' name='heslo' required/>
        <br/>
        <input type='submit' value='Přihlaš se'/>
        </form>";
    }else{
        // jinak odkaz na registraci
        echo "<form method='POST'> <!-- action odesílá na zadaný php skript -->
        <!-- id -- nutnu mít sekvenci-->
        
        
        
        <label for='email'> *Email: </label>
        <input id='email' type='email' name='email' required />
        <br/>
        <label for='heslo'> *Heslo: </label>
        <input id='heslo' type='password' name='heslo' required/>
        <br/>
        <label for='tel'> Telefon: </label>
        <input id='tel' type='number' name='tel' min='100000000' max='999999999'/>
        <br/>
        <input type='submit' value='Zaregistruj se'/>
        </form>
        ";
    }
    





?>

</body>
</html>