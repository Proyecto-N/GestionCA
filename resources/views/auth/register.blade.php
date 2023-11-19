<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <title>Registro</title>
    @vite('resources/css/comp.css')
    @vite('resources/css/register.css')
    @vite('resources/css/app.css')
</head>

<body class="background">
    <div class="wrapper">
        <header>
            <!-- Navbar -->
            @include('templates.navbar')
        </header>
        <!-- Formulario -->
        <div class="l-form">

                    <div class="form">
                        <img src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500"" alt="" class="form__img">
                            <form class="form__content" method="POST" action="{{ route('register.store') }}"
                                autocomplete="off">
                                @csrf
                                <h1 class="form__title">Crear Cuenta</h1>
                                <div class="form__div">
                                    <div class="form__icon">
                                    <i class='bx bx-user'></i>
                                    </div>
                                    <div class="form__div-input">
                                    <input class="form__input" type="text" name="name" placeholder="Nombre (s)" value="{{ old('name') }}" />
                                    </div>
                                </div>

                                <div class="form__div">
                                    <div class="form__icon">
                                    <i class='bx bx-user'></i>
                                    </div>
                                    <div class="form__div-input">
                                    <input class="form__input" type="text" name="surnames" placeholder="Apellidos" value="{{ old('surnames') }}" />
                                </div>
                                </div>

                                <div class="form__div">
                                    <div class="form__icon">
                                    <i class='bx bx-phone'></i>
                                    </div>
                                    <div class="form__div-input">
                                    <input class="form__input" type="tel" name="phone" placeholder="Teléfono" value="{{ old('phone') }}" />
                                </div>
                                </div>

                                <div class="form__div">
                                    <div class="form__icon">
                                    <i class='bx bx-envelope'></i>
                                    </div>
                                    <div class="form__div-input">
                                    <input class="form__input" type="email" name="email" placeholder="Email" value="{{ old('email') }}" />
                                </div>
                                </div>

                                <div class="form__div">
                                    <div class="form__icon">
                                    <i class='bx bx-lock'></i>
                                    </div>
                                    <div class="form__div-input">
                                    <input class="form__input" type="password" name="password" placeholder="Contraseña" />
                                </div>
                                </div>

                                <div class="form__div">
                                    <div class="form__icon">
                                    <i class='bx bx-lock'></i>
                                    </div>
                                    <div class="form__div-input">
                                    <input class="form__input" type="password" name="password_confirmation" placeholder="Confirmar Contraseña" />
                                </div>
                                </div>

                                <div class="form__div form__div-one">
                                    <div class="form__icon">
                                    <i class='bx bx-group'></i>
                                    </div>
                                    <div class="form__div-input">
                                    <select class="form__input" name="role">
                                    <option class="form__input" value="">Selecciona un rol</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->role_id }}" {{ $role->role_id == 1 ? '' : 'disabled' }} >{{ $role->role }}</option>
                                    @endforeach
                                    </select>
                                </div>
                                </div>
                                    <input class="form__button" type="submit" value="Registrar" />
                            </form>
                        </div>
                    </div>

                    @if (Session::get('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
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
