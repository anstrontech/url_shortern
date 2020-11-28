@extends('layout')
@section('content')
<nav class="flex items-center justify-between flex-wrap bg-teal-500 p-3 bg-primary">
    <div class="flex items-center flex-shrink-0 text-white mr-6">
        <span class="font-semibold text-xl tracking-tight">URL SHORTNER</span>
    </div>
</nav>
<div class="container">
    <div class="w-full max-w-xs m-auto mt-10 pt-10">
       
    <form method="post" action="{{ url('register') }}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @isset($message)
                @if ($message)
                <div class="bg-{{ $class }}-100 border border-{{ $class }}-400 text-{{ $class }}-700 px-2 py-2 mb-4 rounded relative" role="alert">
                    <strong class="font-bold">{{ $message }}</strong>
                </div>
                @endif
            @endisset
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="mb-4">
                <label class="block text-blue-900 text-sm font-bold mb-2" for="name">
                    Name
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-blue-900 leading-tight focus:outline-none focus:shadow-outline"
                    id="name" type="text" name="name" placeholder="Name">
            </div>
            <div class="mb-4">
                <label class="block text-blue-900 text-sm font-bold mb-2" for="username">
                    Username
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-blue-900 leading-tight focus:outline-none focus:shadow-outline"
                    id="username" type="text" name="username" placeholder="Username">
            </div>
            <div class="mb-4">
                <label class="block text-blue-900 text-sm font-bold mb-2" for="email">
                    Email
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-blue-900 leading-tight focus:outline-none focus:shadow-outline"
                    id="email" type="email" name="email" placeholder="Email">
            </div>
            <div class="mb-6">
                <label class="block text-blue-900 text-sm font-bold mb-2" for="password">
                    Password
                </label>
                <input
                    class="shadow appearance-none border  rounded w-full py-2 px-3 text-blue-900 mb-3 leading-tight focus:outline-none focus:shadow-outline" name="password"
                    id="password" type="password" placeholder="*******">
            </div>
            <div class="flex items-center justify-between">
                <button
                    class="bg-blue-900 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit">
                    Create
                </button>
            <a href="/" class="inline-block align-baseline font-bold text-sm text-blue-900 hover:text-blue-800" href="#">
                    Already Have One?
                </a>
            </div>
        </form>
    </div>
</div>
@stop