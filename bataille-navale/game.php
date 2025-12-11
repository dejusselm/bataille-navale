<?php
if (isset($_POST["reset_total"])) {
    $etat = ["j1" => null, "j2" => null];
    save_state($GLOBALS['fichier'], $etat);

    session_unset();
    session_destroy();

    header("Location: index.php");
    exit;
}

$grid = [
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
];
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>game</title>
</head>

<body>
    <section>

        <article style="flex : 50%;">

            <table border="2">
                <tbody>
                    <tr>
                        <td>&nbsp;</td>
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                        <td>5</td>
                        <td>6</td>
                        <td>7</td>
                        <td>8</td>
                        <td>9</td>
                        <td>10</td>
                    </tr>
                    <tr>
                        <td>A</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>B</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>C</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>D</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>E</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>F</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>G</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>H</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>I</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>J</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                        <td class="case" onclick="myFunction(this)">&nbsp;</td>
                    </tr>

                </tbody>
            </table>
        </article>
    </section>
    <form action="index.php" method="post">
        <button type="submit" name="reset_total">
            ❌ Fin de partie (RESET)
        </button>
    </form>
    <script>function myFunction(cell) {
            cell.style.backgroundColor = "lightblue";
        }</script>
</body>

</html>