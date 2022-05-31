@extends('layout.main-layout')

@section('title', 'Coffee Website - Laravel Utilities & New Libraries')

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

 <!-- about section ends -->

 <!-- menu section starts  -->

 <section class="menu" id="menu">

   <h1 class="heading"> Cardápio </h1>
   <h1 class="d-flex justify-content-center">Busque um Produto</h1>
   <div id="search-container" class="mb-5">
      
      <form action="/menu" method="GET" class="d-flex justify-content-center align-items-center">
         <input type="text" id="search" name="search" class="search-box form-control w-50" placeholder="Procurar...">
         <button type="submit" class="search-link-btn ml-3">Pesquisar</button>
      </form>
   </div>

    <div id="loadingMenuBox" onload="loadMenuBox()" class="container box-container">
      @if(count($events) > 0)
         @foreach($events as $event)
         <div class="box">
            <img src="/img/products/{{ $event->image }}" alt="">
            <h3>{{ $event->name }}</h3>
            <p>{{ $event->description }}</p>
            <p>Compradores: {{ count($event->users) }}</p>
            <a href="/produto/{{ $event->id }}" class="link-btn">Saber Mais</a>
         </div>
         @endforeach

         @if(count($events) == 0 && $search)
         <div class="container">
            <h3>Nenhum Produto foi encontrado</h3>
            <a href="/menu" class="link-btn">Selecione aqui para acessar todos os Produtos</a>
         </div>
         @endif
      @else
         <div class="w-100 d-flex justify-content-center">
            <h2>Não há produtos</h2>
         </div>
      @endif

    </div>
   
   <script>
      var loadingMenuBox = document.getElementById('loadingMenuBox');
      
      function loadingMenuBox() {
        loadingMenuBox.style.display = 'none';
      }
   </script>

</section>
@endsection