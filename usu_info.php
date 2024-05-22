<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informações do Usuário</title>
    <style>
        body {
            font-family: sans-serif;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        p {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        session_start();
        include("connection.php");
     

        // Verifique a conexão
        if ($conn->connect_error) {
            die("Conexão com o banco de dados falhou: " . $conn->connect_error);
        }

        if (isset($_GET['id'])) {
            $usuario_id = $_GET['id'];

            $sql = "SELECT * FROM usuario WHERE id = '$usuario_id'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                ?>
                <h1>Informações do Usuário</h1>
                <p><strong>Nome:</strong> <?php echo $row["nome"]; ?></p>
                <p><strong>CPF:</strong> <?php echo $row["cpf"]; ?></p>
                <p><strong>Email:</strong> <?php echo $row["email"]; ?></p>
                <p><strong>Data de Nascimento:</strong> <?php echo $row["data_nascimento"]; ?></p>
                <p><strong>Sexo:</strong> <?php echo $row["sexo"]; ?></p>
                <p><strong>Tipo de Diabetes:</strong> <?php echo $row["tipo_diabetes"]; ?></p>
                <p><strong>Data do Diagnóstico:</strong> <?php echo $row["data_diagnostico"]; ?></p>
                <p><strong>Nível de Açúcar no Sangue:</strong> <?php echo $row["nivel_acucar_sangue"]; ?></p>
                <p><strong>Peso:</strong> <?php echo $row["peso"]; ?></p>
                <p><strong>Altura:</strong> <?php echo $row["altura"]; ?></p>
                <p><strong>Pressão Arterial:</strong> <?php echo $row["pressao_arterial"]; ?></p>
                <p><strong>Histórico Médico:</strong> <?php echo $row["historico_medico"]; ?></p>
                <p><strong>Medicamentos:</strong> <?php echo $row["medicamentos"]; ?></p>
                <p><strong>Alergias:</strong> <?php echo $row["alergias"]; ?></p>
                <?php
            } else {
                echo "<p>Usuário não encontrado!</p>";
            }
        } else {
            echo "<p>ID de usuário não fornecido.</p>";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>