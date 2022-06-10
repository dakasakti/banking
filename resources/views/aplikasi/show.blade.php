@extends('layouts.dashboard')

@section('content')

<!-- component -->
<div class="w-2/3 mx-auto">
    <div class="my-6 text-white bg-gray-500 rounded shadow-md">
      <table class="w-full text-left border-collapse"> <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
          <tr>
            <td class="px-6 py-4 text-sm font-bold uppercase border-b bg-grey-lightest text-grey-dark border-grey-light">Nama Aplikasi</td>
            <td class="px-6 py-4 text-sm font-bold border-b bg-grey-lightest text-grey-dark border-grey-light">{{ $admin->application->name }}</td>
          </tr>
          <tr>
            <td class="px-6 py-4 text-sm font-bold uppercase border-b bg-grey-lightest text-grey-dark border-grey-light">Nomor HP</td>
            <td class="px-6 py-4 text-sm font-bold border-b bg-grey-lightest text-grey-dark border-grey-light">{{ $admin->no_hp }}</td>
          </tr>
          <tr>
            <td class="px-6 py-4 text-sm font-bold uppercase border-b bg-grey-lightest text-grey-dark border-grey-light">Username</td>
            <td class="px-6 py-4 text-sm font-bold border-b bg-grey-lightest text-grey-dark border-grey-light">{{ $admin->username }}</td>
          </tr>
          <tr>
            <td class="px-6 py-4 text-sm font-bold uppercase border-b bg-grey-lightest text-grey-dark border-grey-light">Email</td>
            <td class="px-6 py-4 text-sm font-bold border-b bg-grey-lightest text-grey-dark border-grey-light">{{ $admin->email }}</td>
          </tr>
          <tr>
            <td class="px-6 py-4 text-sm font-bold uppercase border-b bg-grey-lightest text-grey-dark border-grey-light">Password</td>
            <td class="px-6 py-4 text-sm font-bold border-b bg-grey-lightest text-grey-dark border-grey-light">{{ $admin->password }}</td>
          </tr>
          <tr>
            <td class="px-6 py-4 text-sm font-bold uppercase border-b bg-grey-lightest text-grey-dark border-grey-light">PIN</td>
            <td class="px-6 py-4 text-sm font-bold border-b bg-grey-lightest text-grey-dark border-grey-light">{{ $admin->pin }}</td>
          </tr>
      </table>
    </div>
    <div class="container relative flex w-3/4 h-auto">
      <a href="{{ route('admin.index') }}"><button class="px-4 py-2 text-center text-white bg-gray-500 border rounded-lg hover:bg-green-500">Kembali</button></a>
    </div>
  </div>
@endsection