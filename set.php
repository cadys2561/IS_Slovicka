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
require "nav/nav.php";
require_once "service/connect_db.php";
require_once "service/session.php";
require_once "service/utils.php";


$setID = isset($_GET['set_id']) ? $_GET['set_id'] : null;

if ($setID !== null) {
    show_error("Ok");
    echo $setID.BR;

    $sql = "SELECT * FROM slovicko WHERE sety_id = $setID"; // Adjust your_table to your actual table name
    $result = mysqli_query($con, $sql);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)){

        // Display or process the data as needed
        echo "Slovíčko: " . $row['slovicko'] . BR;
        echo "Definice: " . $row['definice'] . BR;

        // Continue displaying other data fields...
        }
        
    } else {
        echo "Error retrieving data from the database: " . mysqli_error($con);
    }

    
   
} 

if (isset($_POST["slovicko"])){
    $id = mysqli_query($con, "select id from uzivatele where email = '" . $_SESSION["email"] . "'");
    $row = mysqli_fetch_assoc($id);

    $sql = "insert into slovicko (slovicko, definice,sety_id, sety_uzivatele_id)\n"
            ."values('".$_POST["slovicko"]."' , '".$_POST["definice"]."' , '".$setID."' , '".$row["id"]."')";
    if(mysqli_query($con, $sql)) {
        show_error("Ok");
            } else {
        echo "chyba:".mysqli_error($con).BR;
    }
}



/*
if(isset($_SESSION["logged_in"]) 
&& $_SESSION["logged_in"]){

    if($con){
        echo"provedeno".BR;
    }


    $id=mysqli_query($con,"select id from sety where nazev ='".$setID."'");
$row = mysqli_fetch_assoc($id);

$sqlstat = mysqli_query($con,
    "select slovicko, definice from sety
    where sety_id = '".$row["id"]."'");
if ($sqlstat) {
    echo "SQL prikaz uspesne vykonan".BR;
}
    while($row = mysqli_fetch_assoc($sqlstat))
    {
        echo $row["slovicko"]. " - " .$row["definice"].BR;//vypíše název setu a jeho jazyk
    }
}
*/

?>
    <form method='POST'>
        
        
        <input type="hidden" name="action" value="submited"/>
        <label for='slovicko'> Slovicko: </label>
        <input id='slovicko' type='slovicko' name='slovicko' required />
        <br/>
        <label for='definice'> Definice: </label>
        <input id='definice' type='definice' name='definice' required/>
        <br/>
        <input type='submit'  value='Přidej slovíčko'/>
        </form>
<!--  TODO - udělat zobrazování pomocí buttonu. Vložit atribut onclick a funkci, která bude swapovap echo. Udělám to tak, 
             že když klikne, tak to ověří, jaká hodnota je nastavena a echo hodí tu druhou. Potom bude moct uživatel kliknout na další 
             a to zvětší proměnnou ID o jedna a zobrazí se další slovíčko, potažmo se může vrátit zpět -->
</body>
</html>
