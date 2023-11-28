@extends('layout')

@section('title', 'Iniciar sesión')

@section('content')
    <div class="flex flex-col justify-center items-center min-h-screen">
        <h2 class="text-center font-bold mb-10 text-3xl">Iniciar sesión</h2>

        @if ($errors->any())
            <x-alert type="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="">{{ $error }}</li>
                    @endforeach
                </ul>
            </x-alert>
        @endif

        <form method="POST" action="{{ route('auth.authenticate') }}">
            @csrf

            <x-input type="email" class="bg-white text-black" name="email" placeholder="Correo electrónico"  />
            <x-input type="password" class="bg-white text-black" name="password" placeholder="Contraseña" viewable="true" suffix="eye"  />

            <x-button can_submit="true" class="w-full" radius="small" size="small">Iniciar sesión</x-button>
        </form>
    </div>
@endsection
