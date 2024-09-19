<?php
$txtMensaje = "";
$intCiclos = "";
$mensajeFinal = "";
$txtPalabras = "";

$arrPalabras = [];

$arrOrdinal = array(10, 20, 5, 14, 32, 6);
// ----------------- 0,1 ,2, 3, 4,5 ------
// $arrOrdinal[4] --> 32

$arrOrdinal[] = 90;

// $arrOrdinal[6] ----> 90



if (isset($_POST["btnFactor"])) {
    $intFactor = intval($_POST["btnFactor"]);
    $txtMensaje = $_POST["txtMensaje"];
    $intCiclos = intval($_POST["intCiclos"]);
    $txtPalabras = $_POST["txtPalabras"];
    $arrPalabras = explode(" ", $txtPalabras);
    $arrPalabras[10] = 123567498;
    $arrPalabras[] = 98765542;
    for ($i = 0; $i < $intCiclos * $intFactor; $i++) {
        $mensajeFinal .= '<li>' . $txtMensaje . '</li>';
    }
    $j = 0;
    while ($j < $intCiclos) {

        $j++;
    }
    $k = 0;
    do {
        $k++;
    } while ($k < $intCiclos);
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ciclos</title>
</head>

<body>
    <h1>Ciclos en PHP</h1>

    <form action="ciclos.php" method="post">
        <label for="txtMensaje">Mensaje a Duplicar</label>
        <input
            type="text"
            name="txtMensaje"
            id="txtMensaje"
            placeholder="Mensaje a duplicar"
            value="<?php echo $txtMensaje; ?>" />
        <br />
        <label for="intCiclos">Ciclos</label>
        <input type="number" min="1" max="100"
            placeholder="Valor entre 1 y 100"
            id="intCiclos" name="intCiclos"
            value="<?php echo $intCiclos; ?>" />
        <br />
        <textarea name="txtPalabras"></textarea>
        <button type="submit" value="1" name="btnFactor">Ciclo en Factor 1</button>
        <button type="submit" value="2" name="btnFactor">Ciclo en Factor 2</button>
        <button type="submit" value="5" name="btnFactor">Ciclo en Factor 3</button>
    </form>
    <hr />
    <div>
        <ol>
            <?php
            echo $mensajeFinal;
            ?>
        </ol>
    </div>
    <hr />
    <?php
    print_r($arrPalabras);
    ?>
</body>

</html>