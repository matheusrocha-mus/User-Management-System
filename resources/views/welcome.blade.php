@extends('layouts.guest')

@section('title', 'Home')

@section('content')
<main class="mt-6">
    <x-validation-errors class="mb-4" />
    <div class="grid gap-6 lg:grid-cols-2 lg:gap-8">
        <div id="admin-card" class="flex flex-col gap-6 overflow-hidden rounded-lg p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 transition duration-300 focus:outline-none md:row-span-3 lg:p-10 lg:pb-10 bg-zinc-900 ring-zinc-800 text-white/70 focus-visible:ring-[#FF2D20]">
            <div id="admin-card-content" class="flex justify-content-center gap-6 flex-col">
                <h1 class="h1 font-semibold">Admin</h1>

                @session('status')
                    <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                        {{ $value }}
                    </div>
                @endsession

                <form id="admin-login-form" method="POST" action="{{ route('login') }}">
                    @csrf

                    <div>
                        <x-label for="admin-email" value="{{ __('Email') }}" />
                        <x-input id="admin-email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    </div>

                    <div class="mt-4">
                        <x-label for="admin-password" value="{{ __('Password') }}" />
                        <x-input id="admin-password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                    </div>

                    <input id="admin-login-role" type="hidden" name="role" value="ADMIN" />

                    <div class="block mt-4">
                        <label for="remember-admin" class="flex items-center">
                            <x-checkbox id="remember-admin" name="remember-admin" />
                            <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif

                        <x-button class="ms-4">
                            {{ __('Log in') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>

        <div id="user-card" class="flex flex-col gap-6 overflow-hidden rounded-lg p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 transition duration-300 focus:outline-none md:row-span-3 lg:p-10 lg:pb-10 bg-zinc-900 ring-zinc-800 text-white/70 focus-visible:ring-[#FF2D20]">
            <div id="user-card-content" class="flex justify-content-center gap-6 flex-col">
                <h1 class="h1 font-semibold">Regular User</h1>

                @session('status')
                    <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                        {{ $value }}
                    </div>
                @endsession

                <form id="user-login-form" method="POST" action="{{ route('login') }}">
                    @csrf

                    <div>
                        <x-label for="user-email" value="{{ __('Email') }}" />
                        <x-input id="user-email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    </div>

                    <div class="mt-4">
                        <x-label for="user-password" value="{{ __('Password') }}" />
                        <x-input id="user-password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                    </div>

                    <input id="user-login-role" type="hidden" name="role" value="USER" />

                    <div class="block mt-4">
                        <label for="remember-user" class="flex items-center">
                            <x-checkbox id="remember-user" name="remember-user" />
                            <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif

                        <x-button class="ms-4">
                            {{ __('Log in') }}
                        </x-button>
                    </div>
                </form>
                <div class="flex justify-content-center align-items-center">
                    <p>Don't have an account?
                        <button type="button" data-bs-toggle="modal" data-bs-target="#registerModal" class="bg-transparent text-white">
                            <u>Register here</u>
                        </button>.
                    </p>
                </div>
            </div>
        </div>
    </div>
</main>

<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-dark modal-dialog-centered">
        <div class="modal-content bg-dark text-white">
            <div class="modal-header">
                <h5 class="modal-title" id="registerModalLabel">Register</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="register-form" method="POST" action="{{ route('register') }}">
                    @csrf

                    <div>
                        <x-label for="register-name" value="{{ __('Name') }}" />
                        <x-input id="register-name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    </div>

                    <div class="mt-4">
                        <x-label for="register-email" value="{{ __('Email') }}" />
                        <x-input id="register-email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    </div>

                    <div class="mt-4">
                        <x-label for="register-password" value="{{ __('Password') }}" />
                        <x-input id="register-password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                    </div>

                    <div class="mt-4">
                        <x-label for="register-password_confirmation" value="{{ __('Confirm Password') }}" />
                        <x-input id="register-password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                    </div>

                    <input id="register-role" type="hidden" name="role" value="USER" />

                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="mt-4">
                            <x-label for="terms">
                                <div class="flex items-center">
                                    <x-checkbox name="terms" id="terms" required />

                                    <div class="ms-2">
                                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">'.__('Terms of Service').'</a>',
                                                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">'.__('Privacy Policy').'</a>',
                                        ]) !!}
                                    </div>
                                </div>
                            </x-label>
                        </div>
                    @endif

                    <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>

                        <x-button class="ms-4">
                            {{ __('Register') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection