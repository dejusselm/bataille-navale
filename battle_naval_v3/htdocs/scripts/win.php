<?php


if (empty($_SESSION['winDone'])) {
    $winner = $_SESSION["role"];

    $_SESSION['message'] = "Vous avez gagné !<br><br>Tous les bateaux adverses ont été coulés !";

    $sql = new SqlConnect();
    $winQuery = "UPDATE scores SET score = score + 1 WHERE joueur = :joueur";
    $winReq = $sql->db->prepare($winQuery);
    $winReq->execute(['joueur' => $winner]);

    $msgQuery = "
            UPDATE etat_jeu
            SET msg = :msg
            WHERE joueur = :joueur";

    $msgReq = $sql->db->prepare($msgQuery);
    $msgReq->execute(["msg"=> "Fin de partie : tous les bateaux ont été coulés !", "joueur"=>$player]);

    $_SESSION['winDone'] = true;
}
?>
