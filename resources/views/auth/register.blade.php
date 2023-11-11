<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro</title>
</head>
<body>
    <form method="POST" action="{{ route('register.store') }}" autocomplete="off">
        @csrf
        <input type="text" name="name" placeholder="nombre(s)"  value="{{ old('name') }}"/>
        <input type="text" name="surnames" placeholder="apellidos"  value="{{ old('surnames') }}"/>
        <input type="tel" name="phone" placeholder="teléfono"  value="{{ old('phone') }}"/>
        <input type="email" name="email" placeholder="email"  value="{{ old('email') }}"/>
        <input type="password" name="password" placeholder="contraseña"/>
        <input type="password" name="password_confirmation" placeholder="confirmar contraseña" />
        <select name="role">
            <option value="">Selecciona un rol</option>
            @foreach ($roles as $role)
                <option value="{{$role->role_id}}">{{$role->role}}</option>
            @endforeach
        </select>
        <input type="submit" value="Registrar" />
    </form>

    @if (Session::get('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
    @endif

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
