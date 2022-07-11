@extends('base')

@section('content')
    <div class="row mt-3">
        <div class="col-6 mx-auto">
            <div class="col">
                <h4>Seu saldo: {{ session()->get('account')->balance }}</h4>
            </div>
            <div class="col mt-3">
                <h4>
                    Email: {{ session()->get('user')->email }}
                </h4>
            </div>
            <div class="col mt-3">
                <h4>
                    CPF: {{ session()->get('user')->cpf }}
                </h4>
            </div>
            <div class="col mt-3">
                <h4>
                    RG: {{ session()->get('user')->rg }}
                </h4>
            </div>
            <div class="col mt-3">
                <h4>
                    Telefone: {{ session()->get('user')->phone }}
                </h4>
            </div>
            <div class="col mt-3">
                <h4>
                    Nº da Conta: {{ session()->get('account')->number }}
                </h4>
            </div>

            <form action="{{ route('user.account.edit.post') }}" method="POST">
                @csrf
                <h2>Atualizar Senha</h2>
                <div class="form-group">
                    <label for="password">Senha Atual</label>
                    <input value="{{ old('password') }}" name="oldPassword" type="password" class="form-control"
                        placeholder="Senha">
                </div>
                <div class="form-group">
                    <label for="password">Senha</label>
                    <input value="{{ old('password') }}" name="password" type="password" class="form-control"
                        placeholder="Senha">
                </div>
                <div class="form-group">
                    <label for="password">Confirmar Senha</label>
                    <input value="{{ old('password_confirmation') }}" name="password_confirmation" type="password"
                        class="form-control" placeholder="Confirmar Senha">
                </div>
                <div class="col text-center mt-2">
                    <button type="submit" class="btn btn-dark btn-lg mx-auto">Atualizar</button>
                </div>
            </form>
            @if (isset($error))
                <div class="alert alert-danger">
                    <p>{{ $error }}</p>
                </div>
            @endif
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
