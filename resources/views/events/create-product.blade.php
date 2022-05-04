@extends('layout.main-layout')

@section('title', 'Coffe Website - Laravel Utilities & New Libraries')

@section('main-content')
    <section class="home" id="home">

        <div class="container">

            <div class="row align-items-center text-center text-white text-md-left min-vh-100">
                <div class="col-md-6">
                    <h1>Crie o seu Produto</h1>
                    <form action="/events" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="image">Imagem do Evento:</label>
                        <input type="file" id="image" name="image" class="from-control-file">
                      </div>
                    <div class="form-group">
                        <label for="title">Evento:</label>
                        <input type="text" class="form-control" id="title" name="name" placeholder="Nome do evento">
                    </div>
                    <div class="form-group">
                        <label for="title">Preço:</label>
                        <input type="number" class="form-control" id="price" name="price" placeholder="Preço do Produto">
                    </div>
                    <div class="form-group">
                        <label for="title">Quantidade:</label>
                        <input type="number" class="form-control" id="qty" name="qty" placeholder="Quantidade do Produto">
                    </div>
                    <div class="form-group">
                        <label for="title">Descrição:</label>
                        <textarea name="description" id="description" class="form-control" placeholder="Descrição do Produto"></textarea>
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