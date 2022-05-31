@extends('layout.main-layout')

@section('title', 'Coffee Website - Laravel Utilities & New Libraries')

@section('main-content')
<div style="background-color: black" class="w-100 min-vh-100 d-flex flex-column align-items-center justify-content-center p-5">
    @if(count($productsAsParticipant) > 0)
    <table class="table text-white">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Preço (R$)</th>
                <th scope="col">Compras</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productsAsParticipant as $event)
                <tr>
                    <td scropt="row">{{ $loop->index + 1 }}</td>
                    <td><a href="/produto/{{ $event->id }}">{{ $event->name }}</a></td>
                    <td><p>R$ {{ $event->price }}</p></td>
                    <td>{{ count($event->users) }}</td>
                    <td>
                        <form action="/produto/deletar/{{ $event->id }}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger delete-btn">
                                <i class="fas fa-trash"></i> 
                                Retirar Produto
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach    
        </tbody>
    </table>
    @else
    <p style="font-size:22pt;" class="text-white">Você ainda não comprou nenhum produto, <a href="/menu">veja todos os Produtos</a></p>
    @endif

    @if(count($productsAsParticipant) > 0)
    <p class="text-white">
        Total: R$ {{ $total }}
    </p>
    

     

    <a href="/stripe" class="btn btn-primary btn-lg" href="/cart/pay-with-paypal">

        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wallet" viewBox="0 0 16 16">
            <path d="M0 3a2 2 0 0 1 2-2h13.5a.5.5 0 0 1 0 1H15v2a1 1 0 0 1 1 1v8.5a1.5 1.5 0 0 1-1.5 1.5h-12A2.5 2.5 0 0 1 0 12.5V3zm1 1.732V12.5A1.5 1.5 0 0 0 2.5 14h12a.5.5 0 0 0 .5-.5V5H2a1.99 1.99 0 0 1-1-.268zM1 3a1 1 0 0 0 1 1h12V2H2a1 1 0 0 0-1 1z"/>
        </svg>
        Pagar com Cartão</a>
    </a>
    @endif

</div>
@endsection