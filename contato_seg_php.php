<?php
include("connection.php");

$id = $_POST["txtId_usuario"];
$nome = $_POST["txtNome_contato"];
$email = $_POST["txtEmail_contato"];
$cpf = $_POST["txtTelefone_contato"];
$Parentesco = $_POST["txtParentesco"];


$sql = "INSERT INTO informacoes_emergencia(id, nome, email, telefone, parentesco) VALUES ($Id_usuario,'$Nome_contato', '$Email', '$Telefone_contato', '$Parentesco')";
$result = $conn->query($sql);

if ($result == TRUE) {
    header("Location: pagina_inicial.php");
}
else {
    echo "Algo deu errado!";
 }
?>