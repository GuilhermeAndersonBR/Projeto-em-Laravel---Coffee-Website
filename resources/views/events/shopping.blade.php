@extends('layout.main-layout')

@section('title', 'Coffee Website - Laravel Utilities & New Libraries')

@section('main-content')
<div style="background-color: black" class="w-100 min-vh-100 d-flex align-items-center justify-content-center p-5">
    @if(count($productsAsParticipant) > 0)
    <table class="table text-white">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Compras</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productsAsParticipant as $event)
                <tr>
                    <td scropt="row">{{ $loop->index + 1 }}</td>
                    <td><a href="/produto/{{ $event->id }}">{{ $event->name }}</a></td>
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
</div>
@endsection