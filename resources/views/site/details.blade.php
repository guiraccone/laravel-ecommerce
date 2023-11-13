@extends('site.layout')
@section('title', 'Detalhes')
@section('conteudo')

    <div class="row container">
        <br>
        <div class="col s12 m6">
            <img src="{{ $produto->img }}" class="responsive-img">
        </div>
        <div class="col s12 m6">
            <h4>{{ $produto->nome }}</h4>
            <h5>R$ {{ number_format($produto->preco, 2, ',', '.') }}</h5>
            <p>{{ $produto->descricao }}</p>
            <p>Postado por {{ $produto->user->firstName }}
                <br />
                Categoria: {{ $produto->categoria->nome }}
            </p>

            <form action="{{ route('site.addcarrinho') }}" method="POST" enctype="multipart/form-data">

                <!-- através dessa diretiva é gerado um input do tipo hidden e um token para proteção da aplicação-->
                @csrf
                <input type="hidden" name="id" value="{{ $produto->id }}">
                <input type="hidden" name="name" value="{{ $produto->nome }}">
                <input type="hidden" name="price" value="{{ $produto->preco }}">
                <input type="number" min="1" name="qnt" value="1">
                <input type="hidden" name="img" value="{{ $produto->img }}">

                <button class="btn orange btn-large">Comprar</button>

            </form>

        </div>
    </div>

@endsection
