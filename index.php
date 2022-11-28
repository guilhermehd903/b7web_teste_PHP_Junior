<?php
session_start();
$value = "0,00";

if (isset($_SESSION["state"])) {
    require_once __DIR__ . './functions.php';
    $return = buildReturn();
    $value = ($_SESSION["state"]["valid"]) ? $_SESSION["state"]["value"] : "0,00";
    unset($_SESSION["state"]);
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/main.css">
    <title>PHP junior</title>
</head>

<body>
    <div id="background">
        <div class="glass">
            <div class="card popup">
                <form class="input" method="POST" action="./process.php">
                    <label>Total (R$)</label>
                    <input type="text" name="totalAmount" placeholder="Informe o valor total">
                    <label>Nº de pessoas</label>
                    <input type="text" name="quantity" placeholder="Informe o nº de pessoas">
                    <button>Calcular</button>
                </form>
                <div class="result">
                    <p>O valor dividido fica em: <b>R$ <?= $value ?></b></p>
                </div>
            </div>
        </div>
        <?= (isset($return)) ? $return : "" ?>
    </div>
</body>
<script>
    if (document.getElementsByClassName("msg-tag")[0]) {
        document.getElementsByClassName("msg-tag")[0].onclick = function() {
            this.remove();
        }
    }
</script>

</html>