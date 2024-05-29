<!DOCTYPE html>
<html lang="pt-br">
<?php
session_start();
include("connection.php");

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

// Recupera o ID do usuário logado da sessão
$usuario_id = $_SESSION['usuario_id'];

// Consulta o banco de dados para obter os dados do usuário logado
$sql = "SELECT * FROM usuario WHERE id = $usuario_id";
$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
    $row = $resultado->fetch_assoc();

    // Atribui os valores às variáveis para exibir no formulário de alteração
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
    
} else {
    echo "Usuário não encontrado!";
    exit;
}

$conn->close();
?>
<head>
    <meta charset="UTF-8">
    <title>Alterar Cadastro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
            background-color: #f4f4f4;
        }

        h1 {
            color: #333;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input[type="text"],
        input[type="email"],
        input[type="date"],
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 3px;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Alterar Cadastro</h1>
    <form action="processar_alteracao.php" method="POST" onsubmit="return validateForm()">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        Nome: <input type="text" id="nome" name="nome" value="<?php echo $nome; ?>" required><br>
        CPF: <input type="text" id="cpf" name="cpf" value="<?php echo $cpf; ?>" required pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" oninput="formatarCPF(this)">
        Email: <input type="email" id="email" name="email" value="<?php echo $email; ?>" required pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}"><br>
        Data de Nascimento: <input type="date" name="data_nascimento" value="<?php echo $data_nascimento; ?>"><br>
        Sexo: <input type="text" id="sexo" name="sexo" value="<?php echo $sexo; ?>" required pattern="[MFmf]{1}" maxlength="1" oninput="this.value = this.value.toUpperCase()"><br>
        Tipo de Diabetes: <input type="text" name="tipo_diabetes" value="<?php echo $tipo_diabetes; ?>"><br>
        Data do Diagnóstico: <input type="date" name="data_diagnostico" value="<?php echo $data_diagnostico; ?>"><br>
        Nível de Açúcar no Sangue: <input type="text" name="nivel_acucar_sangue" value="<?php echo $nivel_acucar_sangue; ?>"><br>
        Peso: <input type="text" name="peso" value="<?php echo $peso; ?>"><br>
        Altura: <input type="text" name="altura" value="<?php echo $altura; ?>"><br>
        Pressão Arterial: <input type="text" name="pressao_arterial" value="<?php echo $pressao_arterial; ?>"><br>
        Histórico Médico: <textarea name="historico_medico"><?php echo $historico_medico; ?></textarea><br>
        Medicamentos: <textarea name="medicamentos"><?php echo $medicamentos; ?></textarea><br>
        Alergias: <textarea name="alergias"><?php echo $alergias; ?></textarea><br>
        <input type="submit" value="Salvar Alterações">
    </form>
</body>
</html>
<script>
    function formatarCPF(campo) {
        var cpf = campo.value.replace(/\D/g, '');
        cpf = cpf.slice(0, 11);
        if (cpf.length > 0) {
            cpf = cpf.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, "$1.$2.$3-$4");
        }
        campo.value = cpf;
    }

    function validateForm() {
        var nome = document.getElementById("nome").value;
        var email = document.getElementById("email").value;
        var cpf = document.getElementById("cpf").value;
        var sexo = document.getElementById("sexo").value.toUpperCase();

        if (nome === "" || email === "" || cpf === "" || sexo === "") {
            alert("Por favor, preencha todos os campos.");
            return false;
        }

        var emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        if (!emailRegex.test(email)) {
            alert("Por favor, insira um e-mail válido.");
            return false;
        }

        var cpfRegex = /^\d{3}\.\d{3}\.\d{3}-\d{2}$/;
        if (!cpfRegex.test(cpf)) {
            alert("Por favor, insira um CPF válido.");
            return false;
        }

        var sexoRegex = /^[MF]$/;
        if (!sexoRegex.test(sexo)) {
            alert("Por favor, insira um sexo válido (M ou F).");
            return false;
        }

        return true;
    }
</script>

