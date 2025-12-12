<?php


if (empty($_SESSION['winDone'])) {
    $winner = $_SESSION["role"];

    $_SESSION['message'] = "Vous avez gagné !<br><br>Tous les bateaux adverses ont été coulés !";

    $sql = new SqlConnect();
    $winQuery = "UPDATE scores SET score = score + 1 WHERE joueur = :joueur";
    $winReq = $sql->db->prepare($winQuery);
    $winReq->execute(['joueur' => $winner]);

    $_SESSION['winDone'] = true;
}
?>
