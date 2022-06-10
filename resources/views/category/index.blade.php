@extends('layouts.dashboard')

@section('content')
@if(Session()->has('success'))
<div id="alert-border-3" class="flex p-4 mb-4 bg-green-100 border-t-4 border-green-500 dark:bg-green-200" role="alert">
  <svg class="flex-shrink-0 w-5 h-5 text-green-700" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
  <div class="ml-3 text-sm font-medium text-green-700">
    {{ session('success') }}
  </div>
  <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-100 dark:bg-green-200 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 dark:hover:bg-green-300 inline-flex h-8 w-8"  data-collapse-toggle="alert-border-3" aria-label="Close">
    <span class="sr-only">Dismiss</span>
    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
  </button>
</div>
@endif

<div class="container relative left-0 z-50 flex w-3/4 h-auto">
    <a href="{{ route('application.create') }}"><button class="px-4 py-2 text-center text-white bg-gray-500 border rounded-lg hover:bg-green-500">Tambah Data</button></a>
</div>

<table class="min-w-full">
    <thead class="bg-gray-300 dark:bg-gray-700">
      <tr>
        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
          NO.
        </th>
        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
        NAMA
        </th>
        <th scope="col" class="text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
          ACTION
          </th>
      </tr>
    </thead>
    <tbody>
      @foreach ($apps as $i => $data)
      <tr class="border-b odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700 dark:border-gray-600">
        <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
        {{ $i+1 }}
        </td>
        <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
          {{ $data->name }}
          </td>
        <td>
          <ul class="lg:flex">
            <li class="my-2 lg:mr-2">
              <a href="{{ route('application.edit', $data->id) }}"><button class="block text-white bg-blue-700 hover:bg-gray-500 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                Edit
              </button></a>
            </li>
            <li class="my-2 mr-2">
            <form action="{{ route('application.destroy', $data->id) }}" method="POST">
              @csrf
              @method('delete')
              <button class="block text-white bg-red-700 hover:bg-gray-500 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="submit">
                Delete
              </button>
            </form>
            </li>
          </ul>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection