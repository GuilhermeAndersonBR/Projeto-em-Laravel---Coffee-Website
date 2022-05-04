@extends('layout.main-layout')

@section('title', 'Coffee Website - Laravel Utilities & New Libraries')

@section('main-content')
        <div class="site-container d-flex align-items-center justify-content-center w-100 min-vh-100">
            <div class="card-container bg-light p-5 d-flex justify-content-center text-black">

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    @if (session('status'))
                        <h3 class="text-success">
                            {{ session('status') }}
                        </h3>
                    @endif

                    <x-jet-validation-errors style="color:red;" />

                    <div>
                        <x-jet-label for="email" value="{{ __('Email') }}" />
                        <x-jet-input id="email" class="block mt-1 w-100" type="email" name="email" :value="old('email')" required autofocus />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="password" value="{{ __('Password') }}" />
                        <x-jet-input id="password" class="block mt-1 w-100" type="password" name="password" required autocomplete="current-password" />
                    </div>

                    <div class="block mt-4">
                        <label for="remember_me" class="flex items-center">
                            <x-jet-checkbox id="remember_me" name="remember" />
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif

                        <x-jet-button class="ml-4 bg-dark">
                            {{ __('Log in') }}
                        </x-jet-button>
                        <p class="account mt-5">don't have an account? <a href="/register">create one!</a></p>
                    </div>
                </form>
            </div>
        </div>
@endsection