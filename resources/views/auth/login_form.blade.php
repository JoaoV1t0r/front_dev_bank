@extends('base')

@section('content')
    <div class="row">
        <div class="col-6 mx-auto">
            <form action="{{ route('login.post') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp"
                        placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input name="password" type="password" class="form-control" id="password" placeholder="Password">
                </div>
                <div class="col mt-3 text-center">
                    <a href="{{ route('password.reset') }}">
                        <p>Esqueci minha senha</p>
                    </a>
                </div>
                <div class="col text-center mt-2">
                    <button type="submit" class="btn btn-dark btn-lg mx-auto">Login</button>
                </div>
            </form>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
