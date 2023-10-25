@extends('layouts.dashboard') @section('content')
<div class="flex">
    <form action="{{ route('admin.update', $admin) }}" method="POST">
        @csrf @method('PUT')
        <div class="grid grid-cols-2 gap-2">
            <div class="mb-5 mr-2">
                <label for="invoice" class="text-gray-700"> Invoice </label>
                <input
                    readonly
                    type="text"
                    name="invoice"
                    id="invoice"
                    class="flex-1 w-full px-4 py-2 mt-2 text-base placeholder-gray-400 bg-gray-300 border border-transparent border-gray-300 rounded-lg shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                    value="{{ $admin->invoice }}"
                />
            </div>
            <div class="mb-5 mr-2">
                <label for="name_id" class="text-gray-700">
                    Nama Aplikasi
                </label>
                <input
                    readonly
                    type="text"
                    id="name"
                    class="flex-1 w-full px-4 py-2 mt-2 text-base placeholder-gray-400 bg-gray-300 border border-transparent border-gray-300 rounded-lg shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                    value="{{ $admin->application->name }}"
                />
            </div>
        </div>
        <div class="grid grid-cols-2 gap-2">
            <div class="mb-5 mr-2">
                <label for="no_hp" class="text-gray-700"> No. HP </label>
                <input
                    type="number"
                    name="no_hp"
                    id="no_hp"
                    class="flex-1 w-full px-4 py-2 mt-2 text-base placeholder-gray-400 bg-gray-300 border border-transparent border-gray-300 rounded-lg shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent @error('no_hp') ring-red-600 @enderror"
                    value="{{ old('no_hp', $admin->no_hp) }}"
                    placeholder="Nomor HP"
                    autofocus
                />
                @error('no_hp')
                <div class="font-medium text-red-600 invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-5 mr-2">
                <label for="username" class="text-gray-700"> Username </label>
                <input
                    type="text"
                    name="username"
                    id="username"
                    class="flex-1 w-full px-4 py-2 mt-2 text-base placeholder-gray-400 bg-gray-300 border border-transparent border-gray-300 rounded-lg shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                    value="{{ old('username', $admin->username) }}"
                    placeholder="Username"
                />
                @error('username')
                <div class="font-medium text-red-600 invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="grid grid-cols-2 gap-2">
            <div class="mb-5 mr-2">
                <label for="email" class="text-gray-700"> Email </label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    class="flex-1 w-full px-4 py-2 mt-2 text-base placeholder-gray-400 bg-gray-300 border border-transparent border-gray-300 rounded-lg shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                    value="{{ old('email', $admin->email) }}"
                    placeholder="Email"
                />
                @error('email')
                <div class="font-medium text-red-600 invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-5 mr-2">
                <label for="password" class="text-gray-700"> Password </label>
                <input
                    type="text"
                    name="password"
                    id="password"
                    class="flex-1 w-full px-4 py-2 mt-2 text-base placeholder-gray-400 bg-gray-300 border border-transparent border-gray-300 rounded-lg shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                    value="{{ old('password', $admin->password) }}"
                    placeholder="Password"
                />
                @error('password')
                <div class="font-medium text-red-600 invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="grid grid-cols-2 gap-2">
            <div class="mb-5 mr-2">
                <label for="pin" class="text-gray-700"> PIN </label>
                <input
                    type="number"
                    name="pin"
                    id="pin"
                    class="flex-1 w-full px-4 py-2 mt-2 text-base placeholder-gray-400 bg-gray-300 border border-transparent border-gray-300 rounded-lg shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent @error('pin') is-invalid @enderror"
                    placeholder="PIN (6 Digit)"
                    value="{{ old('pin') }}"
                />
                @error('pin')
                <div class="font-medium text-red-600 invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="flex items-end">
            <button
                type="submit"
                class="px-4 py-2 mb-5 mr-2 text-white bg-gray-500 border rounded-lg hover:bg-green-500"
            >
                Update Data
            </button>
            <a
                href="{{ route('admin.index') }}"
                class="px-4 py-2 mb-5 mr-2 text-white bg-red-500 border rounded-lg hover:bg-gray-500"
            >
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
