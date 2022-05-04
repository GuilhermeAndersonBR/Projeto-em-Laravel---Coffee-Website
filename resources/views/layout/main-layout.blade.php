<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>@yield('title')</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- bootstrap cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="/css/style.css">

   <!-----------------------------------LINK DO JQuery---------------------------------->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

   <script>
        $(document).ready(function(){
            //Verifica se a Janela está no topo
            $(window).scroll(function(){
                if ($(this).scrollTop() > 800) {
                    $('.scroll-btn').fadeIn();
                } else {
                    $('.scroll-btn').fadeOut();
                }
            });
        });
    </script>
    <script>
        function loading(){
            document.getElementById('boxLoading').style.opacity = '0';
            
            setTimeout(() => {
                document.getElementById('boxLoading').style.display = 'none';
            }, 800);

            document.getElementById('siteContent').style.display = 'block';
        }
    </script>

</head>
<body onload="loading()">
    <div id="boxLoading" class="box-loading">
        <img src="/img/spinner.svg" alt="spinner">
    </div>
    <div id="siteContent">
        <header class="header fixed-top">

            <div class="container">
        
            <div class="row align-items-center">
        
                <a href="/" class="logo mr-auto"> <i class="fas fa-mug-hot"></i> coffee </a>
        
                <nav class="nav">
                    @auth
                    <a href="/criar">criar</a>
                    <a href="/dashboard">seus produtos</a>
                    @endauth
                    <a href="/menu">menu</a>
                    <a href="/contact">contact</a>
                    <a href="#blogs">blogs</a>
                </nav>
                
                <div class="icons">
                    <div id="menu-btn" class="fas fa-bars"></div>
                    @auth
                    <button type="button" class="bg-transparent position-relative text-white">
                        <a class="text-white" href="/compras"><i style="font-size:15pt;" class="fas fa-shopping-cart"></i></a>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-dark">
                            {{ count(Auth::user()->productsAsParticipant) }}
                        </span>
                    </button>
                    @endauth
                    <div id="login-btn" class="fas fa-user-cog"></div>
                </div>
        
            </div>
        
            </div>
        
        </header>

        <div class="login-form">
            @guest
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div id="close-login-form" class="fas fa-times"></div>
                <a href="#" class="logo mr-auto"> <i class="fas fa-mug-hot"></i> coffee </a><hr>
                <h3>let's start a new great day</h3>
                <x-jet-label  for="email" value="{{ __('Email') }}" />
                <x-jet-input class="box" id="email" type="email" name="email" :value="old('email')" required autofocus placeholder="enter your email"/>
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input class="box" id="password" type="password" name="password" required autocomplete="current-password" placeholder="enter your password"/>
                <div class="flex">
                    <x-jet-checkbox type="checkbox" id="remember-me" name="remember" />
                    <span for="remember-me">{{ __('Remember me') }}</span>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>
                <x-jet-button class="link-btn bg-dark">
                    {{ __('Log Now') }}
                </x-jet-button>
                <p class="account">don't have an account? <a href="/register">create one!</a></p>
            </form>
            @endguest

            @auth
            <form action="/logout" method="POST">
                @csrf
                <div id="close-login-form" class="fas fa-times"></div>
                <a href="#" class="logo mr-auto"> <i class="fas fa-mug-hot"></i> coffee </a><hr>
                <a href="/profile"><h2 class="logo">Olá {{ Auth::user()->name }}.</h2></a>
                <h3>let's start a new great day</h3>
                <h4>{{ Auth::user()->email }}</h4>
                <a href="/logout" 
                  class="link-btn bg-dark text-white" 
                  onclick="event.preventDefault();
                  this.closest('form').submit();">
                  Sair
                </a>
              </form>
            @endauth
        </div>

        <main id="">
            
            @if(session('msg'))
            <p class="msg">{{ session('msg') }}</p>
            @endif
        @yield('main-content')
        </main>

        <section class="newsletter">
            <div class="container">
                <h3>newsletter</h3>
                <p>subscribe for latest upadates</p>
                <form action="">
                    <input type="email" name="" placeholder="enter your email" id="" class="email">
                    <input type="submit" value="subscribe" class="link-btn">
                </form>
            </div>
        </section>

        <section class="footer container">

            <a href="#" class="logo"> <i class="fas fa-mug-hot"></i> coffee </a>

            <p class="credit"> created by <span>Guilherme</span> | all rights reserved! </p>

            <div class="share">
                <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-linkedin"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-github"></a>
            </div>
        
        </section>
    </div>

<!-- footer section ends -->









<!-- custom js file link  -->
<script src="/js/script.js"></script>

</body>
</html>