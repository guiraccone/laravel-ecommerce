@extends('site.layout')
@section('title', 'Login')
@section('conteudo')

    @if (auth()->check())
        {{-- Usuário autenticado, redirecione para a página home --}}
        <script>
            window.location = "{{ route('site.index') }}";
        </script>
    @endif

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            {{ $error }}
        @endforeach
    @endif

    <div class="row container">
        <form action="{{ route('users.store') }}" method="POST" class="col m6">
            @csrf
            <div class="row">
                <div class="input-field col s12">
                    <input type="text" id="firstName" name="firstName" class="validate" required>
                    <label for="firstName">Nome</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input type="text" id="lastName" name="lastName" class="validate" required>
                    <label for="lastName">Sobrenome</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input type="email" id="email" name="email" class="validate" required>
                    <label for="email">Email</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input type="password" id="password" name="password" class="validate" required>
                    <label for="password">Senha</label>
                </div>
            </div>
            <button type="submit" id="submit" class="btn">Cadastrar</button>
        </form>

    </div>

@endsection
