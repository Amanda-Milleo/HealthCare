<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seu QR code</title>
    <style>
        /* Reset de margens para o body e html */
        body,
        html {
            margin: 0;
            padding: 0;
        }

        body {
            width: 100%;
            height: 100%;
            background: white;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            display: inline-flex;
            margin: 0;
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
            margin: 0 auto; /* Centraliza a logo horizontalmente */
            display: block; /* Garante que a logo seja exibida como bloco */
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

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: black;
            text-align: center;
            margin-bottom: 20px;
        }

        #qr-code {
            text-align: center;
            margin-top: 20px;
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
    </style>
</head>

<body>
    <div class="header">
        <div class="menu-usuario">
            <a href="#" onclick="toggleMenu()">Menu</a>
            <div class="menu-usuario-content">
                <a href="usu_edit.php">Meu Cadastro</a>
                <a href="usu_edit.php">Meus Contatos</a>
                <a href="usu_edit.php">Suporte Emergencial</a>
            </div>
        </div>
        <img src="logo looker.png" alt="Logo">
    </div>
    <div class="menu">
        <a href="pagina_inicial.php">Pagina Inicial</a>
        <a href="contato_seg.php">Adicionar Contato de Segurança</a>
        <a href="primeiros_soc.php">Registro de Saúde</a>
    </div>

    <div class="container">
        <h1>Gerador de QR Code</h1>
        <div id="qr-code">
            <!-- O QR Code gerado dinamicamente aparecerá aqui -->
        </div>
    </div>

    <!-- Rodapé -->
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

        document.addEventListener('click', function (event) {
            const menuUsuario = document.querySelector('.menu-usuario');
            if (!menuUsuario.contains(event.target)) {
                menuUsuario.classList.remove('active');
            }
        });

        function generateQRCode() {
            const qrCodeElement = document.getElementById('qr-code');
            
            // 1. Obter a URL atual da página
            const pageUrl = window.location.href;

            // 2. Criar a URL para gerar o QR Code com a URL da página
            const qrCodeUrl = `https://api.qrserver.com/v1/create-qr-code/?data=${encodeURIComponent(pageUrl)}&size=200x200`;

            // 3. Inserir a imagem do QR Code no elemento HTML
            qrCodeElement.innerHTML = `<img src="${qrCodeUrl}" alt="QR Code">`;
        }

        window.onload = generateQRCode;
    </script>
</body>

</html>