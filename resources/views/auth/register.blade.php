@extends('layouts.guest')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
    <h1>Register</h1>
        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}" class="guest-form">
            @csrf

            <div class="form-group">
                <div>
                    <x-jet-label for="name" value="{{ __('Name') }}" />
                </div>
                <div>
                    <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                </div>
            </div>

            <div class="form-group">
                <div>
                    <x-jet-label for="email" value="{{ __('Email') }}" />
                </div>
                <div>
                    <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                </div>
            </div>

            <div class="form-group">
                <div>
                    <x-jet-label for="password" value="{{ __('Password') }}" />
                </div>
                <div>
                    <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                </div>
            </div>

            <div class="form-group">
                <div>
                    <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                </div>
                <div>
                    <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="form-group">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <div class="form-group">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>
                </div>
                <x-jet-button>
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </div>
</div>
    </div>
@endsection