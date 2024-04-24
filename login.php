<?php
session_start(); // Inicia a sessão para armazenar informações do usuário logado

include("connection.php");

// Verifica se o formulário de login foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['Usuario'];
    $senha = $_POST['Senha'];

    // Consulta no banco de dados para verificar se o usuário e a senha correspondem a um registro
    $sql = "SELECT id, nome FROM usuario WHERE nome = ? AND senha = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $usuario, $senha);
    $stmt->execute();
    $result = $stmt->get_result();

if ($result->num_rows > 0) {
        // Com o Usuário autenticado com sucesso, redireciona para a página inicial
        $row = $result->fetch_assoc();
        $_SESSION['usuario_id'] = $row['id'];
        $_SESSION['usuario_nome'] = $row['nome'];
        header("Location: pagina_inicial.php");
        exit();
    } else {
        $loginError = "Usuário ou senha incorretos";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realize Seu Login</title>
    <style>
        body {
            background-color: #DCDCDC;
            color: #000;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .login-container {
            background-color: #66CDAA;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
            margin: auto;
        }

        .logo-container {
            margin-bottom: 20px;
        }

        .logo {
            max-width: 100%;
            height: auto;
        }

        h2 {
            color: #fff;
        }

        input {
            padding: 10px;
            margin: 10px 0;
            width: 100%;
            box-sizing: border-box;
            border: 1px solid #000;
        }

        input[type="submit"] {
            background-color: #000;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #333;
        }

        .create-account-btn {
            display: inline-block;
            margin-top: 10px;
            padding: 10px;
            background-color: #fff;
            color: #000;
            text-decoration: none;
            border: 1px solid #000;
            border-radius: 5px;
        }

        .create-account-btn:hover {
            background-color: #000;
            color: #fff;
        }

        .error-message {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <!-- Se houver um erro de login, exibe a mensagem -->
        <?php if (isset($loginError)) : ?>
            <div class="error-message"><?php echo $loginError; ?></div>
        <?php endif; ?>

        <div class="logo-container">
            <img src="logo looker.png" alt="Logo" class="logo">
        </div>
        <h2>Faça o Login:</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="text" name="Usuario" placeholder="Usuário" required>
            <br><br>
            <input type="password" name="Senha" placeholder="Senha" required>
            <br><br>
            <input type="submit" value="Entrar">
        </form>
        <br>
        <a href="cad_login.php" class="create-account-btn">Se Cadastrar</a>
    </div>
</body>

</html>
