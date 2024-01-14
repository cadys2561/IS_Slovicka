<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="css/style.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    

<?php

require "const.php";
//zahrň nav.php navigaci


require_once "service/connect_db.php";
require_once "service/utils.php";
require_once "service/session.php";


//define("BR","<br/>\n");
//pokud  form. odeslan, pak zaznam ulozime do DB

if (isset($_POST["email"])) { // isset() vraci true
    // pokud hodnota je nastavena
    //  overit ze email a heslo ($_POST['heslo'])
    // jsou spravne (dotazem do DB)
    //$con = connect_db();
    if ($con) {
        $sql = "select heslo from uzivatele
                where email = '".$_POST["email"]."'";
        $sqlstat = mysqli_query($con, $sql);
        if ($row = mysqli_fetch_assoc($sqlstat)) {
            // v $row je zaznam uzivatele
            if ($_POST['heslo'] == $row["heslo"]) {
                // hesla sedi (co zadal uziv. do form a co je v DB)
                $_SESSION["logged_in"] = true;
                $_SESSION["email"] = $_POST["email"];
                //$_SESSION["id"] = $row["id"]; 
                show_error("OK");
            } else { // heslo nesedi
                $_SESSION["logged_in"] = false;
                show_error("Chybný email nebo heslo");
            }
        } else { // zaznam pro email v DB neex.
            $_SESSION["logged_in"] = false;
            show_error("Chybný email nebo heslo");
        }

    }
}

require "nav/nav.php";
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
        <input type='submit' value='Přihlaš se'/>
        </form>

</body>
</html>