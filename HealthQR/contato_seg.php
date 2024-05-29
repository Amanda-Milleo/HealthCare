<?php
session_start(); 
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php"); 
    exit();
}

$servername = "localhost"; 
$username = "amanda";
$password = "amanda"; 
$dbname = "projeto"; 

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "<p style='color: red; text-align: center;'>Erro na conexão com o banco de dados: " . $e->getMessage() . "</p>";
    exit();
}

$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $id_usuario = $_SESSION['usuario_id'];
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $telefone = $_POST["telefone"];

        if (!preg_match("/^[a-zA-ZÀ-ÿ\s]{2,}$/", $nome)) {
            throw new Exception("Por favor, insira um nome válido.");
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Por favor, insira um e-mail válido.");
        }
        if (!preg_match("/^\(?([1-9]{2})\)? ?(?:[2-8]|9[1-9])[0-9]{3}-?[0-9]{4}$/", $telefone)) {
            throw new Exception("Por favor, insira um telefone válido.");
        }

        $sql = "INSERT INTO contato_emergencia (nome, email, telefone, id_usuario) 
                VALUES (:nome, :email, :telefone, :id_usuario)"; 
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':id_usuario', $id_usuario);

        $stmt->execute();

        $message = "<p style='color: green; text-align: center;'>Novo contato de emergência cadastrado com sucesso!</p>";

    } catch(PDOException $e) {
        $message = "<p style='color: red; text-align: center;'>Erro ao cadastrar contato: " . $e->getMessage() . "</p>";
    } catch(Exception $e) {
        $message = "<p style='color: red; text-align: center;'>Erro: " . $e->getMessage() . "</p>";
    }
}

$id_usuario = $_SESSION['usuario_id'];
$sql = "SELECT * FROM contato_emergencia WHERE id_usuario = :id_usuario";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id_usuario', $id_usuario);
$stmt->execute();
$contatos = $stmt->fetchAll(PDO::FETCH_ASSOC);

$conn = null; 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Contato de Emergência</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body, html {
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif; 
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        body {
            background: white;
            color: white;
        }

        .header {
            width: 100%;
            height: 80px;
            background: #3CB371;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
            box-sizing: border-box;
        }

        .header img {
            width: 88px;
            height: 68px;
        }

        .menu {
            width: 100%; 
            height: 60px;
            background: #333; 
            display: flex;
            justify-content: space-around;
            align-items: center;
            padding: 0 20px; 
            box-sizing: border-box; 
        }

        .menu a {
            color: white;
            text-decoration: none;
            font-size: 18px;
            font-family: Arial, sans-serif;
            font-weight: bold;
        }

        .menu-usuario {
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            background: linear-gradient(to right, #7cb342, #558b2f); 
            padding: 10px 15px;
            border-radius: 5px;
            transition: all 0.3s ease;
            cursor: pointer;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            font-size: 16px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .menu-usuario:hover {
            background: linear-gradient(to right, #0056b3, #007bff); 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); 
            transform: scale(1.05); 
        }

        .menu-usuario::before {
            content: "\f007"; 
            font-family: "Font Awesome 5 Free";
            margin-right: 8px; 
        }

        .menu-usuario-content {
            display: none;
            position: absolute;
            background: linear-gradient(to bottom, #333, #666);
            min-width: 160px;
            z-index: 1;
            margin-top: 10px; 
            top: 60px; 
            border: 1px solid #666; 
            border-radius: 5px; 
            padding: 10px; 
        }

        .menu-usuario-content a {
            color: white;
            padding: 10px 20px; 
            text-decoration: none;
            display: block;
            font-size: 14px; 
            transition: background-color 0.3s; 
        }

        .menu-usuario-content a:hover {
            background-color: #555; 
        }

        .menu-usuario.active .menu-usuario-content {
            display: block;
        }

        .main-content {
            width: 80%; 
            margin: 30px auto; 
            padding: 40px;
            background-color: rgba(0, 0, 0, 0.9); 
            color: #FFFFFF;
            border-radius: 20px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.5);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        h2 {
            color: #3CB371; 
            margin-bottom: 30px;
            text-align: center;
        }

        form {
            width: 100%; 
            max-width: 600px; 
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #fff; 
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            color: black;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50; 
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049; 
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px 0;
            margin-top: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #3CB371;
            color: white;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="menu-usuario">
            <a href="#" onclick="toggleMenu()">Menu <i class="fas fa-chevron-down"></i></a>
            <div class="menu-usuario-content">
                <a href="banco.php"><i class="fas fa-users"></i> Usuários</a>
                <a href="usu_edit.php"><i class="fas fa-user-edit"></i> Editar Cadastro</a>
                <a href="primeiros_soc.php"><i class="fas fa-plus-square"></i> Suporte Emergencial</a>
            </div>
        </div>
        <img src="logo looker.png" alt="Logo">
    </div>
    <div class="menu">
        <a href="usu_cad.php">Seu Cadastro</a> 
        <a href="contato_seg.php">Adicionar Contato de Segurança</a>
        <a href="qrcode.php">QR Code</a>
        <a href="primeiros_soc.php">Registro de Saúde</a>
    </div>

    <div class="main-content">
        <h2>Cadastrar Contato de Emergência</h2>
        <?php echo $message; ?>
        <form id="form1" name="form1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" required pattern="[a-zA-ZÀ-ÿ\s]{2,}">
            </div>
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="telefone">Telefone:</label>
                <input type="tel" class="form-control" id="telefone" name="telefone" required pattern="\(?([1-9]{2})\)? ?(?:[2-8]|9[1-9])[0-9]{3}-?[0-9]{4}">
            </div>
            <input type="submit" class="btn btn-primary" value="Cadastrar Contato">
        </form>
        <button id="mostrar-contatos" style="padding: 10px 20px;
                background-color: #008CBA; 
                color: #fff;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                margin-top: 20px;">Mostrar Meus Contatos</button>
    </div>

    <div class="main-content" id="contatos-section" style="display: none;">
        <h2>Contatos de Emergência</h2>
        <?php if (!empty($contatos)): ?>
            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Telefone</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($contatos as $contato): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($contato['nome']); ?></td>
                            <td><?php echo htmlspecialchars($contato['email']); ?></td>
                            <td><?php echo htmlspecialchars($contato['telefone']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Nenhum contato de emergência cadastrado.</p>
        <?php endif; ?>
    </div>

    <footer>
        <nav>
            <a href="#">Sobre</a>
            <a href="#">Contato</a>
            <a href="#">Termos de uso</a>
            <a href="#">Política de privacidade</a>
        </nav>
        <p>© 2024 HealthQR.com. Todos os direitos reservados.</p>
    </footer>

    <script>
        function toggleMenu() {
            const menuUsuario = document.querySelector('.menu-usuario');
            menuUsuario.classList.toggle('active');
        }

        document.addEventListener('click', function(event) {
            const menuUsuario = document.querySelector('.menu-usuario');
            if (!menuUsuario.contains(event.target)) {
                menuUsuario.classList.remove('active');
            }
        });

        const btnMostrarContatos = document.getElementById('mostrar-contatos');
        const contatosSection = document.getElementById('contatos-section');

        btnMostrarContatos.addEventListener('click', (event) => {
            event.preventDefault();
            if (contatosSection.style.display === 'none') {
                contatosSection.style.display = 'block';
                btnMostrarContatos.textContent = 'Esconder Contatos';
            } else {
                contatosSection.style.display = 'none';
                btnMostrarContatos.textContent = 'Mostrar Meus Contatos';
            }
        });
    </script>
</body>
</html>