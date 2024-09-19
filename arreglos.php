<?php
$txtPalabras = '';

if (isset($_POST["btnProcesar"])) {
    $txtPalabras = $_POST["txtPalabras"];
    $cleanPalabras = strtolower($txtPalabras);
    $cleanPalabras = preg_replace("/[\,\.!?¿¡:;\-()\r\n»«]/", "", $cleanPalabras);
    $arrPalabras = explode(" ", $cleanPalabras);
    $frqPalabras = []; // array();
    foreach ($arrPalabras as $palabra) {
        if (isset($frqPalabras[$palabra])) {
            $frqPalabras[$palabra]++;
        } else {
            $frqPalabras[$palabra] = 1;
        }
    }
    arsort($frqPalabras);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contador de Palabras</title>
</head>

<body>
    <h1>Contador de Palabras</h1>
    <form action="arreglos.php" method="post">
        <label for="txtPalabras">Palabras a Analizar</label>
        <br />
        <textarea id="txtPalabras" name="txtPalabras"><?php echo $txtPalabras; ?></textarea>
        <br />
        <button type="submit" name="btnProcesar">Procesar</button>
    </form>

    <hr />
    <div>
        <?php if (isset($arrPalabras)) {
            print_r($arrPalabras);
            echo '<hr/>';
            print_r($frqPalabras);
            echo '<hr/>';
            foreach ($frqPalabras as $llave => $valor) {
                echo '<div>' . $llave . " --- " . $valor . '</div>';
            }
        }
        ?>
    </div>
</body>

</html>