<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página inicial</title>
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

        .menu-usuario-content a i {
            margin-right: 8px; 
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
            margin: 30px 15px;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.9);
            color: #fff;
            border-radius: 20px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.5);
            height: 300px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .content {
            background-color: rgba(255, 255, 255, 0.2);
            padding: 40px;
            border-radius: 20px;
            max-width: 600px;
        }

        .content h1 {
            color: #fff;
            font-size: 80  px; 
            font-weight: bold;
            margin-bottom: 30px;
            text-transform: uppercase;
        }

        .content p {
            color: #eee;
            font-size: 72px;
            line-height: 1.8;
            text-align: justify;
        }

        @media screen and (max-width: 768px) {
            .main-content {
                height: auto;
                padding: 20px;
            }

            .content {
                padding: 20px;
                max-width: none;
            }

            .content h1 {
                font-size: 80px;
                margin-bottom: 20px;
            }

            .content p {
                font-size: 72px; 
                line-height: 1.6;
            }
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />

</head>
<body>
    <div class="header">
        <div class="menu-usuario">
            <a href="#" onclick="toggleMenu()">Menu</a>
            <div class="menu-usuario-content">
                <a href="banco.php">Usuários</a> 
                <a href="usu_edit.php">Editar Cadastro</a> 
                <a href="primeiros_soc.php">Suporte Emergencial</a> 
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
    <div style="text-align: center; padding: 20px; background-color: #f2f2f2; border-radius: 15px; width: 100%; margin: 0 auto;">
        <h2 style="color: #4CAF50; font-family: Arial, sans-serif;">Bem-vindo, <?php echo $_SESSION['usuario_nome']; ?>!</h2>
    </div>
    <div class="main-content">
        <div class="text-content">
                <h1>Prevenção e cuidados: <br>Nosso compromisso com você.</br></h1>
                <p>Nosso principal serviço é cuidar de você através de um QRCode que armazena todas as informações médicas essenciais para casos de emergência. Se você passar por algum problema de saúde em locais públicos, qualquer pessoa pode escanear esse QRCode para acessar as informações necessárias e prestar os primeiros socorros de forma adequada.
                <br>Além disso, oferecemos a possibilidade de sincronizar seu dispositivo e cadastrar um contato de emergência para ser acionado em situações em que a leitura do medidor não esteja correta. Assim, garantimos uma resposta rápida e eficiente para qualquer eventualidade, proporcionando tranquilidade e segurança para você e seus familiares.</br></p>
            </div>
        </div>
        <img src="Image.png" alt="Image.png">
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

        // Adiciona evento de clique no documento para fechar o submenu ao clicar fora dele
        document.addEventListener('click', function(event) {
            const menuUsuario = document.querySelector('.menu-usuario');
            if (!menuUsuario.contains(event.target)) {
                menuUsuario.classList.remove('active');
            }
        });
    </script>
</body>
</html>