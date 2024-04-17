<?php
session_start();

include("connection.php");
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] && isset($_SESSION['nome'])) {
    $nome = $_SESSION['nome'];
    echo "<p>Bem-vindo, $nome!</p>";
} else {
    header("Location: login.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página inicial</title>
    <style>
        /* Reset de margens para o body e html */
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
            justify-content: space-between; /* Alinha os itens nos extremos */
            padding: 0 20px;
            box-sizing: border-box;
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
            width: 100%; /* Alterado para cobrir a largura total */
            height: 60px;
            background: #333; 
            display: flex;
            justify-content: space-around;
            align-items: center;
            padding: 0 20px; /* Adicionado padding para espaçamento interno */
            box-sizing: border-box; /* Inclui padding na largura total */
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
            align-items: center; /* Alinha itens verticalmente */
    
        }

        .menu-usuario-content {
            display: none;
            position: absolute;
            background-color: #333;
            min-width: 160px;
            z-index: 1;
            margin-top: 10px; /* Ajuste para descer o submenu */
            top: 60px; /* Deslocamento para baixo */
            
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
                <a href="banco.php">Usuarios</a> 
                <a href="usu_edit.php">Editar Cadastro</a> 
                <a href="primeiros_soc.php">Suporte Emergencial</a> 
                <a href="login.php">Sair</a> 
            </div>
        </div>
        <img src="logo looker.png" alt="Logo" style="margin-left:auto;margin-right:auto;">
    </div>
    <div class="menu">
        <a href="usu_cad.php">Seu Cadastro</a> 
        <a href="contato_seg.php">Adicionar Contato de Segurança</a>
        <a href="qrcode.php">QR Code</a>
        <a href="primeiros_soc.php">Registro de Saúde</a>
    </div>

    <div class="main-content">
        <div class="text-content">
            <div class="content">
                <h1>Prevenção e cuidados: <br>nosso compromisso com você.</br></h1>
                <p>Nosso principal serviço é cuidar de você através de um QRCode que armazena todas as informações médicas essenciais para casos de emergência. Se você passar por algum problema de saúde em locais públicos, qualquer pessoa pode escanear esse QRCode para acessar as informações necessárias e prestar os primeiros socorros de forma adequada.
                <br>Além disso, oferecemos a possibilidade de sincronizar seu dispositivo e cadastrar um contato de emergência para ser acionado em situações em que a leitura do medidor não esteja correta. Assim, garantimos uma resposta rápida e eficiente para qualquer eventualidade, proporcionando tranquilidade e segurança para você e seus familiares.</br></p>
            </div>
        </div>
        <img src="Image.png" alt="Image.png">
    </div>

    <!-- Rodapé -->
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

        // Adicionar evento de clique no documento para fechar o submenu ao clicar fora dele
        document.addEventListener('click', function(event) {
            const menuUsuario = document.querySelector('.menu-usuario');
            if (!menuUsuario.contains(event.target)) {
                menuUsuario.classList.remove('active');
            }
        });
    </script>
</body>
</html>
