<!DOCTYPE html>
<html lang = "pt-br">
<head>
    <meta charset = "UTF-8">
    <meta name    = "viewport" content = "width=device-width, initial-scale=1.0">
    <title>QRcode</title>
    <style>
        body {
            background-color: #fff;               
            color           : #000;               
            font-family     : Arial, sans-serif;
            margin          : 0;
            display         : flex;
            flex-direction  : column;
            align-items     : center;
        }
            .header {
            width          : 1440px;
            height         : 80px;
            padding-left   : 64px;
            padding-right  : 64px;
            background     : #FA7F72;
            flex-direction : column;
            justify-content: center;
            align-items    : center;
            display        : flex;
        }

        .header img {
            width : 88px;
            height: 68px;
        }

        section {
            margin-top    : 20px;
            display       : flex;
            flex-direction: column;
            align-items   : center;  

        }
    </style>
</head>
<body>
    <div class="header">
        <img src="logo looker.png" alt="Logo">
    </div>
    <header>
        <h1>Seu QRCODE</h1>
    </header>

    <section>
        <p>Este QRCODE possui uma página personalizada dos seus primeiros socorros.</p>
        <img src="qrcode.png" alt="qrcode.png">
    </section>
</body>
</html>
