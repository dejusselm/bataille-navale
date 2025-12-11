<?php

ini_set('display_errors', 1);
ini_set('displa_startup_errors', 1);
error_reporting(E_ALL);

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

include(__DIR__ . '/../scripts/sql-connect.php');

$sql = new SqlConnect();
$player = $_SESSION["role"] === 'joueur1' ? 'joueur2' : 'joueur1';
$query = 'SELECT * FROM ' . $player;

$req = $sql->db->prepare($query);
$req->execute();
$rows = $req->fetchAll(PDO::FETCH_ASSOC);

$colsPerRow = 10;
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Game</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link href="style.css" rel="stylesheet">
</head>

<body>
  <div class="container text-center" style="margin-top:5%; margin-bottom:5%;">
    <?php
    for ($i = 0; $i < count($rows); $i += $colsPerRow) {
        echo '<div class="row g-0 grid-row">';
      for ($j = 0; $j < $colsPerRow; $j++) {
        if (isset($rows[$i + $j])) {
          $case = $rows[$i + $j];
          $color = $case['checked'] == 1 ? 'blue' : 'grey';
          if ($case['checked'] == 1 && $case['boat'] > 0) {
            $color = 'red';
          }
          $idgrid = $case['idgrid'];
          $isChecked = $case['checked'] == 1;

          echo '<div class="col grid-col">';
          echo '<form method="post" action="/battle_naval_v3/htdocs/scripts/click_case.php">';
          echo '<button type="submit" name="cell"  class="btn" value="' . $idgrid . '" style="background-color:' . $color . ';"></button>';
          echo '</form>';
          echo '</div>';
        }
      }
      echo '</div>';
    }
    ?>
  </div>
  <form method="post" action="/battle_naval_v3/htdocs/scripts/reset_total.php">
    <button type="submit" name="reset_total">
      ❌ Fin de partie (RESET)
    </button>
  </form>
</body>

</html>