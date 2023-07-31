<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Calculate the sum of the sequence of numbers</title>
</head>
<body>
    <h2>Enter a positive integer</h2>
    <form action="tong.php" method="post">
        <label for="number">Integer:</label>
        <input type="number" id="number" name="number" required>
        <input type="submit" value="Total">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $number = $_POST["number"];
        if ($number <= 0) {
            echo "<p>Please enter a positive integer.</p>";
        } else {
            // Tính tổng dãy số từ 1 đến số vừa nhập
            $sumAll = 0;
            for ($i = 1; $i <= $number; $i++) {
                $sumAll += $i;
            }

            // Tính tổng dãy số chẳn từ 1 đến số vừa nhập
            $sumEven = 0;
            for ($i = 2; $i <= $number; $i += 2) {
                $sumEven += $i;
            }

            // Tính tổng dãy số lẻ từ 1 đến số vừa nhập
            $sumOdd = 0;
            for ($i = 1; $i <= $number; $i += 2) {
                $sumOdd += $i;
            }

            // Hiển thị kết quả
            echo "<h2>Result</h2>";
            echo "Sum of numbers from 1 to " . $number . " là: " . implode(" + ", range(1, $number)) . " = " . $sumAll . "<br>";
            echo "Sum of even numbers from 1 to " . $number . " là: " . implode(" + ", range(2, $number, 2)) . " = " . $sumEven . "<br>";
            echo "Sum of odd numbers from 1 to " . $number . " là: " . implode(" + ", range(1, $number, 2)) . " = " . $sumOdd . "<br>";
        }
    }
    ?>
</body>
</html>
