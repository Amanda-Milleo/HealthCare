<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuário</title>
    <style>
        body {
            background-color: #fff; 
            color: #000; 
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        h2 {
            color: #FA8072; 
        }

        form {
            max-width: 600px;
            margin   : 0 auto;
            color: #FA8072;
        }

        input {
            padding: 8px;
            margin-bottom: 10px;
            width: 100%;
            box-sizing: border-box;
            border: 1px solid #000; 
        }

        input[type="submit"] {
            background-color: #fa8072; 
            color: #fff; 
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #dc143c; 
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Novo cadastro de usuário</h2>
        <form name="form1" id="form1" onsubmit="return validateForm()" method="post" action="usu_cad_php.php">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" name="txtNome" required>
            </div>
            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input type="text" class="form-control" id="cpf" name="txtCPF" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}"
                    oninput="formatarCampo('cpf', '###.###.###-##')" required>
                <small id="cpfHelp" class="form-text text-muted">Formato: 123.456.789-01</small>
            </div>
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" class="form-control" id="email" name="txtEmail"
                    pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" required>
                <small id="emailHelp" class="form-text text-muted">Formato: email@dominio.com</small>
            </div>
            <div class="form-group">
                <label for="data_nascimento">Data de Nascimento:</label>
                <input type="date" class="form-control" id="data_nascimento" name="txtData_nascimento" required>
            </div>
            <div class="form-group">
                <label for="sexo">Sexo:</label>
                <input type="text" class="form-control" id="sexo" name="txtSexo" pattern="[FM]" maxlength="1" required>
                <small id="sexoHelp" class="form-text text-muted">Aceito: F ou M</small>
            </div>
            <div class="form-group">
                <label for="tipo_diabetes">Tipo de Diabetes:</label>
                <input type="number" class="form-control" id="tipo_diabetes" name="txtTipo_diabetes" pattern="[1-4]"
                    maxlength="1">
                <small id="diabetesHelp" class="form-text text-muted">Aceito: 1, 2, 3 ou 4</small>
            </div>
            <div class="form-group">
                <label for="data_diagnostico">Data do Diagnóstico:</label>
                <input type="date" class="form-control" id="data_diagnostico" name="txtData_diagnostico">
            </div>
            <div class="form-group">
                <label for="acucar_sangue">Nível de açúcar no sangue:</label>
                <input type="number" class="form-control" id="acucar_sangue" name="txtData_diagnostico">
            </div>
            <div class="form-group">
                <label for="peso">Peso:</label>
                <input type="text" class="form-control" id="peso" name="txtPeso" pattern="\d{1,3},\d{1,2}" maxlength="6"
                    required>
                <small id="pesoHelp" class="form-text text-muted">Formato: 123,45</small>
            </div>
            <div class="form-group">
                <label for="altura">Altura:</label>
                <input type="text" class="form-control" id="altura" name="txtAltura" pattern="\d{1},\d{2}"
                    oninput="formatarCampo('altura', '#,##')" maxlength="4" required>
                <small id="alturaHelp" class="form-text text-muted">Formato: 1,12</small>
            </div>
            <div class="form-group">
                <label for="pressao">Pressão arterial:</label>
                <input type="text" class="form-control" id="pressao" name="txtPressao_arterial"
                    pattern="\d{1,2}\/\d{1,2}" maxlength="5" required>
                <small id="pressaoHelp" class="form-text text-muted">Formato: 10/8</small>
            </div>
            <div class="form-group">
                <label for="historico">Histórico médico:</label>
                <input type="text" class="form-control" id="historico" name="txtHistorico_medico">
            </div>
            <div class="form-group">
                <label for="medicamentos">Medicamentos:</label>
                <input type="text" class="form-control" id="medicamentos" name="txtMedicamentos">
            </div>
            <div class="form-group">
                <label for="alergias">Alergias:</label>
                <input type="text" class="form-control" id="alergias" name="txtAlergias">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>

    <script>
        // Valida os campos do formulario
        function validateForm() {
            var nome = document.getElementById("nome").value;
            var cpf = document.getElementById("cpf").value;
            var email = document.getElementById("email").value;
            var data_nascimento = document.getElementById("data_nascimento").value;
            var sexo = document.getElementById("sexo").value;
            var peso = document.getElementById("peso").value;
            var altura = document.getElementById("altura").value;
            var pressao = document.getElementById("pressao").value;
            var tipo_diabetes = document.getElementById("tipo_diabetes").value;

            // Validar campos vazios
            if (nome === "" || cpf === "" || email === "" || data_nascimento === "" || sexo === "" || peso === "" || altura === "" || pressao === "") {
                alert("Por favor, preencha todos os campos.");
                return false;
            }

            // Validar CPF usando regex
            var cpfRegex = /^\d{3}\.\d{3}\.\d{3}-\d{2}$/;
            if (!cpfRegex.test(cpf)) {
                alert("Por favor, insira um CPF válido.");
                return false;
            }

            // Validar e-mail (formato simples)
            var emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            if (!emailRegex.test(email)) {
                alert("Por favor, insira um e-mail válido.");
                return false;
            }

            // Validar tipo de diabetes
            var diabatesRegex = /^[1-4]$/;
            if (!diabatesRegex.test(tipo_diabetes)) {
                alert("Por favor, insira um tipo de diabetes válido.");
                return false;
            }

            // Validar peso
            var pesoRegex = /^\d{1,3},\d{1,2}$/;
            if (!pesoRegex.test(peso)) {
                alert("Por favor, insira um peso válido.");
                return false;
            }

            // Validar altura
            var alturaRegex = /^\d{1},\d{2}$/;
            if (!alturaRegex.test(altura)) {
                alert("Por favor, insira uma altura válido.");
                return false;
            }

            // Validar pressão
            var pressaoRegex = /^\d{1,2}\/\d{1,2}$/;
            if (!pressaoRegex.test(pressao)) {
                alert("Por favor, insira uma pressão válido.");
                return false;
            }

            // Se todos os campos estiverem preenchidos e válidos, o formulário é enviado
            return true;
        }

        // Coloca a mascara assim que o campo é digitado
        function formatarCampo(idCampo, mascara) {
            var campo = document.getElementById(idCampo);
            var valorCampo = campo.value.replace(/\D/g, "");
            var mascaraArray = mascara.split("");
            var valorFormatado = "";

            for (var i = 0, j = 0; i < mascaraArray.length && j < valorCampo.length; i++) {
                // Se o valor digitado esta na mascara como #, mantem o valor digitado
                if (mascaraArray[i] === "#") {
                    valorFormatado += valorCampo[j++];
                    // Se não, coloca a mascara
                } else {
                    valorFormatado += mascaraArray[i];
                }
            }

            campo.value = valorFormatado;
        }
    </script>

</body>

</html>