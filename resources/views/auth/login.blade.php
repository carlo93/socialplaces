@extends('layouts.guest')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Login</h1>
                <x-jet-validation-errors class="mb-4" />

                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="guest-form">
                    @csrf

                    <div class="form-group">
                        <div>
                            <x-jet-label for="email" value="{{ __('Email') }}" />    
                        </div>
                        <div>
                            <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                        </div>
                        
                    </div>

                    <div class="form-group">
                        <div>
                            <x-jet-label for="password" value="{{ __('Password') }}" />
                        </div>
                        <div>
                            <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="remember_me" class="flex items-center">
                            <x-jet-checkbox id="remember_me" name="remember" />
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        {{-- @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif --}}

                        <x-jet-button>
                            {{ __('Log in') }}
                        </x-jet-button>
                    </div>
                </form>  
            </div>
        </div>
    </div>
@endsection

