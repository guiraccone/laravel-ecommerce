<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


</head>

<body>

    <ul id='dropdown1' class='dropdown-content'>
        @foreach ($categoriasMenu as $categoriaM)
            <li><a href="{{ route('site.categoria', $categoriaM->id) }}">{{ $categoriaM->nome }}</a></li>
        @endforeach
    </ul>

    <ul id='dropdown2' class='dropdown-content'>
        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li><a href="{{ route('login.logout') }}">Sair <i class="material-icons right">logout</i></a></li></a></li>
    </ul>

    <nav class="red">
        <div class="nav-wrapper container">
            <a href="#" class="brand-logo center">Curso laravel</a>
            <ul id="nav-mobile" class="left">
                <li><a href="{{ route('site.index') }}">Home</a></li>
                <li><a href="#" class="dropdown-trigger" data-target="dropdown1">Categorias <i
                            class="material-icons right">expand_more</i></a></li>
                <li><a href="{{ route('site.carrinho') }}">Carrinho <span class="new badge red" data-badge-caption="">
                            {{ \Cart::getContent()->count() }}</span></a></li>
            </ul>
            @auth
                <ul id="nav-mobile" class="right">
                    <li><a href="#" class="dropdown-trigger" data-target="dropdown2">Olá
                            {{ auth()->user()->firstName }} <i class="material-icons right">expand_more</i></a></li>
                </ul>
            @else
                <ul id="nav-mobile" class="right">
                    <li><a href="{{ route('login.form') }}" class="btn red">Login<i
                                class="material-icons right">login</i></a>
                    </li>
                </ul>
            @endauth


        </div>
    </nav>

    @yield('conteudo')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.dropdown-trigger');
            var instances = M.Dropdown.init(elems, {
                coverTrigger: false,
                constrainWidth: false
            });
        });
    </script>

</body>

</html>
