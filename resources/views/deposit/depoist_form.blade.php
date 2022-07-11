@extends('base')

@section('content')
    <div class="row">
        <div class="col-6 mx-auto">
            <div class="col">
                <h2>Seu saldo: {{ session()->get('account')->balance }}</h2>
            </div>
            @if (isset($depositUuid))
                <h6>Identificador para pagar Deposito: {{ $depositUuid }}</h6>
            @endif
            <form action="{{ route('user.deposit.post') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">Valor</label>
                    <input required value="{{ old('amount') }}" name="amount" type="number" class="form-control"
                        id="Valor" aria-describedby="ValorHelp" placeholder="Valor">
                </div>
                <div class="col text-center mt-2">
                    <button type="submit" class="btn btn-dark btn-lg mx-auto">Criar Deposito</button>
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
