<?php
session_start(); 

include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") { // Verifica se a requisição é do tipo POST e obtem os campos Nome, CPF e senha
    $nome = $_POST['txtNome'];
    $cpf = $_POST['txtCPF'];
    $senha = $_POST['txtSenha'];

    // Verifica se já existe um cadastro com o mesmo nome de usuário ou CPF
    $checkQuery = "SELECT id, nome FROM usuario WHERE nome = ? OR cpf = ?";
    $checkStmt = $conn->prepare($checkQuery);
    $checkStmt->bind_param("ss", $nome, $cpf);
    $checkStmt->execute();
    $checkResult = $checkStmt->get_result();

    if ($checkResult->num_rows > 0) { // Se já existe cadastro, exibe um alerta em JavaScript
        echo "<script>alert('Já existe um cadastro com esse nome de usuário ou CPF!');</script>";
    } else { // Se não existe cadastro, realiza a inserção na tabela 'usuario'
        $insertQuery = "INSERT INTO usuario (nome, cpf, senha) VALUES (?, ?, ?)";
        $insertStmt = $conn->prepare($insertQuery);
        $insertStmt->bind_param("sss", $nome, $cpf, $senha);

        if ($insertStmt->execute()) {  // Se a inserção for bem-sucedida
            $insertStmt->close();

             // Obtém o ID e o nome do usuário recém-cadastrado
            $getIdQuery = "SELECT id, nome FROM usuario WHERE nome = ?";

            // Prepara a declaração SQL para execução
            $getIdStmt = $conn->prepare($getIdQuery);

            // Vincula o valor do nome recebido do formulário ao parâmetro '?' na consulta SQL
            $getIdStmt->bind_param("s", $nome);

            // Executa a consulta preparada
            $getIdStmt->execute();
            
            // Obtém o resultado da consulta
            $idResult = $getIdStmt->get_result();

            if ($idResult->num_rows > 0) { // Se encontrar o usuário, armazena na sessão e redireciona
                $row = $idResult->fetch_assoc();
                $_SESSION['usuario_id'] = $row['id'];
                $_SESSION['usuario_nome'] = $row['nome'];
                header("Location: pagina_inicial.php");
                exit();
            } else {
                echo "Erro ao buscar informações do usuário recém-cadastrado.";
            }

            $getIdStmt->close();
        } else { // Se houver erro na inserção, exibe o erro
            echo "Erro ao cadastrar: " . $insertStmt->error;
        }

        $insertStmt->close();
    }

    $checkStmt->close();
    $conn->close();
}
?>


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
            <a href="login.php">Fazer Login</a>
        </form>
    </div>
    <script>
        function validateForm() {
            return true; 
        }

        // Função para formatar o campo com uma máscara específica
        function formatarCampo(idCampo, mascara) {
            // Obtém o elemento do campo pelo ID
            var campo = document.getElementById(idCampo);

            // Remove todos os caracteres não numéricos do valor do campo
            var valorCampo = campo.value.replace(/\D/g, "");

            // Converte a máscara em um array de caracteres
            var mascaraArray = mascara.split("");

            // Variável para armazenar o valor formatado final
            var valorFormatado = "";

            // Loop para percorrer a máscara e o valor do campo
            for (var i = 0, j = 0; i < mascaraArray.length && j < valorCampo.length; i++) {
                // Se encontrar um caracter '#' na máscara, adiciona o próximo dígito do valor do campo
                if (mascaraArray[i] === "#") {
                    valorFormatado += valorCampo[j++];
                } else {
                    // Caso contrário, adiciona o caracter da máscara diretamente ao valor formatado
                    valorFormatado += mascaraArray[i];
                }
            }

            // Define o valor formatado de volta ao campo
            campo.value = valorFormatado;
        }



    </script>


</body>

</html>
