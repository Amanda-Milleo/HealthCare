<?php
include("connection.php");
$login    = $_POST["txtLogin"];
$password = $_POST["txtLogin"];  // Corrigido para "txtSenha"?

$id = $_GET["id"];
$sql = sprintf("SELECT * FROM usuario WHERE id = %d", $id);
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if ($row["senha"] == $password) {
            session_start();
            $_SESSION["id"] = $row["id"];
            header("Location: login.php");
        } else {
            ?>
            <script>
                alert("Senha não confere!");
                history.go(-1);
            </script>
            <?php
        }
    }
} else {
    ?>
    <script>
        alert("Usuário não cadastrado");
        window.location.href = "banco.php";
    </script>
    <?php
}
?>
