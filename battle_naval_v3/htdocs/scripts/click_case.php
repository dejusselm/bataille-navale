<?php
session_start();
include('./sql-connect.php');

if (isset($_POST["cell"])) {
  $sql = new SqlConnect();
  $player = ($_SESSION["role"] === 'joueur1') ? 'joueur2' : 'joueur1';

  $checkQuery = "SELECT checked FROM $player WHERE idgrid = :cell";
  $checkReq = $sql->db->prepare($checkQuery);
  $checkReq->execute(['cell' => $_POST["cell"]]);
  $current = $checkReq->fetch(PDO::FETCH_ASSOC);

  if ($current && $current['checked'] == 1) {
    header("Location: ../index.php");
    exit;
  }

  $otherPlayer = ($_SESSION["role"]==='joueur1') ? 'joueur1' : 'joueur2';

  $isBoatQuery = "
        SELECT idboat FROM ".$otherPlayer." 
        WHERE idgrid=".$idgrid;

  $isBoatReq = $sql->db->prepare($isBoatQuery);

  $updateQuery = "
        UPDATE $player
        SET checked = 1
        WHERE idgrid = :cell
    ";

  $updateReq = $sql->db->prepare($updateQuery);
  $updateReq->execute(['cell' => $_POST["cell"]]);

  header("Location: ../index.php");
  exit;
}
