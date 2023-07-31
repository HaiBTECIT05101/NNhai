<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Calculate Sum of Numbers</title>
</head>
<body>
    <h2>Enter two positive integers a and b</h2>
    <form action="tinhtong.php" method="post">
        <label for="a">Number a:</label>
        <input type="number" id="a" name="a" required>
        <br>

        <label for="b">Number b:</label>
        <input type="number" id="b" name="b" required>
        <br>

        <input type="submit" value="Calculate Sum">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $a = $_POST["a"];
        $b = $_POST["b"];
        if ($a <= 0 || $b <= 0 || $b <= $a) {
            echo "<p>Please enter two positive integers with b greater than a.</p>";
        } else {
            // Calculate sum of numbers from a to b
            $sumAll = 0;
            for ($i = $a; $i <= $b; $i++) {
                $sumAll += $i;
            }

            // Calculate sum of even numbers from a to b
            $sumEven = 0;
            for ($i = $a + ($a % 2); $i <= $b; $i += 2) {
                $sumEven += $i;
            }

            // Calculate sum of odd numbers from a to b
            $sumOdd = 0;
            for ($i = $a + (1 - $a % 2); $i <= $b; $i += 2) {
                $sumOdd += $i;
            }

            // Display the results
            echo "<h2>Results</h2>";
            echo "Sum of numbers from " . $a . " to " . $b . " is: " . implode(" + ", range($a, $b)) . " = " . $sumAll . "<br>";
            echo "Sum of even numbers from " . $a . " to " . $b . " is: " . implode(" + ", range($a + ($a % 2), $b, 2)) . " = " . $sumEven . "<br>";
            echo "Sum of odd numbers from " . $a . " to " . $b . " is: " . implode(" + ", range($a + (1 - $a % 2), $b, 2)) . " = " . $sumOdd . "<br>";
        }
    }
    ?>
</body>
</html>

</html>

