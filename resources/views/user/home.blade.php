@extends('base')

@section('content')
    @if (session()->get('user')->role == 'admin')
        <div class="row">
            <div class="col-12 text-center">
                <a href="{{ route('user.registration_request') }}" class="btn btn-primary btn-lg mx-auto">Requisições de
                    Cadastro</a>
            </div>
        </div>
    @endif
    <div class="row mt-2">
        <div class="col-12 text-center">
            <a href="{{ route('user.account.edit') }}" class="btn btn-warning btn-lg mx-auto">Minha Conta</a>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-12 text-center">
            <a href="{{ route('user.transfer') }}" class="btn btn-dark btn-lg mx-auto">Tranferencia</a>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-12 text-center">
            <a href="{{ route('user.deposit') }}" class="btn btn-danger btn-lg mx-auto">Criar Deposito</a>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-12 text-center">
            <a href="{{ route('user.deposit_payer') }}" class="btn btn-outline-danger btn-lg mx-auto">Pagar Deposito</a>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-12 text-center">
            <a href="{{ route('logout') }}" class="btn btn-info btn-lg mx-auto">Logout</a>
        </div>
    </div>
@endsection
