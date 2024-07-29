<x-app-layout>

    @section('title', 'Dashboard')

    @push('styles')
    <link rel="stylesheet" type="text/css" href="{{ url('css/dashboard.css') }}">
    @endpush

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <x-validation-errors class="mb-4" />
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 p-6 overflow-hidden shadow-xl sm:rounded-lg">
                    <div id="new-admin-card" class="flex flex-col gap-6 overflow-hidden rounded-lg p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 transition duration-300 focus:outline-none md:row-span-3 lg:p-10 lg:pb-10 bg-zinc-900 ring-zinc-800 hover:text-white/70 hover:ring-zinc-700 focus-visible:ring-[#FF2D20]">
                        <div id="new-admin-card-content">
                            <div class="flex justify-content-between">
                                <h1 class="h1 font-semibold mb-0">Create New Admin</h1>
                                <button id="square-button" height="100%" type="button" data-bs-toggle="collapse" data-bs-target="#newAdminCollapse" aria-expanded="false" aria-controls="newAdminCollapse">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="#FF2D20" class="bi bi-arrow-down-square-fill" viewBox="0 0 16 16">
                                        <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm6.5 4.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L7.5 10.293V4.5a.5.5 0 0 1 1 0" />
                                    </svg>
                                </button>
                            </div>

                            <div class="collapse mt-3" id="newAdminCollapse">
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

                                    <input id="register-role" type="hidden" name="role" value="ADMIN" />

                                    <div class="flex items-center justify-end mt-4">
                                        <x-button class="ms-4">
                                            {{ __('Register') }}
                                        </x-button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <div class="mt-6 lg:mt-8">
                    <div id="search-user-card" class="flex flex-col gap-6 overflow-hidden rounded-lg p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 transition duration-300 focus:outline-none md:row-span-3 lg:p-10 lg:pb-10 bg-zinc-900 ring-zinc-800 text-white/70 hover:ring-zinc-700 focus-visible:ring-[#FF2D20]">
                        <div id="search-user-card-content" class="flex justify-content-center gap-6 flex-col">
                            <form id="search-form" action="/search" method="GET">
                                <div class="flex justify-content-between">
                                    <h1 class="h1 font-semibold">User Search</h1>
                                    <div class="input-group w-50 search-bar">
                                        <input id="search" name="search" type="text" class="form-control" placeholder="Search..." aria-label="Search..." aria-describedby="confirm-search">
                                        <button id="confirm-search" type="submit" class="input-group-text">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <div class="flex justify-content-evenly align-items-center mt-6">
                                    <div class="form-check">
                                        <label class="form-check-label" for="includeUser">Regular User</label>
                                        <input id="includeUser" class="form-check-input" type="checkbox" name="includeUser">
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label" for="includeAdmin">Admin</label>
                                        <input id="includeAdmin" class="form-check-input" type="checkbox" name="includeAdmin">
                                    </div>
                                    <div>
                                        <label class="form-label" for="startDate">Start Date</label>
                                        <div class="input-group">
                                            <input id="startDate" type="date" class="form-control rounded overflow-hidden" name="startDate">
                                        </div>
                                    </div>
                                    <div>
                                        <label class="form-label" for="endDate">End Date</label>
                                        <div class="input-group">
                                            <input id="endDate" type="date" class="form-control rounded overflow-hidden" name="endDate">
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <table id="users-query-results" class="table table-striped table-bordered table-dark table-hover table-responsive text-center mt-3 rounded overflow-hidden">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Register Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <th scope="row">{{ $user->name }}</th>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->role }}</td>
                                            <td>{{ $user->created_at }}</td>
                                            <td>
                                                @if ($user->role === 'USER')
                                                    <button class="btn" type="button" data-bs-toggle="modal" data-bs-target="#deleteUser" onclick="updateModalEmail('{{ $user->email }}');">Delete</button>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('modals')
    <div class="modal fade" id="deleteUser" tabindex="-1" aria-labelledby="deleteUserLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-dark modal-dialog-centered">
            <div class="modal-content bg-dark text-white">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteUserModalLabel">Delete User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="confirm-delete-user-form" class="d-flex flex-column gap-3" method="DELETE" action="/user">
                        <input type="hidden" name="userToDelete" value='{{ $user }}' />
                        <p>Are you sure you want to delete user <strong></strong>? This action is irreversible.</p>
                        <button id="confirm-delete-user" type="submit" class="btn">Confirm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endpush

    @push('scripts')
    <script src="{{ url('js/dashboard.js') }}"></script>
    @endpush
</x-app-layout>