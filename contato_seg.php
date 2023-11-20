<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Contato de Segurança</title>
    <style>
        body {
            padding: 20px;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Cadastro de contato de segurança</h2>
        <form id="form1" name="form1" onsubmit="return validateForm()" method="post" action="contato_seg_php.php">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" name="txtNome" required>
            </div>
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" class="form-control" id="email" name="txtEmail"
                    pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" required>
                <small id="emailHelp" class="form-text text-muted">Formato: email@dominio.com</small>
            </div>
            <div class="form-group">
                <label for="telefone">Telefone:</label>
                <input type="tel" class="form-control" id="telefone" name="txtTelefone"
                    pattern="\(\d{2}\) \d{4,5}-\d{4}" oninput="formatarCampo('telefone', '(##) ####-####')" required>
                <small id="telefoneHelp" class="form-text text-muted">Formato: (99) 12345-6789</small>
            </div>
            <div   class   = "form-group">
            <label for     = "cpf">CPF:</label>
            <input type    = "text" class    = "form-control" id = "cpf" name = "txtCPF" pattern = "\d{3}\.\d{3}\.\d{3}-\d{2}"
                   oninput = "formatarCampo('cpf', '###.###.###-##')" required>
            <small id      = "cpfHelp" class = "form-text text-muted">Formato: 123.456.789-01</small>
            </div>
            <div   class = "form-group">
            <label for   = "parentesco">Parentesco:</label>
            <input type  = "text" class = "form-control" id = "parentesco" name = "txtParentesco" required>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>

    <script>
        function validateForm() {
            var nome = document.getElementById("nome").value;
            var email = document.getElementById("email").value;
            var telefone = document.getElementById("telefone").value;
            var cpf = document.getElementById("cpf").value;
            var parentesco = document.getElementById("parentesco").value;

            // Validar campos vazios
            if (nome === "" || email === "" || telefone === "" || cpf === "" || parentesco === "") {
                alert("Por favor, preencha todos os campos.");
                return false;
            }

            // Validar e-mail (formato simples)
            var emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            if (!emailRegex.test(email)) {
                alert("Por favor, insira um e-mail válido.");
                return false;
            }

            // Validar telefone usando regex
            var telefoneRegex = /^\(\d{2}\) \d{4,5}-\d{4}$/;
            if (!telefoneRegex.test(telefone)) {
                alert("Por favor, insira um telefone válido.");
                return false;
            }

            // Validar CPF usando regex
            var cpfRegex = /^\d{3}\.\d{3}\.\d{3}-\d{2}$/;
            if (!cpfRegex.test(cpf)) {
                alert("Por favor, insira um CPF válido.");
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