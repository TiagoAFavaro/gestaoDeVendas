<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Nova Senha</title>
    <link rel="stylesheet" href="{{ asset('/css/style-login.css') }}">
    <style>
        .error-message {
            color: red;
            display: none;
        }
    </style>
    <script>
        function validatePasswords() {
            var newPassword = document.getElementById("newPassword").value;
            var confirmPassword = document.getElementById("confirmPassword").value;
            var errorMessage = document.getElementById("errorMessage");

            if (newPassword.length <= 8) {
                errorMessage.textContent = "Senha precisa ter mais que 8 caracteres.";
                errorMessage.style.display = "block";
                return false;
            } else if (newPassword !== confirmPassword) {
                errorMessage.textContent = "As senhas não são iguais.";
                errorMessage.style.display = "block";
                return false;
            } else {
                errorMessage.style.display = "none";
                return true;
            }
        }
    </script>
</head>
<body>

    <div class="login-container">
        <img src="{{ asset('/img/logo_img_corte-removebg-preview.png') }}" alt="logotipo" class="logo">
        <h2>Criar Nova Senha</h2>
        <form onsubmit="return validatePasswords()">
            <input type="text" value="email@exemplo.com" disabled>
            <input type="password" id="newPassword" placeholder="Nova Senha" required>
            <input type="password" id="confirmPassword" placeholder="Confirmar Nova Senha" required>
            <span id="errorMessage" class="error-message"></span>
            <button type="submit" style="color: white; font-weight: bold; margin-top: 20px;">ENVIAR</button>
        </form>
    </div>

</body>
</html>
