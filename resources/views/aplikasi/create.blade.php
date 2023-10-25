@extends('layouts.dashboard') @section('content')
<div class="flex">
    <form action="{{ route('admin.store') }}" method="POST">
        @csrf
        <div class="grid grid-cols-2 gap-2">
            <div class="mb-5 mr-2">
                <label for="invoice" class="text-gray-700"> Invoice </label>
                <input
                    readonly
                    type="text"
                    name="invoice"
                    id="invoice"
                    class="flex-1 w-full px-4 py-2 mt-2 text-base placeholder-gray-400 bg-gray-300 border border-transparent border-gray-300 rounded-lg shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent @error('invoice') is-invalid @enderror"
                    value="{{ old('invoice', $uuid) }}"
                    placeholder="Invoice"
                />
                @error('invoice')
                <div class="font-medium text-red-600 invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-5 mr-2">
                <label for="name_id" class="text-gray-700">
                    Nama Aplikasi
                </label>
                <select
                    name="name_id"
                    class="flex w-full mt-2 bg-gray-300 border-gray-300 rounded-lg shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                    autofocus
                >
                    <option selected disabled>Pilih Salah Satu</option>
                    @foreach ($apps as $data)
                    <option value="{{ old('name_id', $data->id)}}">
                        {{ $data->name }}
                    </option>
                    @endforeach
                </select>
                @error('name_id')
                <div class="font-medium text-red-600 invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="grid grid-cols-2 gap-2">
            <div class="mb-5 mr-2">
                <label for="no_hp" class="text-gray-700"> No. HP </label>
                <input
                    type="number"
                    name="no_hp"
                    id="no_hp"
                    class="flex-1 w-full px-4 py-2 mt-2 text-base placeholder-gray-400 bg-gray-300 border border-transparent border-gray-300 rounded-lg shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent @error('no_hp') is-invalid @enderror"
                    placeholder="Nomor HP"
                    value="{{ old('no_hp') }}"
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
                    class="flex-1 w-full px-4 py-2 mt-2 text-base placeholder-gray-400 bg-gray-300 border border-transparent border-gray-300 rounded-lg shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent @error('username') is-invalid @enderror"
                    placeholder="Username"
                    value="{{ old('username') }}"
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
                    class="flex-1 w-full px-4 py-2 mt-2 text-base placeholder-gray-400 bg-gray-300 border border-transparent border-gray-300 rounded-lg shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent @error('email') is-invalid @enderror"
                    placeholder="Email"
                    value="{{ old('email') }}"
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
                    class="flex-1 w-full px-4 py-2 mt-2 text-base placeholder-gray-400 bg-gray-300 border border-transparent border-gray-300 rounded-lg shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent @error('password') is-invalid @enderror"
                    placeholder="Password"
                    value="{{ old('password') }}"
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
                Tambah Data
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
