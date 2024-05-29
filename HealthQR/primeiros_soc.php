<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro De Saude</title>
    <style>
        body, html {
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
        .menu-botao {
            width: 100%; 
            height: 60px;
            display: flex;
            justify-content: space-around;
            align-items: center;
            padding: 0 20px;
            box-sizing: border-box; 
            margin-top: 100px;
        }
        
        .menu-botao {
            color: white;
            text-decoration: none;
            font-size: 18px;
            font-family: Arial, sans-serif;
            font-weight: bold;
        }

        .menu a {
            color: white;
            text-decoration: none;
            font-size: 18px;
            font-family: Arial, sans-serif;
            font-weight: bold;
        }

        .main-content {
            margin: 20px;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            height: 650px;
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

        .footer {
            width: 100%;
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            left: 0;
        }

        .footer p {
            margin: 5px 0;
        }

        .footer a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
        }

        .footer a:hover {
            text-decoration: underline;
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
        .menu-link {
            color: red;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="menu-usuario">
            <a href="#" onclick="toggleMenu()">Menu</a>
            <div class="menu-usuario-content">
                <a href="usu_edit.php">Sua Conta</a> 
                <a href="usu_edit.php">Meu Cadastro</a> 
                <a href="usu_edit.php">Meus Contatos</a> 
                <a href="usu_edit.php">Suporte Emergencial</a> 
            </div>
        </div>
        <img src="logo looker.png" alt="Logo" style="margin-left:auto;margin-right:auto;">
    </div>
    <div class="menu">
        <a href="pagina_inicial.php">Pagina Inicial</a> 
        <a href="contato_seg.php">Adicionar Contato de Segurança</a>
        <a href="qrcode.php">QR Code</a>
    </div>
    <div class="main-content">
        <div class="text-content">
            <div class="content">
                <h1>Primeiros Socorros. Como Posso Ajudar?</h1>
                <p>1º Passo: Escanei o QRcode do nosso usuario. </p>
                <p>2º Passo: Entre em contato com uma unidade de saude ou com um contato de segurança.</p>
                <p>3º Passo: Siga as intruções deixadas pelo o usuario em seu QRcode</p>
                    <h1>O Que Evitar?</h1>
                    <p>Tentar qualquer tipo de atendimento medico sem ter lido o que o usuario solicita no QRcode
                        <br>Não Ignorar Informações Médicas
                        <br>Não Subestimar Sintomas Relatados
                        <br>Não Demorar na Análise do QR Code
                        <br>Não Realizar Procedimentos Desnecessários
                        <br>Não Fornecer Medicamentos Sem Verificação
                    </p>

                <div class="menu-botao">
                    <a href="contato_seg.php" class="menu-link">Clique aqui para entrar em contato emergencial</a>
                </div>
            </div>
        </div>
    </div>


    <footer class="footer">
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
    </script>
</body>
</html>
