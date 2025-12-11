<?php
session_start();
include('./sql-connect.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST["cell"])) {
  $sql = new SqlConnect();

  $player = ($_SESSION["role"] === 'joueur1') ? 'joueur2' : 'joueur1';
  $cell = $_POST["cell"]; // on regarde quel joueur se fait attaquer

  $checkQuery = "
        SELECT checked, boat 
        FROM $player 
        WHERE idgrid = :cell";
  $checkReq = $sql->db->prepare($checkQuery);
  $checkReq->execute(['cell' => $cell]);
  $case = $checkReq->fetch(PDO::FETCH_ASSOC);

  if (!$case || $case['checked'] == 1) { // on vérifie si la case a déjà été cliquée ou non
    header("Location: ../index.php");
    exit;
  }

  $updateCase = "
        UPDATE $player
        SET checked = 1
        WHERE idgrid = :cell";
  $req = $sql->db->prepare($updateCase);
  $req->execute(['cell' => $cell]);


  $boatId = $case['boat'];
  if ($boatId > 0) { // si il s'agit d'un bateau
    $hurtQuery = "
            UPDATE bateaux
            SET nbCheckedCase = nbCheckedCase + 1
            WHERE id = :id";
    $hurtReq = $sql->db->prepare($hurtQuery);
    $hurtReq->execute(['id' => $boatId]);

    $checkBoatQuery = "
            SELECT nbCheckedCase, type, name
            FROM bateaux
            WHERE id = :id";
    $boatReq = $sql->db->prepare($checkBoatQuery);
    $boatReq->execute(['id' => $boatId]);
    $boatInfo = $boatReq->fetch(PDO::FETCH_ASSOC);
    //on récupère l'enregistrement complet du bateau dans un tableau indexé

    if ($boatInfo['nbCheckedCase'] >= $boatInfo['type']) {
      //vérifie si toutes les cases du bateau ont été cliquées
      $sinkQuery = "
                UPDATE bateaux
                SET sunken = 1
                WHERE id = :id";
      $sinkReq = $sql->db->prepare($sinkQuery);
      $sinkReq->execute(['id' => $boatId]);

      $_SESSION['message'] = " 💥 Bateau coulé : " . $boatInfo['name']." 💥";
      $_SESSION['last_sunk_cell'] = $cell;
    } else {
      $_SESSION['message'] = " 🎯 Touché ! 🎯";
    }
  } else {
    $_SESSION['message'] = "Raté !";
  }

  header("Location: ../index.php");
  exit;
}
?>