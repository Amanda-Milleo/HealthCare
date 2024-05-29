<?php
include("connection.php");

$nome = $_POST["txtNome"];
$email = $_POST["txtEmail"];
$cpf = $_POST["txtCpf"];
$data_nascimento = $_POST["txtData_nascimento"];
$sexo = $_POST["txtSexo"];
$tipo_diabetes = $_POST["txtTipo_diabetes"];
$data_diagnostico = $_POST["txtData_diagnostico"];
$nivel_acucar_sangue = $_POST["txtNivel_acucar_sangue"];
$peso = $_POST["txtPeso"];
$altura = $_POST["txtAltura"];
$pressao_arterial = $_POST["txtPressao_arterial"];
$historico_medico = $_POST["txtHistorico_medico"];
$medicamentos= $_POST["txtMedicamentos"];
$alergias = $_POST["txtAlergias"];

$sql = "INSERT INTO usuario(nome, email, cpf, data_nascimento, sexo, tipo_diabetes, data_diagnostico, nivel_acucar_sangue, peso, altura, pressao_arterial, historico_medico, medicamentos, alergias) VALUES ('$nome', '$email', '$cpf','$data_nascimento', '$sexo', '$tipo_diabetes', '$data_diagnostico', '$nivel_acucar_sangue', '$peso', '$altura', '$pressao_arterial','$historico_medico','$medicamentos','$alergias')";
$result = $conn->query($sql);

if ($result == TRUE) {
    header("Location: pagina_inicial.php");
}
else {
    echo "Algo deu errado!";
 }
?>