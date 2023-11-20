<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuário</title>
    <style>
        body {
            background-color: #fff; 
            color: #000; 
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px; 
        }

        h1 {
            color: #fa8072;
        }

        .user-info {
            margin-bottom: 20px;
            border: 1px solid #000; 
            padding: 10px;
            background-color: #fa8072; 
            color: #fff; 
        }
    </style>
</head>
<body>
<?php
    include("connection.php");
    $id = $_GET["id"];
    $sql = sprintf("SELECT * FROM usuario WHERE id = %d", $id);
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="user-info">';
            echo sprintf("<b>Id:</b> %d<br>", $row['id']);
            echo sprintf("<b>Nome:</b> %s<br>", $row['nome']);
            echo sprintf("<b>Cpf:</b> %s<br>", $row['cpf']);
            echo sprintf("<b>Data de nascimento:</b> %s<br>", $row['data_nascimento']);
            echo sprintf("<b>Sexo:</b> %s<br>", $row['sexo']);
            echo sprintf("<b>Tipo de diabetes:</b> %s<br>", $row['tipo_diabetes']);
            echo sprintf("<b>Data de diagnostico:</b> %s<br>", $row['data_diagnostico']);
            echo sprintf("<b>Nivel de açúcar no sangue:</b> %s<br>", $row['nivel_acucar_sangue']);
            echo sprintf("<b>Peso:</b> %s<br>", $row['peso']);
            echo sprintf("<b>Altura:</b> %s<br>", $row['altura']);
            echo sprintf("<b>Pressao arterial:</b> %s<br>", $row['pressao_arterial']);
            echo sprintf("<b>Histórico médico:</b> %s<br>", $row['altura']);
            echo sprintf("<b>Medicamentos:</b> %s<br>", $row['altura']);
            echo sprintf("<b>Alergias:</b> %s<br>", $row['alergias']);
            echo '</div>';
        }
    }
?>
</body>
</html>
