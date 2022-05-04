@extends('layout.main-layout')

@section('title', 'Coffee Website - Dashboard')

@section('main-content')
<section class="home" id="home">

    <div class="container">

        <div class="row align-items-center text-center text-white text-md-left min-vh-100">
            <div class="col-md-6">
                <h1>Edite o seu Produto</h1>
                <form action="/produto/update/{{ $event->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="image">Imagem do Evento:</label>
                    <input type="file" id="image" name="image" class="from-control-file">
                    <img style="width:100px;" src="/img/products/{{ $event->image }}" alt="{{ $event->name }}">
                  </div>
                <div class="form-group">
                    <label for="title">Evento:</label>
                    <input type="text" class="form-control" id="title" name="name" placeholder="Nome do evento" value="{{ $event->name }}">
                </div>
                <div class="form-group">
                    <label for="title">Preço:</label>
                    <input type="number" class="form-control" id="price" name="price" placeholder="Preço do Produto" value="{{ $event->price }}">
                </div>
                <div class="form-group">
                    <label for="title">Quantidade:</label>
                    <input type="number" class="form-control" id="qty" name="qty" placeholder="Quantidade do Produto" value="{{ $event->qty }}">
                </div>
                <div class="form-group">
                    <label for="title">Descrição:</label>
                    <textarea name="description" id="description" class="form-control" placeholder="Descrição do Produto">{{ $event->description }}</textarea>
                </div>
                <input type="submit" class="btn btn-primary" value="Criar Produto">
                </form>
            </div>
        </div>

        <div id="event-create-container text-white" class="col-md-6 offset-md-3">
            
        </div>

    </div>

</section>
@endsection