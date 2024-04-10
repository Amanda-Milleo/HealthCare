<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página inicial</title>
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

        h2 {
            color: black;
            margin-bottom: 20px;
            text-align: center;
        }

        form {
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"],
        input[type="date"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #fa8072;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #dc143c;
        }

        small {
            color: #6c757d;
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
        <a href="contato_seg.php">Adicionar Contato de Segurança</a>
        <a href="qrcode.php">QR Code</a>
        <a href="primeiros_soc.php">Registro de Saúde</a>
    </div>

    <div class="container">
        <h2>Novo Cadastro de Usuário</h2>
        <form name="form1" id="form1" onsubmit="return validateForm()" method="post" action="usu_cad_php.php">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="txtNome" required>
            </div>
            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input type="text" id="cpf" name="txtCPF" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}"
                    oninput="formatarCampo('cpf', '###.###.###-##')" required>
                <small>Formato: 123.456.789-01</small>
            </div>
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="txtEmail"
                    pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" required>
                <small>Formato: email@dominio.com</small>
            </div>
            <div class="form-group">
                <label for="data_nascimento">Data de Nascimento:</label>
                <input type="date" id="data_nascimento" name="txtData_nascimento" required>
            </div>
            <div class="form-group">
                <label for="sexo">Sexo:</label>
                <input type="text" id="sexo" name="txtSexo" pattern="[FM]" maxlength="1" required>
                <small>Aceito: F ou M</small>
            </div>
            <div class="form-group">
                <label for="tipo_diabetes">Tipo de Diabetes:</label>
                <input type="number" id="tipo_diabetes" name="txtTipo_diabetes" pattern="[1-4]" maxlength="1">
                <small>Aceito: 1, 2, 3 ou 4</small>
            </div>
            <div class="form-group">
                <label for="data_diagnostico">Data do Diagnóstico:</label>
                <input type="date" id="data_diagnostico" name="txtData_diagnostico">
            </div>
            <div class="form-group">
                <label for="acucar_sangue">Nível de açúcar no sangue:</label>
                <input type="number" id="acucar_sangue" name="txtAcucar_sangue">
            </div>
            <div class="form-group">
                <label for="peso">Peso:</label>
                <input type="text" id="peso" name="txtPeso" pattern="\d{1,3},\d{1,2}" maxlength="6" required>
                <small>Formato: 123,45</small>
            </div>
            <div class="form-group">
                <label for="altura">Altura:</label>
                <input type="text" id="altura" name="txtAltura" pattern="\d{1},\d{2}" oninput="formatarCampo('altura', '#,##')" maxlength="4" required>
                <small>Formato: 1,12</small>
            </div>
            <div class="form-group">
                <label for="pressao">Pressão arterial:</label>
                <input type="text" id="pressao" name="txtPressao_arterial" pattern="\d{1,2}\/\d{1,2}" maxlength="5" required>
                <small>Formato: 10/8</small>
            </div>
            <div class="form-group">
                <label for="historico">Histórico médico:</label>
                <input type="text" id="historico" name="txtHistorico_medico">
            </div>
            <div class="form-group">
                <label for="medicamentos">Medicamentos:</label>
                <input type="text" id="medicamentos" name="txtMedicamentos">
            </div>
            <div class="form-group">
                <label for="alergias">Alergias:</label>
                <input type="text" id="alergias" name="txtAlergias">
            </div>
            <button type="submit">Enviar</button>
        </form>
    </div>

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

        function validateForm() {
            // Implemente sua lógica de validação aqui, se necessário
            return true; // Temporário, sempre envia o formulário para fins de demonstração
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
    </script>
</body>

</html>
