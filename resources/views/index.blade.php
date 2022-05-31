@extends('layout.main-layout')

@section('title', 'Coffee Website - Laravel Utilities & New Libraries')

@section('main-content')
   <section class="home" id="home">

      <div class="container">

         <div class="row align-items-center text-center text-md-left min-vh-100">
            <div class="col-md-6">
               <span>Cafeteria Little Cup</span>
               <h3>Comece seu dia com um bom café!</h3>
               <a href="#" class="link-btn">Inicie</a>
            </div>
         </div>

      </div>

   </section>

   <!-- home section ends -->

   <!-- about section starts  -->

   <section class="about" id="about">

      <div class="container">

         <div class="row align-items-center">
            <div class="col-md-6">
               <img src="images/about-img-1.png" class="w-100" alt="">
            </div>
            <div class="col-md-6">
               <span>Porque escolher-nos?</span>
               <h3 class="title">O melhor café da região</h3>
               <p>Conforme abrimos nossas lojas, permanecemos no compromisso com a saúde e bem-estar de nossos parceiros e consumidores.</p>
               <a href="#" class="link-btn">Ler mais</a>
               <div class="icons-container">
                  <div class="icons">
                     <i class="fas fa-coffee"></i>
                     <h3>Melhor café</h3>
                  </div>
                  <div class="icons">
                     <i class="fas fa-shipping-fast"></i>
                     <h3>Entrega rápida</h3>
                  </div>
                  <div class="icons">
                     <i class="fas fa-headset"></i>
                     <h3>Serviço 24/7</h3>
                  </div>
               </div>
            </div>
         </div>

      </div>

   </section>
   
   <!-- menu section ends -->

   <!-- gallery section starts  -->

   <section class="gallery" id="gallery">

      <h1 class="heading"> Cardápio (Novos) </h1>

      <div class="box-container container">
         @if(count($events) > 0)
         @foreach($events as $event)
         <div class="box">
            <img src="/img/products/{{ $event->image }}" alt="{{ $event->name }}">
            <div class="content">
               <h3>{{ $event->name }}</h3>
               <p>Compradores: {{ count($event->users) }}</p>
               <a href="/produto/{{ $event->id }}" class="link-btn">Saber Mais</a>
            </div>
         </div>
         @endforeach
         @else
         <div class="w-100 d-flex justify-content-center">
            <h2>Não existe Produtos</h2>
         </div>
         @endif

      </div>

   </section>

   <!-- gallery section ends -->

   <!-- reviews section starts  -->

   <section class="reviews" id="reviews">

      <h1 class="heading"> Avaliações </h1>

      <div class="box-container container">

         <div class="box">
            <img src="images/pic-1.png" alt="">
            <h3>Paulo Ryan</h3>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Suscipit, ipsum eos? Perspiciatis expedita laudantium blanditiis cupiditate at natus, quam alias?</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
         </div>

         <div class="box">
            <img src="images/pic-2.png" alt="">
            <h3>john deo</h3>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Suscipit, ipsum eos? Perspiciatis expedita laudantium blanditiis cupiditate at natus, quam alias?</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
         </div>

         <div class="box">
            <img src="images/pic-3.png" alt="">
            <h3>João Paulo</h3>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Suscipit, ipsum eos? Perspiciatis expedita laudantium blanditiis cupiditate at natus, quam alias?</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
         </div>

      </div>

   </section>

   <!-- reviews section ends -->

   <!-- contact section starts  -->

   <section class="contact" id="contact">

      <h1 class="heading"> Contate-nos </h1>

      <div class="container">

         <div class="contact-info-container">

            <div class="box">
               <i class="fas fa-phone"></i>
               <h3>Telefone</h3>
               <p>+123-456-7890</p>
               <p>+111-222-3333</p>
            </div>
      
            <div class="box">
               <i class="fas fa-envelope"></i>
               <h3>Email</h3>
               <p>santiagoguilherme663@gmail.com</p>
               <p>guilherme.sites2004@gmail.com</p>
            </div>
      
            <div class="box">
               <i class="fas fa-map"></i>
               <h3>Loja física</h3>
               <p>Russas, Brazil - 62900000</p>
            </div>
      
         </div>
         @auth
         <div class="row align-items-center">

            <div class="col-md-6 mb-5 mb-md-0 ">
               <iframe 
               class="site-location" 
               src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9454.115421873772!2d-37.983330508519366!3d-4.945323876384861!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7b97876ea1cb0ef%3A0xdb4d79bd36cdca8c!2sEEEP%20Professor%20Walquer%20Cavalcante%20Maia!5e0!3m2!1spt-BR!2sbr!4v1650827031290!5m2!1spt-BR!2sbr" 
               style="border: 1px solid #512a10;" 
               allowfullscreen="" 
               loading="lazy" 
               referrerpolicy="no-referrer-when-downgrade">
               </iframe>
            </div>
            
            <form action="/add-rating" class="col-md-6" method="POST">
               @csrf
               <h3>Entre em contato</h3>
               <input type="text" placeholder="Seu Nome" class="box">
               <div class="box">
                  <h2>Sua Classificação</h2>
                  <input name="product_rating" type="range" class="form-range w-100" min="1" max="5" step="1" id="customRange3">
               </div>
               <input type="email" placeholder="Email" class="box">
               <textarea name="" placeholder="Mensagem" class="box" id="" cols="30" rows="10"></textarea>
               <input type="submit" value="Enviar" class="link-btn">
            </form>
            
         </div>
         @endauth

      </div>

   </section>

   <!-- contact section ends -->

   <!-- blogs section starts  -->

   <section class="blogs" id="blogs">

      <h1 class="heading"> Posts diários </h1>

      <div class="box-container container">

         <div class="box">
            <div class="image">
               <img src="images/g-img-1.jpg" alt="">
            </div>
            <div class="content">
               <h3>Qualidade assegurada.</h3>
               <p>Do estudo básico de preparo ao aperfeiçoamento dos detalhes.</p>
               <a href="#" class="link-btn">Ler mais</a>
            </div>
            <div class="icons">
               <span> <i class="fas fa-calendar"></i> 21 maio, 2022 </span>
               <span> <i class="fas fa-user"></i> by admin </span>
            </div>
         </div>

         <div class="box">
            <div class="image">
               <img src="images/g-img-2.jpg" alt="">
            </div>
            <div class="content">
               <h3>Custo benefício.</h3>
               <p>Saboreie uma pausa com um de nossos cafés.</p>
               <a href="#" class="link-btn">Ler mais</a>
            </div>
            <div class="icons">
               <span> <i class="fas fa-calendar"></i> 21 maio, 2022 </span>
               <span> <i class="fas fa-user"></i> by admin </span>
            </div>
         </div>

         <div class="box">
            <div class="image">
               <img src="images/g-img-3.jpg" alt="">
            </div>
            <div class="content">
               <h3>Cardápio variado.</h3>
               <p>Independente do seu gosto ou paladar, encontrará um café perfeito para você.</p>
               <a href="#" class="link-btn">Ler mais</a>
            </div>
            <div class="icons">
               <span> <i class="fas fa-calendar"></i> 21 maio, 2022 </span>
               <span> <i class="fas fa-user"></i> by admin </span>
            </div>
         </div>

      </div>

   </section>
@endsection
