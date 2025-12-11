<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

if (!isset($_SESSION['message'])) {
  $_SESSION['message'] = 'Cliquez sur une case pour commencer';
}

include(__DIR__ . '/../scripts/sql-connect.php');

$sql = new SqlConnect();
$player = $_SESSION["role"] === 'joueur1' ? 'joueur2' : 'joueur1';
$query = 'SELECT * FROM ' . $player;

$req = $sql->db->prepare($query);
$req->execute();
$rows = $req->fetchAll(PDO::FETCH_ASSOC);

$colsPerRow = 10;
$count = 0;
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
  <link rel="stylesheet" href="./style.css">
</head>

<body class="body_game">

  <div class="game-wrapper">
    <div class="repere_ligne">
      <div class="corner-space"></div>
      <p>A</p>
      <p>B</p>
      <p>C</p>
      <p>D</p>
      <p>E</p>
      <p>F</p>
      <p>G</p>
      <p>H</p>
      <p>I</p>
      <p>J</p>
    </div>

    <div class="grid-with-col-numbers">
      <div class="repere_colonne">
        <p>1</p>
        <p>2</p>
        <p>3</p>
        <p>4</p>
        <p>5</p>
        <p>6</p>
        <p>7</p>
        <p>8</p>
        <p>9</p>
        <p>10</p>
      </div>

      <!-- Grille de jeu -->
      <div class="container text-center">
        <?php
        for ($i = 0; $i < count($rows); $i += $colsPerRow) {
          echo '<div class="row g-0 grid-row">';
          for ($j = 0; $j < $colsPerRow; $j++) {
            if (isset($rows[$i + $j])) {
              $case = $rows[$i + $j];
              $color = $case['checked'] == 1 ? 'blue' : 'grey';

              if ($case['checked'] == 1 && $case['boat'] > 0) {
                $color = 'red';
                $count++;
                if ($count == 17) {
                  echo "<h1 style='color:white; text-align:center; margin-bottom:20px;'>Vous avez gagné !</h1>";
                }
              }

              $idgrid = $case['idgrid'];

              $isLastSunkCell = isset($_SESSION['last_sunk_cell']) && $_SESSION['last_sunk_cell'] == $idgrid;

              echo '<div class="col grid-col">';
              echo '<form method="post" action="/battle_naval_v3/htdocs/scripts/click_case.php">';

              if ($isLastSunkCell) {
                echo '<button type="submit" name="cell" class="btn" value="' . $idgrid . '" style="background-color:black;">💥</button>';
              } else {
                echo '<button type="submit" name="cell" class="btn" value="' . $idgrid . '" style="background-color:' . $color . ';"></button>';
              }

              echo '</form>';
              echo '</div>';
            }
          }
          echo '</div>';
        }
        unset($_SESSION['last_sunk_cell']);
        ?>
      </div>
    </div>
  </div>

  <div >
  <h2 style="color:black;">Déroulé de la bataille :</h2>
  <h3 style="text-align:center;"><?echo $_SESSION['message']?></h3>
  </div>
  <form method="post" action="/battle_naval_v3/htdocs/scripts/reset_total.php">
    <button type="submit" name="reset_total">
      ❌ Fin de partie (RESET)
    </button>
  </form>

</body>

</html>