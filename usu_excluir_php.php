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

$sql = "DELETE FROM usuario WHERE id = $id";
$result = $conn->query($sql);

if ($result === TRUE) {
?>
<script>
    alert("Confirma a exclusão desse cadastro?");
    location.href = "banco.php";
</script>
<?php
}
else {
    echo "Algo deu errado!";
 }
?>