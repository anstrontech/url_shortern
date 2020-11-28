<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @section('head')
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tailwind.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mdb.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    @show
    
    @yield('perpagecss')

<title>{{ $title_ ?? 'Login' }}</title>
</head>

<body>
   @isset($id)
   <nav class="flex items-center justify-between flex-wrap bg-teal-500 p-3 bg-primary">
    <div class="flex items-center flex-shrink-0 text-white mr-6">
        
        <span class="font-semibold text-xl tracking-tight">URL SHORTNER</span>
    </div>
    <div>
        <form method="POST" class="d-flex" action="{{ url('logout') }}"> 
            @csrf
            <a href="{{ url('/') }}" class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-teal-500 hover:bg-white lg:mt-0 btn-primary">Home</a>
            <a href="{{ url('userprofile') }}" class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-teal-500 hover:bg-white lg:mt-0 btn-primary">Profile</a>
            <button type="submit" class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-teal-500 hover:bg-white lg:mt-0 btn-danger">Logout</button>
        </form>
      </div>
  </nav>
   @endisset
   
    @yield('content')
    
    @section('footer')
        <script type="text/javascript" src="{{ URL::asset('js/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/popper.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/mdb.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/jquery.dataTables.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/dataTables.bootstrap4.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/main.js') }}"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script> 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
    @show
</body>

</html>

@yield('perpagescript')