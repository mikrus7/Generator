<?php

include 'includes/class-autoload.inc.php';
?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <title>Generator</title>
    </head>
        <body>
            <form action="includes/gen.inc.php" method="post">
                <p> Word Generator</p>
                <input type="number" name="num1" placeholder="minimum znakow"required>
                <input type="number" name="num2" placeholder="maximum znakow"required>
                <input type="number" name="num3" placeholder="ilosc slow"required>
                <select name="option" required>
                    <option value="real">Prawdziwe slowa</option>
                    <option value="random">Ciag znakow</option>
                </select>
                <button type="submit" name="submit">Generate</button>
            </form>
        </body>
</html>

