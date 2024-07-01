<?php
    header('content-Type: application/json');


    include_once("config.php");

    global $CONECT;

    $SQL=$CONECT->prepare("SELECT * FROM registro");
    $SQL->execute();

    $result=$SQL->fetchALL(PDO::FETCH_ASSOC);

    echo ( json_encode($result) );

    

?>