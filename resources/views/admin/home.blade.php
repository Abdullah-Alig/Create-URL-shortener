@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h4>Cambotutorial.com</h4>
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ Auth::user()->name }}
                    <br>
                    <table class="table table-bordered table-sm">  
                <thead>  
                    <tr>  
                        <th>ID</th>  
                        <th>Short Link</th>  
                        <th>Link</th>  
                    </tr>  
                </thead>  
                <tbody>  
                    @foreach($shortLinks as $row)  
                        <tr>  
                            <td>{{ $row->id }}</td>  
                            <td><a href="{{ route('shorten.link', $row->code) }}" target="_blank">{{ route('shorten.link', $row->code) }}</a></td>  
                            <td>{{ $row->link }}</td>  
                        </tr>  
                    @endforeach  
                </tbody>  
            </table>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection