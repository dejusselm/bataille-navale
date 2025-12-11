<?php

if (isset($_POST["reset_total"])) {
  include('./destory_session.php');

  include('./sql-connect.php');
  $connection = new SqlConnect();

  $tables = ['joueur1', 'joueur2'];
  foreach ($tables as $table) {
    $sql = "UPDATE $table SET checked = 0 WHERE checked = 1";
    $stmt = $connection->db->prepare($sql);
    $stmt->execute();
  }

  header("Location: ../index.php");
  exit;
}
