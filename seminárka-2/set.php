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
require_once "service/session.php";
require "const.php";
require "nav/nav.php";
require_once "service/connect_db.php";

require_once "service/utils.php";


$setID = isset($_GET['set_id']) ? $_GET['set_id'] : null;

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




if ($setID !== null) {
    show_ok("Ok");
    echo $setID.BR;

    $sql = "SELECT slovicko, definice FROM slovicko WHERE sety_id = $setID"; 
    $result = mysqli_query($con, $sql);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)){

        
        echo "Slovíčko: " . $row['slovicko'] . BR;
        echo "Definice: " . $row['definice'] . BR;

        
        }
        
    } else {
        echo "Error retrieving data from the database: " . mysqli_error($con);
    }

    
   
} 






?>

<script>
    function changeText() {
        document.getElementById('figcaption1').style.display = 'none';
        document.getElementById('figcaption2').style.display = 'block';
    }

    function resetText() {
        document.getElementById('figcaption1').style.display = 'block';
        document.getElementById('figcaption2').style.display = 'none';
    }
</script>


<figure class="figure-with-text" onmouseover="changeText()" onmouseout="resetText()">
    <img src="https://picsum.photos/id/287/250/300" alt="Mountains" >
    <figcaption id="figcaption2" style="display: none;">Popisek 2</figcaption>
</figure>







<figure style="background-color: black">
    <figcaption>něco</figcaption>
    <figcaption>The Day</figcaption>
</figure>

<figure style="--c:#fff5">
    <img src="https://picsum.photos/id/475/250/300" alt="Mountains">
    <figcaption>The Night</figcaption>
</figure>


        <div class="container">
      <div class="wrapper">
        <div class="title"><span>Přidej slovíčko</span></div>
        <form method='POST'>
          <div class="row">
            <i class="fas fa-user"></i>
            <input id='slovicko' type='slovicko' name='slovicko' placeholder="Slovíčko:" required>
          </div>
          <div class="row">
            <i class="fas fa-lock"></i>
            <input id='definice' type='definice' name='definice' placeholder="Definice:" required>
          </div>
          <div class="row button">
            <input type="submit" value="Přidej">
          </div>
        </form>
      </div>
    </div>
       
        



        <?php
$var = 1;



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'next':
                $var++;
                echo $var;
                break;

            case 'prev':
                $var = max(1, $var - 1); 
                break;

            case 'flip':
                // Prohození hodnoty slovíčka a definice
                $sqlstat = mysqli_query($con,
                    "SELECT slovicko, definice FROM slovicko
                    WHERE id = '" . $var . "'");
                if ($sqlstat) {
                    $row = mysqli_fetch_assoc($sqlstat);
                    if ($row) {
                        $temp = $row['slovicko'];
                        $row['slovicko'] = $row['definice'];
                        $row['definice'] = $temp;
                    } else {
                        echo "Data nebyla nalezena.";
                    }
                } else {
                    echo "Chyba v dotazu: " . mysqli_error($con);
                }
                break;
        }
    }
} else {
    // Inicializace pro první zobrazení stránky
    $sqlstat = mysqli_query($con,
        "SELECT slovicko, definice FROM slovicko
        WHERE id = '" . $var . "'");
    if ($sqlstat) {
        $row = mysqli_fetch_assoc($sqlstat);
        if (!$row) {
            
            echo "Data nebyla nalezena.";
        }
    } else {
        echo "Chyba v dotazu: " . mysqli_error($con);
    }
}
?>

<form method="POST" action="">
    <button type="submit" name="action" value="prev">Předchozí</button>
    <button type="submit" name="action" value="next">Další</button>
    <button type="submit" name="action" value="flip">Otoč</button>
</form>

<div class='card'>
    
    <?php
  

    if (isset($row['slovicko'])) {
        $sqlstat = mysqli_query($con,
        "select slovicko, definice from slovicko
        where id = '" . $var . "'");
        if ($sqlstat) {
            $row = mysqli_fetch_assoc($sqlstat);}
        echo $row['slovicko'];
    } else {
        echo "Data nebyla nalezena.";
    }

    //TODO - dokážu říct, jestli jsem uhodl nebo ne a podle toho se zobrazí další pole
    ?>
</div>



</body>
</html>