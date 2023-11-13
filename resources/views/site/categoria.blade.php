@extends('site.layout')
@section('title', 'Essa é a página home')
@section('conteudo')

    <div class="row container">

        <h3>Categoria: {{$categoria->nome}} </h3>

        @foreach ($produtos as $produto)
            <div class="col s12 m4">
                <div class="card">
                    <div class="card-image">
                        <img src="{{ $produto->img }}">
                        <span class="card-title">{{ $produto->nome }}</span>
                        <a href="{{ route('site.details', $produto->slug) }}"
                            class="btn-floating halfway-fab waves-effect waves-light red"><i
                                class="material-icons">add</i></a>
                    </div>
                    <div class="card-content">
                        <p>{{ Str::limit($produto->descricao, 20) }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="row center">
        {{ $produtos->links('custom.pagination') }}
    </div>


@endsection
