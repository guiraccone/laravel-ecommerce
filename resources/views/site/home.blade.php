@extends('site.layout')

@section('title', 'Essa é a página home')
@section('conteudo')
    <h1>Essa é a home</h1>

    @isset($nome)
        <h1>existe!</h1>
    @endisset

    @foreach ($frutas as $item)
        <h1>{{ $item }}</h1>
    @endforeach


    @include('includes.mensagem', ['titulo' => 'mensagem com sucesso'])

    @component('components.sidebar')
        @slot('paragrafo')
            Este é o texto dentro do parágrafo
        @endslot
    @endcomponent

    @push('style')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    @endpush

    @push('script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    @endpush


    {{-- Isso é um comentário --}}
@endsection
