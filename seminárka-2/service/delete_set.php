<?php
// delete_set.php
require_once "service/connect_db.php";
require_once "service/session.php";




if(isset($_SESSION["email"]) 
&& $_SESSION["email"]){
                                    // Připojení k databázi a ověření, že je uživatel přihlášen


// Získání dat z požadavku
$data = json_decode(json_encode($_GET), true);
$setID = $data['setID'];

// Smazání záznamu v databázi
// Přidej svůj kód pro smazání záznamu z databáze zde
$sqldel = mysqli_query($con, "DELETE FROM sety WHERE id = $setID");
            if ($sqldel) {
                echo "Set byl úspěšně smazán.";
            } else {
                echo "Nepodařilo se smazat set.";
            }

// Odpověď na požadavek
if ($sqldel) {
    http_response_code(200); // OK
    echo json_encode(array('message' => 'Set byl úspěšně smazán.'));
} else {
    http_response_code(500); // Interní chyba serveru
    echo json_encode(array('message' => 'Nepodařilo se smazat set.'));
}


}
?>
