<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir</title>
    <style>
        body {
            background-color: #fff; 
            color: #000; 
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        h1 {
            color: #fa8072; 
        }

        form {
            max-width: 600px;
            margin: 0 auto;
        }

        b {
            color: #fa8072; 
        }

        input {
            padding: 8px;
            margin-bottom: 10px;
            width: 100%;
            box-sizing: border-box;
            border: 1px solid #000; 
        }

        input[type="submit"] {
            background-color: #fa8072; 
            color: #fff; 
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #dc143c; 
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
            $id = $row["id"];
            $nome = $row["nome"];
            $cpf = $row["cpf"];
            $email = $row["email"];
            $data_nascimento = $row["data_nascimento"];
            $sexo = $row["sexo"];
            $tipo_diabetes = $row["tipo_diabetes"];
            $data_diagnostico = $row["data_diagnostico"];
            $nivel_acucar_sangue = $row["nivel_acucar_sangue"];
            $peso = $row["peso"];
            $altura = $row["altura"];
            $pressao_arterial = $row["pressao_arterial"];
            $historico_medico = $row["historico_medico"];
            $medicamentos = $row["medicamentos"];
            $alergias = $row["alergias"];
        }
    }
?>
    <h1>Excluir cadastro</h1>
    <form name="form1" id="form1" method="post" action="usu_excluir_php.php">
        <b>Nome:</b><br>
        <input type="text" name="txtNome" value="<?php echo $nome?>"><br>
        <b>Cpf:</b><br>
        <input type="text" name="txtCpf" value="<?php echo $cpf?>"><br>
        <b>Email:</b><br>
        <input type="text" name="txtEmail" value="<?php echo $email?>"><br>
        <b>Data de nascimento:</b><br>
        <input type="text" name="txtData_nascimento" value="<?php echo $data_nascimento?>"><br>
        <b>Sexo:</b><br>
        <input type="text" name="txtSexo" value="<?php echo $sexo?>"><br>
        <b>Tipo de diabetes:</b><br>
        <input type="text" name="txtTipo_diabetes" value="<?php echo $tipo_diabetes?>"><br>
        <b>Data de diagnóstico:</b><br>
        <input type="text" name="txtData_diagnostico" value="<?php echo $data_diagnostico?>"><br>
        <b>Nível de açucar no sangue:</b><br>
        <input type="text" name="txtNivel_acucar_sangue" value="<?php echo $nivel_acucar_sangue?>"><br>
        <b>Peso:</b><br>
        <input type="text" name="txtPeso" value="<?php echo $peso?>"><br>
        <b>Altura:</b><br>
        <input type="text" name="txtAltura" value="<?php echo $altura?>"><br>
        <b>Pressão arterial:</b><br>
        <input type="text" name="txtPressao_arterial" value="<?php echo $pressao_arterial?>"><br>
        <b>Histórico médico:</b><br>
        <input type="text" name="txtHistorico_medico" value="<?php echo $historico_medico?>"><br>
        <b>Medicamentos:</b><br>
        <input type="text" name="txtMedicamentos" value="<?php echo $medicamentos?>"><br>
        <b>Alergias:</b><br>
        <input type="text" name="txtAlergias" value="<?php echo $alergias?>"><br>
        <input type="hidden" name="hidId" value="<?php echo $id?>"><br>
        <input type="submit" value="Excluir">
    </form>
</body>
</html>
