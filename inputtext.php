<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Hello World Form</title>
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
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-size: 14px;
            margin-bottom: 5px;
        }

        input[type="text"] {
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

        .form-group:last-child {
            margin-bottom: 0;
        }

        .error-message {
            color: #FF0000;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Enter personal information</h2>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
                <span id="name-error" class="error-message"></span>
            </div>

            <div class="form-group">
                <label for="hobby">Favorite:</label>
                <input type="text" id="hobby" name="hobby" required>
                <span id="hobby-error" class="error-message"></span>
            </div>

            <input type="submit" value="Send">
        </form>
    </div>

    <script>
        function validateForm() {
            var name = document.getElementById("name").value;
            var hobby = document.getElementById("hobby").value;
            var valid = true;

            if (name.trim() === "") {
                document.getElementById("name-error").innerText = "Please enter your name.";
                valid = false;
            } else {
                document.getElementById("name-error").innerText = "";
            }

            if (hobby.trim() === "") {
                document.getElementById("hobby-error").innerText = "Please enter preferences.";
                valid = false;
            } else {
                document.getElementById("hobby-error").innerText = "";
            }

            return valid;
        }
    </script>
</body>
</html>
