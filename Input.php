<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Đăng nhập</title>
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

        input[type="text"],
        input[type="password"] {
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
        <h2>Đăng nhập</h2>
        <form action="login_process.php" method="post" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="username">Tên đăng nhập:</label>
                <input type="text" id="username" name="username" required>
                <span id="username-error" class="error-message"></span>
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu:</label>
                <input type="password" id="password" name="password" required>
                <span id="password-error" class="error-message"></span>
            </div>
            <div class="form-group">
                <input type="submit" value="Đăng nhập">
            </div>
        </form>
    </div>

    <script>
        function validateForm() {
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;
            var valid = true;

            if (username.trim() === "") {
                document.getElementById("username-error").innerText = "Vui lòng nhập tên đăng nhập.";
                valid = false;
            } else {
                document.getElementById("username-error").innerText = "";
            }

            if (password.trim() === "") {
                document.getElementById("password-error").innerText = "Vui lòng nhập mật khẩu.";
                valid = false;
            } else {
                document.getElementById("password-error").innerText = "";
            }

            return valid;
        }
    </script>
</body>

</html>
