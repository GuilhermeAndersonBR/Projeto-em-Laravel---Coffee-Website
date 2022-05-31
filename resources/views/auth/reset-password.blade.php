@extends('layout.main-layout')

@section('title', 'Coffee Website - Laravel Utilities & New Libraries')

@section('main-content')
        <div class="site-container d-flex align-items-center justify-content-center w-100 min-vh-100">
            <div class="card-container bg-light p-5 d-flex justify-content-center text-black">

                <form class="d-flex flex-column align-items-center" method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <x-jet-validation-errors class="mb-4" />

                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
        
                    <div class="container mt-4">
                        <x-jet-label for="email" value="{{ __('Email') }}" />
                        <x-jet-input id="email" class="block mt-1 w-100" type="email" name="email" :value="old('email', $request->email)" required autofocus />
                    </div>
        
                    <div class="container mt-4">
                        <x-jet-label for="password" value="{{ __('Password') }}" />
                        <x-jet-input id="password" class="block mt-1 w-100" type="password" name="password" required autocomplete="new-password" />
                    </div>
        
                    <div class="container mt-4">
                        <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                        <x-jet-input id="password_confirmation" class="block mt-1 w-100" type="password" name="password_confirmation" required autocomplete="new-password" />
                    </div>
        
                    <div class="flex items-center justify-end mt-4">
                        <x-jet-button class="ml-4 bg-dark">
                            {{ __('Redefinir senha') }}
                        </x-jet-button>
                    </div>
                </form>
            </div>
        </div>
@endsection
