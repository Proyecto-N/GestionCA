<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="{{ route('auth.authenticate') }}">
        @csrf
        <input type="email" name="email" />
        <input type="password" name="password" />
        <input type="submit" value="Iniciar sesión" />
    </form>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li class="">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</body>
</html>
