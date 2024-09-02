<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('/css/style-login.css') }}">
</head>

<body>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="login-container">
        <img src="{{ asset('/img/logo_img_corte-removebg-preview.png') }}" alt="logotipo" class="logo">

        <form method="POST" action="{{ route('store') }}">
            @csrf
            <label for="email" class="form-label"></label>
            <input type="email" name="email" id="email" class="form-control" placeholder="E-mail">

            <label for="password" class="form-label"></label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Senha">

            <button type="submit" style="color: white; text-decoration: none; font-weight: bold; font-size: 16px;" class="btn btn-primary">ENTRAR</button>

            <button class="btn btn-secondary" style="font-size: 16px;">
                <a href="/cadastrarusuario" style="color: white; text-decoration: none;">CRIE SUA CONTA EM MENOS DE 1 MINUTO! É GRÁTIS!</a>
            </button>


            <a href="/recuperarsenha" style="font-size: 15px;" target="_blank">Esqueci minha senha</a>
        </form>
    </div>

    <script>
        setTimeout(function() {
            var alert = document.querySelector('.alert');
            if (alert) {
                alert.style.display = 'none';
            }
        }, 3000);
    </script>

</body>

</html>
