@extends('base')

@section('content')
    <div class="row">
        <div class="col-6 mx-auto">
            <form action="{{ route('user.create_account.post') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="password">Password</label>
                    <input required name="password" type="password" class="form-control" id="password" placeholder="Password">
                </div>
                <div class="col text-center mt-2">
                    <button type="submit" class="btn btn-dark btn-lg mx-auto">Cadastrar Senha da Conta</button>
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
