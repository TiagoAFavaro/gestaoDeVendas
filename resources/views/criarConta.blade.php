<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Conta</title>
    <link rel="stylesheet" href="{{ asset('/css/style-login.css') }}">
</head>

<body>

    <div class="login-container">
        <img src=" {{ asset('img/logo_img_corte-removebg-preview.png') }}" alt="logotipo" class="logo">
        <h2>Crie uma Conta Agora, é Grátis!</h2>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="{{ route('cadastrarusuariostore') }}">
            @csrf
            <label for="name" class="form-label"></label>
            <input type="name" name="name" id="name" class="form-control" placeholder="Nome" required value="{{ old('name') }}">

            <label for="email" class="form-label"></label>
            <input type="email" name="email" id="email" class="form-control" placeholder="E-mail" required value="{{ old('email') }}">

            <label for="password" class="form-label"></label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Senha" required>

            <label for="password_confirmation" class="form-label"></label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirme a Senha" required>

            <button type="submit" class="btn btn-primary" style="color: white;">CADASTRAR</button>

        </form>

        <script>
            setTimeout(function() {
                var alert = document.querySelector('.alert');
                if (alert) {
                    alert.style.display = 'none';
                }
            }, 3000);
        </script>

    </div>

</body>

</html>