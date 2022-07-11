@extends('base')

@section('content')
    <div class="row">
        <div class="col-6 mx-auto">
            <form action="{{ route('register.post') }}" method="POST">
                <h1>Apos o envio ficará pendente o seu cadastro, quando for aceito será enviado um email.</h1>
                @csrf
                <div class="form-group">
                    <label for="password">Nome</label>
                    <input value="{{ old('name') }}" name="name" type="text" class="form-control" placeholder="Nome">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input value="{{ old('email') }}" name="email" type="email" class="form-control" id="email"
                        aria-describedby="emailHelp" placeholder="Email">
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
                <div class="form-group">
                    <label for="password">CPF</label>
                    <input value="{{ old('cpf') }}" name="cpf" type="text" class="form-control" placeholder="CPF">
                </div>
                <div class="form-group">
                    <label for="password">RG</label>
                    <input value="{{ old('rg') }}" name="rg" type="text" class="form-control" placeholder="RG">
                </div>
                <div class="form-group">
                    <label for="password">Telefone</label>
                    <input value="{{ old('phone') }}" name="phone" type="text" class="form-control"
                        placeholder="Telefone">
                </div>
                {{-- <div class="form-group">
                    <label for="password">Foto CPF</label>
                    <input name="cpfPhoto" type="file" accept=".png" class="form-control" placeholder="Foto CPF">
                </div>
                <div class="form-group">
                    <label for="password">Foto RG</label>
                    <input name="rgPhoto" type="file" accept=".png" class="form-control" placeholder="Foto RG">
                </div>
                <div class="form-group">
                    <label for="password">Foto Endereço</label>
                    <input name="confirmAddressPhoto" type="file" accept=".png" class="form-control"
                        placeholder="Foto Endereço">
                </div> --}}
                <div class="col text-center mt-2">
                    <button type="submit" class="btn btn-dark btn-lg mx-auto">Cadastrar</button>
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
