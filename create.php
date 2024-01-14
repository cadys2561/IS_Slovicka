<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>
<body>
<?php
require "nav/nav.php";
require_once "service/connect_db.php";


if (isset($_POST["email"])){

$sql = "insert into setz(nazev, jayzk, pozn, sdilene, uzivatele_id)\n"
."values('".$_POST["nazev"]."', '".$_POST["jayzk"]
."', '".$_POST["pozn"]."')"; //TODo - přidat yes or no sdílení a dodělat automatické provázání na uživ.


if(mysqli_query($con, $sql)) {
    echo "provedeno".BR;
    } else {
    echo "chyba:".mysqli_error($con).BR;
    }
    
}
?>    



<form method='POST'> <!-- action odesílá na zadaný php skript -->
        <!-- id -- nutnu mít sekvenci-->
        
        
        <input type="hidden" name="action" value="submited"/>
        <label for='nazev'> *Název: </label>
        <input id='nazev' type='nazev' name='nazev' required />
        <br/>
        <label for='jazyk'> *Jazyk: </label>
        <input id='jazyk' type='jazyk' name='jazyk' required/>
        <br/>
        <label for='pozn'> Pozn: </label>
        <input id='pozn' type='pozn' name='pozn'/>
        <br/>
        <input type="radio" name="yes_no" checked>Yes</input>
        <input type="radio" name="yes_no">No</input>
        </form>


</body>
</html>