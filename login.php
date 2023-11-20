<!DOCTYPE html>
<html lang = "pt-br">
<head>
    <meta charset = "UTF-8">
    <meta name    = "viewport" content = "width=device-width, initial-scale=1.0">
    <title>Página de login</title>
    <style>
        body {
            background-color: #fff;
            color           : #000;
            font-family     : Arial, sans-serif;
            margin          : 0;
            padding         : 0;
            display         : flex;
            align-items     : center;
            justify-content : center;
            height          : 100vh;
        }

        .login-container {
            background-color: #fa8072;
            padding         : 20px;
            border-radius   : 8px;
            box-shadow      : 0 0 10px rgba(0, 0, 0, 0.1);
            width           : 300px;
            text-align      : center;
        }

        .logo-container {
            margin-bottom: 20px;
        }

        .logo {
            max-width: 100%;  
            height   : auto; 
        }

        h2 {
            color: #fff;
        }

        input {
            padding   : 10px;
            margin    : 10px 0;
            width     : 100%;
            box-sizing: border-box;
            border    : 1px solid #000;
        }

        input[type="submit"] {
            background-color: #000;
            color           : #fff;
            cursor          : pointer;
        }

        input[type="submit"]:hover {
            background-color: #333;
        }

        .create-account-btn {
            display         : inline-block;
            margin-top      : 10px;
            padding         : 10px;
            background-color: #fff;
            color           : #000;
            text-decoration : none;
            border          : 1px solid #000;
            border-radius   : 5px;
        }

        .create-account-btn:hover {
            background-color: #000;
            color           : #fff;
        }
    </style>
</head>
<body>
    <div class = "login-container">
    <div class = "logo-container">
    <img src   = "logo looker.png" alt = "Logo" class = "logo">
        </div>
        <h2>Login</h2>
        <form  action = "pagina_inicial.php" method = "post">
        <input type   = "text" name                 = "username" placeholder = "Username" required>
        <input type   = "password" name             = "password" placeholder = "Password" required>
        <input type   = "submit" value              = "Login">
        </form>
        <a href="usu_cad.php" class="create-account-btn">Criar cadastro</a>
    </div>
</body>
</html>
