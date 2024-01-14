<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="css/styles.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    
<?php
require "const.php";
//zahrň nav.php navigaci
require "nav/nav.php";
//propojení databáze
require_once "service/connect_db.php";
require_once "service/session.php";
?>

<h1>Seznam setů</h1>

<div>

Již vytvořené sety:
<?php

if(isset($_SESSION["logged_in"]) 
&& $_SESSION["logged_in"]){

    if($con){
        echo"provedeno".BR;
    }

$id=mysqli_query($con,"select id from uzivatele where email ='".$_SESSION["email"]."'");
$row = mysqli_fetch_assoc($id);

$sqlstat = mysqli_query($con,
    "select nazev, jazyk from sety
    where uzivatele_id = '".$row["id"]."'");
if ($sqlstat) {
    echo "SQL prikaz uspesne vykonan".BR;
}



    while($row = mysqli_fetch_assoc($sqlstat))
    {
        echo"<button type='button' class='btn btn-outline-success'>".$row["nazev"].' - '.$row["jazyk"]."</button>".BR;//vypíše název setu a jeho jazyk
    }



}else{
    echo "přihlaš se";
}
?>

</div>
<a href="create.php">
<div class="bottom" >
    <div class="d-grid gap-2 " >
        <button class="btn btn-primary" type="button" >
            
            Vytvoř si nový set
        </button>
         <!-- TODO - caller když se přihlašuji odtud, tak že po přihlášeníá mě to hodí zpět sem, respektive na vytvoření setů  -->
    </div>   
</div>
</a>
</body>
</html>

