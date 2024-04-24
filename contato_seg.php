<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página inicial</title>
    <style>
        body {
            margin: 0; 
            width: 100%;
            height: 100%;
            background: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            font-family: Arial, sans-serif;
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
            margin-top: 0; 
        }

        .header img {
            width: 88px;
            height: 68px;
        }

        .main-content {
            align-self: stretch;
            justify-content: flex-start;
            align-items: flex-start;
            display: inline-flex;
        }

        .text-content {
            flex: 1 1 0;
            height: 900px;
            padding-left: 64px;
            padding-right: 80px;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
            gap: 24px;
            display: inline-flex;
        }

        .text-content .content {
            align-self: stretch;
            height: 3336px;
            flex-direction: column;
            justify-content: flex-start;
            align-items: flex-start;
            gap: 24px;
            display: flex;
        }

        .text-content .content h1 {
            color: black;
            font-size: 65px;
            font-family: Roboto;
            font-weight: 700;
            line-height: 67.20px;
            word-wrap: break-word;
        }

        .text-content .content p {
            color: black;
            font-size: px;
            font-family: Roboto;
            font-weight: 400;
            line-height: 27px;
            word-wrap: break-word;
        }

        .image-section {
            height: 900px;
            background: #F4F4F4;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            display: inline-flex;
        }

        .image-section img {
            width: 720px;
            height: 620px;
        }

        .cta-section {
            align-self: stretch;
            height: 112px;
            padding: 32px;
            background: #FA7F72;
            flex-direction: column;
            justify-content: flex-start;
            align-items: flex-start;
            gap: 48px;
            display: flex;
        }

        .cta-section .button-veja-mais,
        .cta-section .button-entrar-contato {
            padding-left: 20px;
            padding-right: 20px;
            padding-top: 8px;
            padding-bottom: 8px;
            border: 1px black solid;
            justify-content: center;
            align-items: center;
            gap: 8px;
            display: inline-flex;
            cursor: pointer;
        }

        .cta-section .button-veja-mais {
            background: none;
        }

        .cta-section .button-entrar-contato {
            background: black;
        }

        .cta-section .button-veja-mais span,
        .cta-section .button-entrar-contato span {
            color: black;
            font-size: 16px;
            font-family: Roboto;
            font-weight: 400;
            line-height: 24px;
            word-wrap: break-word;
        }

        .cta-section .button-entrar-contato span {
            color: white;
        }
        .menu {
            width: 100%;
            height: 60px;
            background: #333; 
            display: flex;
            justify-content: space-around;
            align-items: center;
            padding: 0 20px; /* Adicionado padding para espaçamento interno */
            box-sizing: border-box; /* Inclui padding na largura total */
            margin: 0; /* Removendo margem superior */
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
        }

        .menu-usuario-content {
            display: none;
            position: absolute;
            background-color: #333;
            min-width: 160px;
            z-index: 1;
            margin-top: 10px; 
            top: 60px; 
            
        }

        .menu-usuario-content a {
            color: white;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .menu-usuario.active .menu-usuario-content {
            display: block;
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
            font-weight: bold;
        }

        .main-content {
            margin: 20px;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            height: 650px;
            width: 100%;
            max-width: 600px; 
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .content {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
        }

        .content h1 {
            color: #333;
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .content p {
            color: #666;
            font-size: 18px;
            line-height: 1.6;
        }

        footer {
            width: 100%;
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            left: 0;
        }

        footer {
            width: 100%;
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px 0;
            margin-top: auto;
        }

        footer p {
            margin: 5px 0;
        }

        footer a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
        }

        footer a:hover {
            text-decoration: underline;
        }
        h2 {
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        .form-group {
            width: 100%;
            margin-bottom: 20px;
            box-sizing: border-box;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="menu-usuario">
            <a href="#" onclick="toggleMenu()">Menu</a>
            <div class="menu-usuario-content">
                <a href="login.php">Login</a> 
                <a href="banco.php">Usuarios</a> 
                <a href="usu_edit.php">Editar Cadastro</a> 
                <a href="primeiros_soc.php">Suporte Emergencial</a> 
            </div>
        </div>
        <img src="logo looker.png" alt="Logo" style="margin-left:auto;margin-right:auto;">
    </div>
    <div class="menu">
        <a href="pagina_inicial.php">Pagina Inicial</a> 
        <a href="qrcode.php">QR Code</a>
        <a href="primeiros_soc.php">Registro de Saúde</a>
    </div>

     <div class="container">
        <div class="main-content">
        <h2>Cadastrar Contato de Segurança</h2>
        <form id="form1" name="form1" onsubmit="return validateForm()" method="post" action="contato_seg_php.php">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" name="txtNome" required>
            </div>
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" class="form-control" id="email" name="txtEmail"
                    pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" required>
                <small id="emailHelp" class="form-text">Formato: email@dominio.com</small>
            </div>
            <div class="form-group">
                <label for="telefone">Telefone:</label>
                <input type="tel" class="form-control" id="telefone" name="txtTelefone"
                    pattern="\(\d{2}\) \d{4,5}-\d{4}" oninput="formatarCampo('telefone', '(##) ####-####')" required>
                <small id="telefoneHelp" class="form-text">Formato: (99) 12345-6789</small>
            </div>
            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input type="text" class="form-control" id="cpf" name="txtCPF" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}"
                    oninput="formatarCampo('cpf', '###.###.###-##')" required>
                <small id="cpfHelp" class="form-text">Formato: 123.456.789-01</small>
            </div>
            <div class="form-group">
                <label for="parentesco">Parentesco:</label>
                <input type="text" class="form-control" id="parentesco" name="txtParentesco" required>
            </div>
            <input type="submit" class="btn btn-primary" value="Enviar">
        </form>
        </div>
    </div>

    <footer>
        <nav>
            <a href="#">Sobre</a>
            <a href="#">Contato</a>
            <a href="#">Termos de uso</a>
            <a href="#">Política de privacidade</a>
        </nav>
        <p>&copy; 2024 HealthQR.com. Todos os direitos reservados.</p>
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

        function validateForm() {
            var nome = document.getElementById("nome").value;
            var email = document.getElementById("email").value;
            var telefone = document.getElementById("telefone").value;
            var cpf = document.getElementById("cpf").value;
            var parentesco = document.getElementById("parentesco").value;

            if (nome === "" || email === "" || telefone === "" || cpf === "" || parentesco === "") {
                alert("Por favor, preencha todos os campos.");
                return false;
            }

            var emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            if (!emailRegex.test(email)) {
                alert("Por favor, insira um e-mail válido.");
                return false;
            }

            var telefoneRegex = /^\(\d{2}\) \d{4,5}-\d{4}$/;
            if (!telefoneRegex.test(telefone)) {
                alert("Por favor, insira um telefone válido.");
                return false;
            }

            var cpfRegex = /^\d{3}\.\d{3}\.\d{3}-\d{2}$/;
            if (!cpfRegex.test(cpf)) {
                alert("Por favor, insira um CPF válido.");
                return false;
            }

            // Se todos os campos estiverem preenchidos e válidos, o formulário é enviado
            return true;
        }

        function formatarCampo(idCampo, mascara) {
            var campo = document.getElementById(idCampo);
            var valorCampo = campo.value.replace(/\D/g, "");
            var mascaraArray = mascara.split("");
            var valorFormatado = "";

            for (var i = 0, j = 0; i < mascaraArray.length && j < valorCampo.length; i++) {
                if (mascaraArray[i] === "#") {
                    valorFormatado += valorCampo[j++];
                } else {
                    valorFormatado += mascaraArray[i];
                }
            }

            campo.value = valorFormatado;
        }
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
    </script>
</body>
</html>
