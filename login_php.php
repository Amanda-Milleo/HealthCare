<?php
include("connection.php");
$login    = $_POST["txtLogin"];
$password = $_POST["txtLogin"];  // Corrigido para "txtSenha"?

$id = $_GET["id"];
$sql = sprintf("SELECT * FROM usuario WHERE id = %d", $id);
$result = $conn->query($sql);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login    = $_POST["Usuario"];
    $password = $_POST["Senha"];

    // Consulta preparada para evitar injeções de SQL
    $sql = "SELECT id, senha FROM usuario WHERE login = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $login);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $hashed_password);
        $stmt->fetch();
        // Verifica se a senha fornecida corresponde ao hash armazenado no banco de dados
        if (password_verify($password, $hashed_password)) {
            session_start();
            $_SESSION["id"] = $id;
            header("Location: pagina_inicial.php");
            exit(); // Termina o script após redirecionamento
        } else {
            echo "<script>alert('Usuário ou senha incorretos!');</script>";
        }
    } else {
        echo "<script>alert('Usuário não cadastrado!');</script>";
    }
}

// Se chegou até aqui, significa que o usuário não submeteu o formulário ou houve um erro.
// Nesse caso, você pode redirecioná-lo de volta à página de login.
header("Location: login.php");
exit();
