@extends('base')

@section('content')
    <div class="row">
        <div class="col-6 text-center">
            <a href="{{ route('login') }}" class="btn btn-dark btn-lg mx-auto">Login</a>
        </div>
        <div class="col-6 text-center">
            <a href="{{ route('register') }}" class="btn btn-danger btn-lg mx-auto">Cadastro</a>
        </div>
    </div>
@endsection
