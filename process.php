<?php
session_start();

require_once __DIR__ . './functions.php';

if (isset($_POST["totalAmount"]) && isset($_POST["quantity"])) {
    $totalAmount = str_replace(",", ".", $_POST["totalAmount"]);
    $quantity = $_POST["quantity"];
    $state = ["msg" => "", "valid" => false, "value" => 0];

    if (empty($totalAmount) || empty($quantity)) {
        $state["msg"] = "Preencha todos os campos";
        $_SESSION["state"] = $state;
        redirect();
        exit;
    }

    if (!is_numeric($totalAmount) || !is_numeric($quantity)) {
        $state["msg"] = "Ambos os campos devem ser numericos";
        $_SESSION["state"] = $state;
        redirect();
        exit;
    }

    $quantity = (int) $quantity;
    $totalAmount = floatval($totalAmount);
    $totalAmount = number_format(($totalAmount / $quantity), 2, ",", ".");
    $state["msg"] = "Calculo realizado com sucesso";
    $state["valid"] = true;
    $state["value"] = $totalAmount;
    $_SESSION["state"] = $state;
    redirect();
    exit;
}
