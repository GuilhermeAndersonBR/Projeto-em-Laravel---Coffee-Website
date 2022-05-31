@extends('layout.main-layout')

@section('title', 'Coffe Website - Laravel Utilities & New Libraries')

@section('main-content')

    <section class="home" id="home">
      <div class="row">
        @if(session('msg'))
        <p class="msg">{{ session('msg') }}</p>
        @endif
      </div>
      <div class="container">

          <div class="row align-items-center text-center text-md-left min-vh-100">
            <div class="col-md-6">
              <span>Cafeteria Little cup</span>
              <h3>Comece seu dia com um bom café!</h3>
              <a href="#" class="link-btn">Inicie</a>
            </div>
          </div>

      </div>

    </section>
    <section class="menu" id="menu">
      <div class="card mb-3">
        <div class="card-body d-flex">

          <img src="/img/products/{{ $event->image }}" class="img-fluid img-container" alt="{{ $event->name }}">

          <div id="info-container" class="col-md-6 text-black">
            <h1>{{ $event->name }}</h1>
            <h2 class="event-city">Preço: R$ {{ $event->price }}</h2>
            @if( count($event->users) == 0 )
              <p class="events-participants">Nenhum Comprador</p>
            @else
              <p class="events-participants">{{ count($event->users) }} Compradores</p>
            <p class="event-owner">{{ $eventOwner['name'] }}</p>
            @endif
            <div class="row">
              <div class="col-sm-6">
                <div class="card">
                  <div class="card-body">
                    <h4>Sobre o Produto:</h4>
                    <p class="event-description">Descrição: {{ $event->description }}</p>
                    @auth
                    @if(!$hasUserJoined)
                      @if (Auth::user()->id  != $eventOwner['id'])
                        <form action="/produto/comprar/{{ $event->id }}" method="POST">
                          @csrf
                          <a href="/produto/comprar/{{ $event->id }}" 
                            class="link-btn" 
                            id="product-submit"
                            onclick="event.preventDefault();
                            this.closest('form').submit();">
                            Comprar
                          </a>
                        </form>
                        @else
                        <h2 class="text-danger">Você não pode comprar este produto</h2>
                      @endif
                    @else
                    <h2>Você já comprou esse Produto.</h2>
                    @endif
                    @endauth
          
                    @guest
                      <form action="/produto/comprar/{{ $event->id }}" method="POST">
                        @csrf
                        <a href="/produto/comprar/{{ $event->id }}" 
                          class="btn btn-primary" 
                          id="product-submit"
                          onclick="event.preventDefault();
                          this.closest('form').submit();">
                          Comprar
                        </a>
                      </form>
                    @endguest
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

@endsection