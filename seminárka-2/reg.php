
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <title>Document</title>
</head>
<body>
    

<?php
require "const.php";
//zahrň nav.php navigaci
require "nav/nav.php";
require_once "service/connect_db.php";
require_once "service/session.php";


if (isset($_POST["email"])) { // isset() vraci true
    // pokud hodnota je nastavena
echo "formular odeslan".BR;
echo "email:".$_POST["email"].BR;
echo "heslo:".$_POST["heslo"].BR;
echo "telefon:".$_POST["telefon"].BR;
echo BR.BR;

// TODO - sestavime SQL INSERT into uzivatele...
$sql = "insert into uzivatele(email, heslo, telefon)\n"
."values('".$_POST["email"]."', '".$_POST["heslo"]
."', '".$_POST["telefon"]."')";

echo $sql.BR;

// pripojeni k DB (WB - Tools - ...)


$host="localhost";
$port=3306;
$socket="";
$user="root";
$password="root";
$dbname="karticky_db";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
or die ('Could not connect to the database server' . mysqli_connect_error());

// vykonani insertu
if(mysqli_query($con, $sql)) {
echo "provedeno".BR;
} else {
echo "chyba:".mysqli_error($con).BR;
}



//$con->close();


exit(); // ukonceni .php 

}

?>




<form method='POST'> <!-- action odesílá na zadaný php skript -->
        <!-- id -- nutnu mít sekvenci-->
        
        
        <input type="hidden" name="action" value="submited"/>
        <label for='email'> *Email: </label>
        <input id='email' type='email' name='email' required />
        <br/>
        <label for='heslo'> *Heslo: </label>
        <input id='heslo' type='password' name='heslo' required/>
        <br/>
        <label for='telefon'> Telefon: </label>
        <input id='telefon' type='number' name='telefon' min='100000000' max='999999999'/>
        <br/>
        <input type='submit' value='Zaregistruj se'/>
        </form>
</body>
</html>