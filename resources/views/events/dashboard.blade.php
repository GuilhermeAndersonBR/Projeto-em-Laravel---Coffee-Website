@extends('layout.main-layout')

@section('title', 'Coffee Website - Dashboard')

@section('main-content')

<section class="home" id="home">

    <div class="container">

    <div class="row align-items-center text-center text-md-left min-vh-100 text-white">
        <div class="col-md-10 offset-md-1 dashboard-events-container">
            <div class="col-md-10 offset-md-1 dashboard-title-container">
                <h1>Meus Produtos</h1>
            </div>
            @if(count($events) > 0 && $events != null)
            <table class="table">
                <thead>
                    <tr class="text-white">
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Imagem</th>
                        <th scope="col">Acessos</th>
                        <th scope="col">Compradores</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Apagar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($events as $event)
                        <tr class="text-white">
                            <td scope="row">{{ $loop->index + 1 }}</td>
                            <td><a href="/produto/{{ $event->id }}">{{ $event->name }}</a></td>
                            <td><img style="width: 40px;" src="/img/products/{{ $event->image }}" alt="{{ $event->name }}"></td>
                            <td>0</td>
                            @if ($event->users !== null)
                            <td>{{ count($event->users) }}</td>
                            @endif  
                            <td>
                                <a class="btn btn-success" href="/produto/editar/{{ $event->id }}"><i class="fas fa-edit"></i></a>   
                            </td>
                            <td>
                                <form action="/produto/{{ $event->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach    
                </tbody>
            </table>
            @else
            <p>Você ainda não tem eventos, <a href="/criar">criar evento</a></p>
            @endif
        </div>
    </div>

    </div>

</section>

@endsection