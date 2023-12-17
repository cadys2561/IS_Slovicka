<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Přípravný kurz</title>
    <!--<link rel="stylesheet" href="css/styles.css">-->
</head>
<body>

<?php
/*
    nav.php
    Navigace pro aplikaci Slovíčkq
    change log:
    2023-12-15 - JCada - v1

*/


//zahrneme def.konstanty
//require "../const.php";

session_start();
?>



<span class="menuItem">
    <a href="index.php">Domů</a>
</span>     

<span class="menuItem">
    <a href="sety.php">Sety</a>
</span>       

<span class="menuItem">
    <a href="login.php">Registrace</a>
</span>   

<span class="menuItem">
    <?php

    if(isset($_SESSION["logged_in"]) 
        && $_SESSION["logged_in"])
    {
        echo $_SESSION["email"];
    }else{
        // jinak odkaz na registraci
        echo "<a href='login.php'>Přihlášení</a>";
    }
    ?>
    
</span>   
