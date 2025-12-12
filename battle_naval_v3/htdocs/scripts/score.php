<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$newSql = new SqlConnect();


$scoreQuery = "
        SELECT * 
        FROM scores";
$scoreReq = $newSql->db->prepare($scoreQuery);
$scoreReq->execute();
$scores = $scoreReq->fetchAll(PDO::FETCH_ASSOC);


foreach ($scores as $score) {
    echo "<h4 style='margin-left:15%;'>".$score['joueur']. "  :  ".$score['score']."<br> </h4>";
}


?>