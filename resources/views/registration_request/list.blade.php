@extends('base')

@section('content')
    <div class="row">
        <div class="row row-cols-1 row-cols-md-2 g-4">
            @foreach ($registrationRequests as $registrationRequest)
                @if (!$registrationRequest->registrationRequestConfirmed)
                    <div class="col">
                        <div class="card my-2">
                            <div class="card-body">
                                <h5 class="card-title text-bold"> Id #{{ $registrationRequest->registrationRequestId }}
                                </h5>
                                <div class="row">
                                    <div class="col-auto">
                                        <strong>
                                            Nome:
                                        </strong>
                                    </div>
                                    <div class="col-auto">
                                        <p>{{ $registrationRequest->userName }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-auto">
                                        <strong>
                                            Email:
                                        </strong>
                                    </div>
                                    <div class="col-auto">
                                        <p>{{ $registrationRequest->userEmail }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-auto">
                                        <strong>
                                            Telefone:
                                        </strong>
                                    </div>
                                    <div class="col-auto">
                                        <p>{{ $registrationRequest->userPhone }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <a class="btn btn-dark"
                                        href="{{ route('user.registration_request.confirm', ['requestId' => $registrationRequest->registrationRequestId]) }}">Confirmar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection
