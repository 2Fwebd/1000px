@extends('layouts.frontend')

@section('title', 'Welcome !')

@section('content')

    <div class="container">

        <header id="page-header">
            <h1>Welcome on 1000px!</h1>
            <h3>Get the best shots out of 500px every day.</h3>
        </header>

        <!-- Passing data to our JS -->
        <input type="hidden" id="call_url" value="{{ route('fetch') }}">

        @include('includes.grid')

    </div>

@endsection