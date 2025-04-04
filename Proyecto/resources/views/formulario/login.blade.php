<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5 col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
        <h1>Login</h1>
        <p>Bienvenido, por favor inicie sesión para poder acceder</p>
    <div class="container-fluid ">
    <form action="{{ route('login') }}" class="auth-login-form mt-2" method="POST">
        @csrf
        <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" name="email" id="email" class="form-control" placeholder="Introduce un email" required>
        </div>
        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Introduce una contraseña" required>
        <input type="submit" value="Log in" name="login" id="login" class="btn btn-primary mt-2">
    </form>
    </div>
    </div>
</body>
</html>