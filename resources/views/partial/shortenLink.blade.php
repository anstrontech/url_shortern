@extends('layout')

@section('content')
<div class="container">
    <h1 align="center">Url Shortener - codexsite.com</h1>
    <div class="card">
      <div class="card-header">
        <form method="POST" action="{{ route('generate.shorten.link.post') }}">
            @csrf
            <div class="input-group mb-3">
              <input type="text" name="link" class="form-control" placeholder="Enter URL" aria-label="Recipient's username" aria-describedby="basic-addon2">
              <div class="flex items-center justify-between">
                <button
                    class="bg-blue-900 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit">
                    Generate
                </button>
              </div>
            </div>
        </form>
      </div>
      <div class="card-body">
              @if (Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ Session::get('success') }}</p>
                </div>
            @endif
            <table class="table table-bordered table-sm">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Short Link</th>
                        <th>Link</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($shortLinks as $key => $row)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td><a href="{{ route('shorten.link', $row->code) }}" target="_blank">{{ route('shorten.link', $row->code) }}</a></td>
                            <td class="text-break">{{ $row->link }}</td>
                        <td><a href="?urlcode={{ $row->code }}" class="btn btn-danger btn-sm">Delete</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
      </div>
    </div>
</div>
@stop