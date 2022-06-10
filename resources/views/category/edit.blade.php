@extends('layouts.dashboard')

@section('content')
    <div class="flex">
        <form action="{{ route('application.update', $application->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-5 mr-2">
                <label for="name" class="text-gray-700 ">
                Nama Aplikasi
                </label>
                <input type="text" name="name" id="name" class="flex-1 w-full px-4 py-2 mt-2 text-base placeholder-gray-400 bg-gray-300 border border-transparent border-gray-300 rounded-lg shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" value="{{ old('name', $application->name) }}" placeholder="Nama Aplikasi" autofocus/>
                @error('name')
                        <div class="font-medium text-red-600 invalid-feedback">
                            {{ $message }}
                        </div>
                @enderror 
            </div>
            <div class="flex items-end" >
                <button type="submit" class="px-4 py-2 mb-5 mr-2 text-white bg-gray-500 border rounded-lg hover:bg-green-500">Update Data</button>     
            </div>
        </form>
    </div>
@endsection