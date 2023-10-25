@extends('layouts.dashboard') @section('content')
<div class="flex">
    <form
        action="{{ route('application.update', $application->id) }}"
        method="POST"
    >
        @csrf @method('PUT')
        <div class="mb-5 mr-2">
            <label for="name" class="text-gray-700"> Nama Aplikasi </label>
            <input
                type="text"
                name="name"
                id="name"
                class="flex-1 w-full px-4 py-2 mt-2 text-base placeholder-gray-400 bg-gray-300 border border-transparent border-gray-300 rounded-lg shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                value="{{ old('name', $application->name) }}"
                placeholder="Nama Aplikasi"
                autofocus
            />
            @error('name')
            <div class="font-medium text-red-600 invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div>
            <label
                class="relative inline-flex items-center mb-4 cursor-pointer"
            >
                <input
                    {{ $application->status ? 'checked' : '' }}
                    type="checkbox"
                    value="{{ $application->status }}"
                    class="sr-only peer"
                    id="toggleSwitch"
                    name="status"
                />
                <div
                    class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"
                ></div>
                <span
                    class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300"
                    >Status</span
                >
            </label>
        </div>
        <div class="flex items-end">
            <button
                type="submit"
                class="px-4 py-2 mb-5 mr-2 text-white bg-gray-500 border rounded-lg hover:bg-green-500"
            >
                Update Data
            </button>
            <a
                href="{{ route('application.index') }}"
                class="px-4 py-2 mb-5 mr-2 text-white bg-red-500 border rounded-lg hover:bg-gray-500"
                >Cancel</a
            >
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
    document.getElementById('toggleSwitch').addEventListener('change', function() {
        this.value = this.checked ? 1 : 0;
    });
</script>
@endpush
