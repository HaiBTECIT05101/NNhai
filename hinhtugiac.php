<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Calculate Area and Perimeter of Quadrilateral</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 400px;
            width: 100%;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-size: 14px;
            margin-bottom: 5px;
        }

        input[type="number"] {
            width: 100%;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .results {
            margin-top: 20px;
            font-size: 16px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Enter two sides of the quadrilateral</h2>
        <form action="hinhtugiac.php" method="post">
            <div class="form-group">
                <label for="cd">Side cd:</label>
                <input type="number" id="cd" name="cd" required>
            </div>

            <div class="form-group">
                <label for="cr">Side cr:</label>
                <input type="number" id="cr" name="cr" required>
            </div>

            <input type="submit" value="Calculate Area and Perimeter">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $cd = $_POST["cd"];
            $cr = $_POST["cr"];

            function calculateArea($cd, $cr) {
                return $cd * $cr;
            }

            function calculatePerimeter($cd, $cr) {
                return 2 * ($cd + $cr);
            }

            function isSquare($cd, $cr) {
                return $cd == $cr;
            }

            $area = calculateArea($cd, $cr);
            $perimeter = calculatePerimeter($cd, $cr);

            echo "<div class='results'>";
            echo "This is " . (isSquare($cd, $cr) ? "a square" : "a rectangle") . "<br>";
            echo "Area: " . $area . "<br>";
            echo "Perimeter: " . $perimeter . "<br>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>
