@extends('base')

@section('content')
    <div class="row">
        <div class="col-6 mx-auto">
            <form action="{{ route('password.reset.email') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp"
                        placeholder="Enter email">
                </div>
                <div class="col text-center mt-2">
                    <button type="submit" class="btn btn-dark btn-lg mx-auto">Enviar E-mail</button>
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
