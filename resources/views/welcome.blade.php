<x-guest-layout>

    @section('title', 'Home')

    @push('styles')
    <link rel="stylesheet" type="text/css" href="{{ url('css/welcome.css') }}">
    @endpush

        <x-validation-errors class="mb-4" />

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                {{ $value }}
            </div>
        @endsession

        <div class="grid gap-6 lg:grid-cols-2 lg:gap-8">
            <div id="admin-card" class="flex flex-col gap-6 overflow-hidden rounded-lg p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 transition duration-300 focus:outline-none md:row-span-3 lg:p-10 lg:pb-10 bg-zinc-900 ring-zinc-800 text-white/70 focus-visible:ring-[#FF2D20]">
                <div id="admin-card-content" class="flex justify-content-center gap-6 flex-col">
                    <h1 class="h1 font-semibold">Admin</h1>

                    @session('status')
                        <div class="mb-4 font-medium text-sm text-green-400">
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
                            <x-label class="form-label" for="admin-password" value="{{ __('Password') }}" />
                            <div class="input-group">
                                <x-input wire:model="password" id="admin-password" class="form-control" type="password" name="password" required autocomplete="current-password" />
                                <button onclick="togglePassword(event)" type="button" class="btn btn-outline-secondary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <input id="admin-login-role" type="hidden" name="role" value="ADMIN" />

                        <div class="block mt-4">
                            <label for="remember-admin" class="flex items-center">
                                <x-checkbox id="remember-admin" name="remember-admin" />
                                <span class="ms-2 text-sm text-gray-400">{{ __('Remember me') }}</span>
                            </label>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-400 hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800" href="{{ route('password.request') }}">
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
                        <div class="mb-4 font-medium text-sm text-green-400">
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
                            <x-label class="form-label" for="user-password" value="{{ __('Password') }}" />
                            <div class="input-group">
                                <x-input wire:model="password" id="user-password" class="form-control" type="password" name="password" required autocomplete="current-password" />
                                <button onclick="togglePassword(event)" type="button" class="btn btn-outline-secondary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <input id="user-login-role" type="hidden" name="role" value="USER" />

                        <div class="block mt-4">
                            <label for="remember-user" class="flex items-center">
                                <x-checkbox id="remember-user" name="remember-user" />
                                <span class="ms-2 text-sm text-gray-400">{{ __('Remember me') }}</span>
                            </label>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-400 hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800" href="{{ route('password.request') }}">
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

    @push('modals')
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
                            <x-label class="form-label" for="register-password" value="{{ __('Password') }}" />
                            <div class="input-group">
                                <x-input wire:model="password" id="register-password" class="form-control" type="password" name="password" required autocomplete="new-password" />
                                <button onclick="togglePassword(event)" type="button" class="btn btn-outline-secondary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div class="mt-4">
                            <x-label class="form-label" for="register-password-confirmation" value="{{ __('Confirm Password') }}" />
                            <div class="input-group">
                                <x-input wire:model="password" id="register-password-confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="off" />
                                <button onclick="togglePassword(event)" type="button" class="btn btn-outline-secondary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <input id="register-role" type="hidden" name="role" value="USER" />

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ms-4">
                                {{ __('Register') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endpush
</x-guest-layout>