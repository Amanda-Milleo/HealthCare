<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <style>
        body {
            background-color: #f5f5f5;
            color: #333;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: black;
            margin-bottom: 20px;
            text-align: center;
        }

        form {
            color: #333;
        }

        b {
            color: black;
        }

        input[type="text"],
        input[type="submit"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #fa8072;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #dc143c;
        }

        .error-message {
            color: #dc143c;
            margin-top: 5px;
            font-size: 14px;
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
    <div class="container">
        <h1>Editar cadastro</h1>
        <form name="form1" id="form1" method="post" action="usu_edit_php.php" onsubmit="return validateForm()">
            <b>Nome:</b><br>
            <input type="text" name="txtNome" value="<?php echo $nome ?>"><br>
            <b>Cpf:</b><br>
            <input type="text" name="txtCpf" value="<?php echo $cpf ?>"><br>
            <b>Email:</b><br>
            <input type="text" name="txtEmail" value="<?php echo $email ?>"><br>
            <b>Data de nascimento:</b><br>
            <input type="text" name="txtData_nascimento" value="<?php echo $data_nascimento ?>"><br>
            <b>Sexo:</b><br>
            <input type="text" name="txtSexo" value="<?php echo $sexo ?>"><br>
            <b>Tipo de diabetes:</b><br>
            <input type="text" name="txtTipo_diabetes" value="<?php echo $tipo_diabetes ?>"><br>
            <b>Data de diagnóstico:</b><br>
            <input type="text" name="txtData_diagnostico" value="<?php echo $data_diagnostico ?>"><br>
            <b>Nível de açucar no sangue:</b><br>
            <input type="text" name="txtNivel_acucar_sangue" value="<?php echo $nivel_acucar_sangue ?>"><br>
            <b>Peso:</b><br>
            <input type="text" name="txtPeso" value="<?php echo $peso ?>"><br>
            <b>Altura:</b><br>
            <input type="text" name="txtAltura" value="<?php echo $altura ?>"><br>
            <b>Pressão arterial:</b><br>
            <input type="text" name="txtPressao_arterial" value="<?php echo $pressao_arterial ?>"><br>
            <b>Histórico médico:</b><br>
            <input type="text" name="txtHistorico_medico" value="<?php echo $historico_medico ?>"><br>
            <b>Medicamentos:</b><br>
            <input type="text" name="txtMedicamentos" value="<?php echo $medicamentos ?>"><br>
            <b>Alergias:</b><br>
            <input type="text" name="txtAlergias" value="<?php echo $alergias ?>"><br>
            <input type="hidden" name="hidId" value="<?php echo $id ?>"><br>
            <button type="submit">Enviar</button>
        </form>
        <script>
            function validateForm() {
                document.getElementById("errorNome").innerHTML = "";
                document.getElementById("errorCpf").innerHTML = "";
                document.getElementById("errorEmail").innerHTML = "";

                var nome = document.getElementsByName("txtNome")[0].value;
                if (nome.trim() === "") {
                    document.getElementById("errorNome").innerHTML = "Nome não pode ser vazio";
                    return false;
                }

                var cpfRegex = /^\d{3}\.\d{3}\.\d{3}-\d{2}$/;
                var cpf = document.getElementsByName("txtCpf")[0].value;
                if (!cpfRegex.test(cpf)) {
                    document.getElementById("errorCpf").innerHTML = "CPF inválido";
                    return false;
                }

                var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                var email = document.getElementsByName("txtEmail")[0].value;
                if (!emailRegex.test(email)) {
                    document.getElementById("errorEmail").innerHTML = "Email inválido";
                    return false;
                }

                return true;
            }
        </script>
    </div>
</body>

</html>
