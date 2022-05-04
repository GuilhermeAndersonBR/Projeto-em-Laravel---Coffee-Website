@extends('layout.main-layout')

@section('title', 'Coffe Website - Laravel Utilities & New Libraries')

@section('main-content')

    <section class="home" id="home">

        <div class="container">

          <div class="d-flex align-items-center justify-content-center col-md-10 offset-md-1 w-100 min-vh-100">
            <div class="row bg-light p-4 rounded">
              <div id="image-container" class="col-md-6">
                <img src="/img/products/{{ $event->image }}" class="img-fluid" alt="{{ $event->name }}">
              </div>
              <div id="info-container" class="col-md-6 text-black">
                <h1>{{ $event->name }}</h1>
                <p class="event-city">{{ $event->price }}</p>
                @if( count($event->users) == 0 )
                  <p class="events-participants">Nenhum Comprador</p>
                @else
                  <p class="events-participants">{{ count($event->users) }} Compradores</p>
                <p class="event-owner"><ion-icon name="star-outline"></ion-icon> {{ $eventOwner['name'] }}</p>
                @endif
                @auth
                @if(!$hasUserJoined)
                  @if (Auth::user()->id  != $eventOwner['id'])
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
                <div class="" id="description-container">
                  <h4>Sobre o Produto:</h4>
                  <p class="event-description">{{ $event->description }}</p>
                </div>
              </div>
              
            </div>
          </div>

        </div>

    </section>

@endsection