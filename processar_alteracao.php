<?php
session_start();
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receba os dados do formulário
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

    // Atualize os dados no banco de dados
    $sql = "UPDATE usuario SET nome='$nome', cpf='$cpf', email='$email', data_nascimento='$data_nascimento', sexo='$sexo', tipo_diabetes='$tipo_diabetes', data_diagnostico='$data_diagnostico', nivel_acucar_sangue='$nivel_acucar_sangue', peso='$peso', altura='$altura', pressao_arterial='$pressao_arterial', historico_medico='$historico_medico', medicamentos='$medicamentos', alergias='$alergias' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Cadastro atualizado com sucesso!";
    } else {
        echo "Erro ao atualizar o cadastro: " . $conn->error;
    }
}

$conn->close();
?>
