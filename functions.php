<?php

function redirect()
{
    header("Location: index.php");
}

function buildReturn(){
    $element = "";

    if(isset($_SESSION["state"])){
        $msg = $_SESSION["state"]["msg"];
        $tag = ($_SESSION["state"]["valid"]) ? "success" : "error";
        $element = "<div class='popup msg-tag ".$tag."'>".$msg."</div>";
    }

    return $element;
}

