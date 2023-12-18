<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
  .bottom {
    position: absolute;
    bottom: 0; /* set the bottom to 0*/
    left: 0;
    right: 0;
  }
</style>
    <title>Document</title>
</head>
<body>
    
<?php
require "const.php";
//zahrň nav.php navigaci
require "nav/nav.php";
//propojení databáze
require "service.php"
?>

<h1>Seznam setů</h1>

<div>

Již vytvořené sety:
<?php
if($con){
echo"provedeno".BR;
}


$sqlstat = mysqli_query($con,
    "select nazev, jazyk from sety");
if ($sqlstat) {
    echo "SQL prikaz uspesne vykonan".BR;
}

while($row = mysqli_fetch_assoc($sqlstat))
{
    echo"<button type='button' class='btn btn-outline-success'>".$row["nazev"].' - '.$row["jazyk"]."</button>".BR;
}
?>

</div>
<div class="bottom">
    <div class="d-grid gap-2 ">
        <button class="btn btn-primary" type="button">Vytvoř si nový set</button> <!-- TODO - caller když se přihlašuji odtud, tak že po přihlášeníá mě to hodí zpět sem, respektive na vytvoření setů  -->
    </div>   
</div>
</body>
</html>