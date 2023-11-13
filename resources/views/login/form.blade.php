@extends('site.layout')
@section('title', 'Login')
@section('conteudo')

    @if ($mensagem = Session::get('erro'))
        <div class="card red" id="mensagem">
            <div class="card-content white-text">
                <span class="card-title">Parece que ocorreu um erro!</span>
                <p> {{ $mensagem }}</p>
            </div>
        </div>
    @endif

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            {{ $error }}
        @endforeach


    @endif

    <div class="row container">

        <form action="{{ route('login.auth') }}" method="POST" class="col m6">
            @csrf
            <div class="row">
                <div class="input-field col s12">
                    <input type="email" id="email" name="email" class="validate">
                    <label for="email">Email</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input type="password" id="password" name="password" class="validate">
                    <label for="password">Senha</label>
                </div>
            </div>


            <button type="submit" id="submit" class="btn green">Entrar</button>

        </form>
    </div>

    <script>
        const email = document.getElementById('email');
        const password = document.getElementById('password');
        const submitButton = document.getElementById('submit');

        submitButton.setAttribute("disabled", "disabled");

        function updatesubmitButtonState() {
            if (email.value !== "" && password.value !== "") {
                submitButton.removeAttribute('disabled');
            }
        }

        email.addEventListener('input', updatesubmitButtonState);
        password.addEventListener('input', updatesubmitButtonState);

        setTimeout(function() {
            document.getElementById('mensagem').style.display = 'none';
        }, 5000);
    </script>

@endsection
