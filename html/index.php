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
?>


<h1>Vytvořte si vlastní set kartiček k opakování nejen slovíček</h1>
<span class="menuItem">
    <?php
    if(isset($_SESSION["logged_in"]) 
        && $_SESSION["logged_in"])
    {
        echo "<a href='sety.php'>Vytvoř si svůj set</a>";
    }else{
        // jinak odkaz na registraci
        echo "<a href='login.php'>Přihlaš se nebo se zaregistruj</a>";
    }
    ?>
    
</span>   

<div>
Nejoblíbenější sety:
<script>
    </script>


</div>

<div>
Náhodně doporučené sety:
<script>
    </script>
</div>

</body>
</html>