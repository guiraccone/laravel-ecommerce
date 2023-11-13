@extends('site.layout')
@section('title', 'Carrinho')
@section('conteudo')
    <div class="row container">

        @if ($mensagem = Session::get('success'))
            <div id="mensagem" class="card green">
                <div class="card-content white-text">
                    <p> {{ $mensagem }}</p>
                </div>
            </div>
        @endif
        @if ($mensagem = Session::get('warning'))
            <div id="mensagem" class="card green">
                <div class="card-content white-text">
                    <p> {{ $mensagem }}</p>
                </div>
            </div>
        @endif

        @if ($itens->count() == 0)

            <div class="card red">
                <div class="card-content white-text">
                    <span class="card-title">Seu carrinho está vazio!</span>
                    <p> Aproveite nossas promoções!</p>
                </div>
            </div>
        @else
            <h5>Seu carrinho possui {{ $itens->count() }} produtos.</h5>
            <table class="striped">
                <thead>
                    <tr>
                        <th></th>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th>Quantidade</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($itens as $item)
                        <tr>
                            <td><img src="{{ $item->attributes->image }}" class="responsive-img circle" width="70"></td>
                            <td>{{ $item->name }}</td>
                            <td>R$ {{ number_format($item->price, 2, ',', '.') }}</td>
                            {{-- BTN ATUALIZAR --}}
                            <form action="{{ route('site.atualizacarrinho') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $item->id }}">
                                <td><input type="number" name="quantity" class="center" min="1"
                                        value="{{ $item->quantity }}"></td>
                                <td> <button class="btn-floating waves-effect waves-light orange"><i
                                            class="material-icons">refresh</i></button>
                            </form>

                            {{-- BTN REMOVER --}}

                            <form action="{{ route('site.removecarrinho') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $item->id }}">
                                <button class="btn-floating waves-effect waves-light red"><i
                                        class="material-icons">delete</i></button>
                            </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="card green">
                <div class="card-content white-text">
                    <span class="card-title">Valor total: R${{ number_format(\Cart::getTotal(), 2, ',', '.') }}</span>
                </div>
            </div>


            <div class="row container center">
                <a href="{{ route('site.index') }}" class="btn waves-effect waves-light blue"><i
                        class="material-icons left">
                        arrow_back</i>Continuar comprando</a>
                <a href="{{ route('site.limpacarrinho') }}" class="btn waves-effect waves-light blue"> Limpar carrinho<i
                        class="material-icons right">
                        clear</i></a>
                <button class="btn waves-effect waves-light green"> Finalizar pedido<i class="material-icons right">
                        check</i></button>
            </div>
    </div>



    @endif

    <script>
        setTimeout(function() {
            document.getElementById('mensagem').style.display = 'none';
        }, 5000);
    </script>

@endsection
