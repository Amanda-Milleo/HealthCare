<?php
include("connection.php");

$id = $_POST["hidId"];
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

$sql = $sql = "UPDATE usuario SET nome = '$nome', email = '$email', cpf = '$cpf', data_nascimento = '$data_nascimento', sexo = '$sexo', tipo_diabetes = '$tipo_diabetes', data_diagnostico = '$data_diagnostico', nivel_acucar_sangue = '$nivel_acucar_sangue', peso = '$peso', altura = '$altura', pressao_arterial = '$pressao_arterial', historico_medico = '$historico_medico', medicamentos = '$medicamentos', alergias = '$alergias' WHERE id = $id";
$result = $conn->query($sql);
if ($result == TRUE) {
?>
<script>
    alert("Dados alterados com sucesso!");
    location.href = "banco.php";
</script>
<?php
}
else {
    echo "Algo deu errado!";
 }
?>