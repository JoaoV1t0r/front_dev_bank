@extends('base')

@section('content')
    <div class="row">
        <div class="col-6 mx-auto">
            <div class="col">
                <h2>Seu saldo: {{ session()->get('account')->balance }}</h2>
            </div>
            <form action="{{ route('user.deposit_payer.post') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="password">Identificador do Deposito</label>
                    <input required value="{{ old('cpf') }}" name="depositUuid" type="text" class="form-control"
                        placeholder="CPF Do Destinitario">
                </div>
                <div class="form-group">
                    <label for="password">Senha</label>
                    <input required value="{{ old('password') }}" name="accountPassword" type="password"
                        class="form-control" placeholder="Senha">
                </div>
                <div class="col text-center mt-2">
                    <button type="submit" class="btn btn-dark btn-lg mx-auto">Tranferir</button>
                </div>
            </form>
        </div>
    </div>
    @if (isset($error))
        <div class="alert alert-danger">
            <p>{{ $error }}</p>
        </div>
    @endif
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
