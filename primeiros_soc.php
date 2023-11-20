<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Primeiros socorros</title>
    <style>
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
            width: 1440px;
            height: 80px;
            padding-left: 64px;
            padding-right: 64px;
            background: #FA7F72;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            display: flex;
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
            width: 103%;
            height: 60px;
            background: #333; 
            display: flex;
            justify-content: space-around;
            align-items: center;
        }

        .menu a {
            color: white;
            text-decoration: none;
            font-size: 18px;
            font-family: Arial, sans-serif;
            font-weight: bold;
        }

    </style>
</head>
<body>
    <div class="header">
        <img src="logo looker.png" alt="Logo">
    </div>
    <div class="menu">
        <a href="contato_seg.php">Clique aqui para entrar em contato com responsável pela pessoa</a>
    </div>

    <div class="main-content">
    </div>
    <div class="main-content">
        <div class="text-content">
            <div class="content">
                <h1>Primeiros Socorros para Pessoa Diabética</h1>
                <p>Emergência Médica
Sinais de Hipoglicemia
A hipoglicemia pode ocorrer rapidamente em pessoas diabéticas. Reconheça os sinais:

Palidez: A pele pode parecer pálida e fria.
Suor: Transpiração excessiva, mesmo em condições de frio.
Fraqueza: Sensação repentina de fraqueza e fadiga.
Tontura: Tontura e desorientação.
Fome: Fome extrema mesmo após ter comido recentemente.
Procedimentos de Emergência
Passos para Auxiliar:
Avalie a Situação: Verifique se a pessoa está consciente e responsiva.
Administre Carboidratos: Ofereça açúcar rápido, como suco de laranja ou refrigerante regular.
Evite Alimentos Gordurosos: Mantenha longe de alimentos gordurosos, pois eles podem retardar a absorção de açúcar.
Chame Ajuda Médica: Se os sintomas persistirem ou piorarem, procure assistência médica imediatamente.
O Que Evitar
Insulina Excessiva: Evite administrar insulina sem a orientação de um profissional médico.
Alimentos Gordurosos: Não ofereça alimentos com alto teor de gordura durante uma crise de hipoglicemia.
Lembre-se sempre de buscar ajuda profissional quando necessário e de seguir o plano de cuidados diabéticos indicado pelo médico.</p>
            </div>
        </div>

        <div class="image-section">
            <img src="Image.png" alt="Image.png">
            <div class="cta-section">
                <div class="button-veja-mais">
                    <span>Veja Mais</span>
                </div>
                <div class="button-entrar
