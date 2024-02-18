
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css?version=<?php echo time(); ?>">
    <title>Document</title>
</head>
<body>
    

<?php
require "const.php";
require_once "service/session.php";
require "nav/nav.php";
require_once "service/connect_db.php";
require_once "service/utils.php";



if (isset($_POST["email"])) { // isset() vraci true


// TODO - sestavime SQL INSERT into uzivatele...
$sql = "insert into uzivatele(email, heslo, jmeno, prijmeni, telefon)\n"
."values('".$_POST["email"]."', '".$_POST["heslo"]."', '".$_POST["jmeno"]."', '".$_POST["prijmeni"]
."', '".$_POST["telefon"]."')";



// vykonani insertu
if(mysqli_query($con, $sql)) {
show_ok("Registrován. Nyní se <a href='login.php'>přihlaš</a>");
} else {
echo "chyba:".mysqli_error($con).BR;
}



//$con->close();


exit(); // ukonceni .php 

}

?>


<!-- <form method='POST'> 

        
        
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
        </form> -->



        <div class="container">
      <div class="wrapper">
        <div class="title"><span>Registruj se</span></div>
        <form method='POST'>
        <div class="row">
            <i class="fas fa-user"></i>
            <input id='jmeno' type='jmeno' name='jmeno' placeholder="Jméno" required>
          </div>
          <div class="row">
            <i class="fas fa-user"></i>
            <input id='prijmeni' type='prijmeni' name='prijmeni' placeholder="Příjmení" required>
          </div>
          <div class="row">
            <i class="fas fa-user"></i>
            <input id='email' type='email' name='email' placeholder="Email" required>
          </div>
          <div class="row">
            <i class="fas fa-user"></i>
            <input id='telefon' type='number' name='telefon' min='100000000' max='999999999' placeholder="Telefon" required>
          </div>
          <div class="row">
            <i class="fas fa-lock"></i>
            <input id='heslo' type='password' name='heslo' placeholder="Heslo" required>
          </div>
     
          <div class="row button">
            <input type="submit" value="Přihlaš">
          </div>
          <div class="signup-link">Máš už účet? <a href="login.php">Přihlaš se</a></div>
        </form>
      </div>
    </div>




</body>
</html>