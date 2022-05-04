@extends('layout.main-layout')

@section('title', 'Coffee Website - Laravel Utilities & New Libraries')

@section('main-content')
   <section class="home" id="home">

      <div class="container">

         <div class="row align-items-center text-center text-md-left min-vh-100">
            <div class="col-md-6">
               <span>coffee house</span>
               <h3>start your day with our coffee</h3>
               <a href="#" class="link-btn">get started</a>
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
               <span>why choose us?</span>
               <h3 class="title">the best coffee maker in the town</h3>
               <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis dolorem laborum itaque. Perspiciatis in veniam illum deserunt, quos animi maiores nisi officiis amet accusantium soluta a, excepturi vero obcaecati nobis.</p>
               <a href="#" class="link-btn">read more</a>
               <div class="icons-container">
                  <div class="icons">
                     <i class="fas fa-coffee"></i>
                     <h3>best coffee</h3>
                  </div>
                  <div class="icons">
                     <i class="fas fa-shipping-fast"></i>
                     <h3>free delivery</h3>
                  </div>
                  <div class="icons">
                     <i class="fas fa-headset"></i>
                     <h3>24/7 service</h3>
                  </div>
               </div>
            </div>
         </div>

      </div>

   </section>
   
   <!-- menu section ends -->

   <!-- gallery section starts  -->

   <section class="gallery" id="gallery">

      <h1 class="heading"> our menu </h1>

      <div class="box-container container">

         @foreach($events as $event)
         <div class="box">
            <img src="/img/products/{{ $event->image }}" alt="{{ $event->name }}">
            <div class="content">
               <h3>{{ $event->name }}</h3>
               <p>Compradores: {{ count($event->users) }}</p>
               <a href="/produto/{{ $event->id }}" class="link-btn">read more</a>
            </div>
         </div>
         @endforeach

      </div>

   </section>

   <!-- gallery section ends -->

   <!-- reviews section starts  -->

   <section class="reviews" id="reviews">

      <h1 class="heading">customers reviews</h1>

      <div class="box-container container">

         <div class="box">
            <img src="images/pic-1.png" alt="">
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

      </div>

   </section>

   <!-- reviews section ends -->

   <!-- contact section starts  -->

   <section class="contact" id="contact">

      <h1 class="heading"> contact us  </h1>

      <div class="container">

         <div class="contact-info-container">

            <div class="box">
               <i class="fas fa-phone"></i>
               <h3>phone</h3>
               <p>+123-456-7890</p>
               <p>+111-222-3333</p>
            </div>
      
            <div class="box">
               <i class="fas fa-envelope"></i>
               <h3>email</h3>
               <p>santiagoguilherme663@gmail.com</p>
               <p>guilherme.sites2004@gmail.com</p>
            </div>
      
            <div class="box">
               <i class="fas fa-map"></i>
               <h3>address</h3>
               <p>Russas, Brazil - 62900000</p>
            </div>
      
         </div>

         <div class="row align-items-center">

            <div class="col-md-6 mb-5 mb-md-0 ">
               <iframe class="site-location" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9454.115421873772!2d-37.983330508519366!3d-4.945323876384861!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7b97876ea1cb0ef%3A0xdb4d79bd36cdca8c!2sEEEP%20Professor%20Walquer%20Cavalcante%20Maia!5e0!3m2!1spt-BR!2sbr!4v1650827031290!5m2!1spt-BR!2sbr" style="border: 1px solid #512a10;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

            <form action="" class="col-md-6">
               <h3>get in touch</h3>
               <input type="text" placeholder="your name" class="box">
               <input type="email" placeholder="email" class="box">
               <input type="number" placeholder="phone" class="box">
               <textarea name="" placeholder="message" class="box" id="" cols="30" rows="10"></textarea>
               <input type="submit" value="send message" class="link-btn">
            </form>

         </div>

      </div>

   </section>

   <!-- contact section ends -->

   <!-- blogs section starts  -->

   <section class="blogs" id="blogs">

      <h1 class="heading"> our daily posts </h1>

      <div class="box-container container">

         <div class="box">
            <div class="image">
               <img src="images/g-img-1.jpg" alt="">
            </div>
            <div class="content">
               <h3>blog title goes here.</h3>
               <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, illum?</p>
               <a href="#" class="link-btn">read more</a>
            </div>
            <div class="icons">
               <span> <i class="fas fa-calendar"></i> 21st may, 2022 </span>
               <span> <i class="fas fa-user"></i> by admin </span>
            </div>
         </div>

         <div class="box">
            <div class="image">
               <img src="images/g-img-2.jpg" alt="">
            </div>
            <div class="content">
               <h3>blog title goes here.</h3>
               <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, illum?</p>
               <a href="#" class="link-btn">read more</a>
            </div>
            <div class="icons">
               <span> <i class="fas fa-calendar"></i> 21st may, 2022 </span>
               <span> <i class="fas fa-user"></i> by admin </span>
            </div>
         </div>

         <div class="box">
            <div class="image">
               <img src="images/g-img-3.jpg" alt="">
            </div>
            <div class="content">
               <h3>blog title goes here.</h3>
               <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, illum?</p>
               <a href="#" class="link-btn">read more</a>
            </div>
            <div class="icons">
               <span> <i class="fas fa-calendar"></i> 21st may, 2022 </span>
               <span> <i class="fas fa-user"></i> by admin </span>
            </div>
         </div>

      </div>

   </section>
@endsection
