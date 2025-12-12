<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST["reset_total"])) {
  include('./destroy_session.php');

  include('./sql-connect.php');
  $connection = new SqlConnect();

  $tables = ['joueur1', 'joueur2'];
  foreach ($tables as $table) {
    $tableQuery = "UPDATE $table SET checked = 0 WHERE checked = 1";
    $tableReq = $connection->db->prepare($tableQuery);
    $tableReq->execute();

    $msgQuery = "
          UPDATE etat_jeu
          SET msg = ''";

    $msgReq = $connection->db->prepare($msgQuery);
    $msgReq->execute();
  }

  $boats = 'bateaux';
  $boatsQuery = "
                UPDATE $boats 
                SET sunken = 0;
                UPDATE $boats 
                SET nbCheckedCase = 0;";
  $boatsReq = $connection->db->prepare($boatsQuery);
  $boatsReq->execute();

  unset($_SESSION['win_done']);
  unset($_SESSION['message']);

  header("Location: ../index.php");
  exit;
}
