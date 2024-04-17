<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Cadastro de Usuário</title>
    <style>
        body {
            background-color: #DCDCDC;
            color: #333;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #66CDAA;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: black;
            margin-bottom: 20px;
            text-align: center;
        }

        form {
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"],
        input[type="date"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #fa8072;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #dc143c;
        }

        small {
            color: #6c757d;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Cadastro do Usuário</h2>
        <form name="form1" id="form1" onsubmit="return validateForm()" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="nome">Usuario:</label>
                <input type="text" id="nome" name="txtNome" required>
            </div>
            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input type="text" id="cpf" name="txtCPF" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}"
                    oninput="formatarCampo('cpf', '###.###.###-##')" required>
                <small>Formato: 123.456.789-01</small>
            </div>
            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="text" id="senha" name="txtSenha" required>
            </div>
            <button type="submit">Enviar</button>
        </form>
    </div>

    <script>
        function validateForm() {
            // Implemente sua lógica de validação aqui, se necessário
            return true; // Temporário, sempre envia o formulário para fins de demonstração
        }

        function formatarCampo(idCampo, mascara) {
            var campo = document.getElementById(idCampo);
            var valorCampo = campo.value.replace(/\D/g, "");
            var mascaraArray = mascara.split("");
            var valorFormatado = "";

            for (var i = 0, j = 0; i < mascaraArray.length && j < valorCampo.length; i++) {
                if (mascaraArray[i] === "#") {
                    valorFormatado += valorCampo[j++];
                } else {
                    valorFormatado += mascaraArray[i];
                }
            }

            campo.value = valorFormatado;
        }
    </script>

    <?php
    include("connection.php");

    // Processamento do formulário e inserção no banco de dados
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recuperando dados do formulário
        $nome = $_POST['txtNome'];
        $cpf = $_POST['txtCPF'];
        $senha = $_POST['txtSenha'];

        // Verificando se já existe um cadastro com mesmo nome de usuário ou CPF
        $checkQuery = "SELECT id FROM usuario WHERE nome = ? OR cpf = ?";
        $checkStmt = $conn->prepare($checkQuery);
        $checkStmt->bind_param("ss", $nome, $cpf);
        $checkStmt->execute();
        $checkResult = $checkStmt->get_result();

        if ($checkResult->num_rows > 0) {
            echo "<script>alert('Já existe um cadastro com esse nome de usuário ou CPF!');</script>";
        } else {
            // Inserindo dados no banco de dados
            $insertQuery = "INSERT INTO usuario (nome, cpf, senha) VALUES (?, ?, ?)";
            $insertStmt = $conn->prepare($insertQuery);
            $insertStmt->bind_param("sss", $nome, $cpf, $senha);

            if ($insertStmt->execute()) {
                echo "<script>alert('Cadastro realizado com sucesso!');</script>";
            } else {
                echo "Erro ao cadastrar: " . $insertStmt->error;
            }

            $insertStmt->close();
        }

        $checkStmt->close();
        $conn->close();
    }
    ?>

</body>

</html>
