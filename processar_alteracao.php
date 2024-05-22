<?php
session_start();
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $data_nascimento = $_POST['data_nascimento'];
    $sexo = $_POST['sexo'];
    $tipo_diabetes = $_POST['tipo_diabetes'];
    $data_diagnostico = $_POST['data_diagnostico'];
    $nivel_acucar_sangue = $_POST['nivel_acucar_sangue'];
    $peso = $_POST['peso'];
    $altura = $_POST['altura'];
    $pressao_arterial = $_POST['pressao_arterial'];
    $historico_medico = $_POST['historico_medico'];
    $medicamentos = $_POST['medicamentos'];
    $alergias = $_POST['alergias'];

    $sql = "UPDATE usuario SET nome='$nome', cpf='$cpf', email='$email', data_nascimento='$data_nascimento', sexo='$sexo', tipo_diabetes='$tipo_diabetes', data_diagnostico='$data_diagnostico', nivel_acucar_sangue='$nivel_acucar_sangue', peso='$peso', altura='$altura', pressao_arterial='$pressao_arterial', historico_medico='$historico_medico', medicamentos='$medicamentos', alergias='$alergias' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        $mensagem = "<p class='success-message'>Cadastro atualizado com sucesso!</p>";
    } else {
        $mensagem = "<p class='error-message'>Erro ao atualizar o cadastro: " . $conn->error . "</p>";
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Processar Cadastro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
            background-color: #f4f4f4;
            text-align: center;
        }

        h1 {
            color: #333;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 0 auto;
            max-width: 600px;
        }

        .success-message {
            color: green;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .error-message {
            color: red;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            background-color: #333;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }

        .button:hover {
            background-color: #555;
        }

    </style>
</head>
<body>
    <div class="container">
        <h1>Processando Cadastro...</h1>
        <?php 
            if (isset($mensagem)) {
                echo $mensagem; 
            }
        ?>
         <a href="pagina_inicial.php" class="button">Voltar para a Página Inicial</a>
    </div>
</body>
</html>