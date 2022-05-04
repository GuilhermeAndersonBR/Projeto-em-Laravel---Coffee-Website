@extends('layout.main-layout')

@section('title', 'Coffee Website - Laravel Utilities & New Libraries')

@section('main-content')
    <div class="site-container d-flex align-items-center justify-content-center w-100 min-vh-100">
        <div class="card-container bg-light p-4 d-flex align-items-center text-black col-3 flex-column">
                <div class="mb-4 text-sm text-gray-600 text-black">
                    {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                </div>
        
                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif
        
                <x-jet-validation-errors style="color: red;" class="mb-4" />
        
                <form class="d-flex flex-column align-items-center w-100" method="POST" action="{{ route('password.email') }}">
                    @csrf
        
                    <div class="container">
                        <x-jet-label for="email" value="{{ __('Email') }}" />
                        <x-jet-input id="email" class="block mt-1 w-100 p-3" type="email" name="email" :value="old('email')" required autofocus />
                    </div>
        
                    <div class="flex items-center justify-end mt-4">
                        <x-jet-button class="ml-4 bg-dark">
                            {{ __('Email Password Reset Link') }}
                        </x-jet-button>
                    </div>
                </form>
        </div>
    </div>
@endsection
