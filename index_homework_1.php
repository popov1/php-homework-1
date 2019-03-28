<?php

if (isset($_POST['action'])) {
    if ($_POST['action'] == 'calculate') {
        if (is_numeric($_POST['start'])) {
            $startValue = $_POST['start'];
        } else {
            echo "<b style='color:red;'>Got wrong value for start parameter. Set default value for start parameter.</b><br>";
            $startValue = 1;
        }
        if (is_numeric($_POST['end'])) {
            $endValue = $_POST['end'];
        } else {
            echo "<b style='color:red;'>Got wrong value for end parameter. Set default value for end parameter.</b><br>";
            $endValue = 9;
        }
    }
} else {
    $startValue = 1;
    $endValue   = 9;
}

echo "Start value " . $startValue . "<br>";
echo "End value " . $endValue . "<br>";

if ($startValue < $endValue) {
    $mass = calculateArray($startValue, $endValue);
} else {
    $mass = [];
    echo "<b style='color:red;'>Got end parameter bigger then start parameter.</b><br>";
    echo "<b style='color:red;'>Set please correct values.</b><br>";
}

/**
 * Calculate and create array using START and END parameters
 * 
 * @param integer $start
 * @param integer $end
 * @return array
 */
function calculateArray($start, $end) {
    $mass = [];
    for ($i = $start; $i <= $end; $i++) {
        for ($j = $start; $j <= $end; $j++) {
            $mass[$i][$j] = $i * $j;
        }
    }

    return $mass;
}

?>

<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset = "UTF-8">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <meta http-equiv = "X-UA-Compatible" content = "ie=edge">
        <title>Document</title>
        <style>
            td{
                border: 1px solid #000;
                padding: 10px;
                min-width: 100px;
            }
    </style>
    </head>
    <body>
        <div>
            <form method="POST">
                <input type="text" name="start" value="<?php echo $startValue; ?>" required>
                <label>Start value</label>
                <br>
                <input type="text" name="end" value="<?php echo $endValue; ?>" required>
                <label>End value</label>
                <br>
                <button type="submit" name="action" value="calculate" class="button">Calculate</button>
            </form>
            <table>
                <?php
                    foreach ($mass as $key => $value) {
                        echo "<tr>";
                        foreach ($value as $k2 => $v2) {
                            echo "<td>";
                            echo "$k2 * $key = " . $value[$k2] ;
                            echo "</td>";
                        }
                        echo "</tr>";
                    }
                ?>
            </table>
        </div>
    </body>
</html>
