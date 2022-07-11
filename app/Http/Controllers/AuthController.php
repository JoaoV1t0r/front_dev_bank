<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login_form');
    }

    public function login(LoginRequest $loginRequest)
    {
        $response = Http::post('http://api.devbank.local/api/auth/login', [
            'email' => $loginRequest->email,
            'password' => $loginRequest->password,
        ]);
        session()->put('token', $response->object()->data->accessToken);
        session()->put('user', $response->object()->data->user);
        if (!$response->object()->data->account)
            return redirect()->route('user.create_account');
        session()->put('account', $response->object()->data->account);
        return redirect()->route('user.home');
    }

    public function showRegistrationForm()
    {
        return view('auth.registration_form');
    }

    public function postRegisterUser(RegistrationRequest $request)
    {
        $response = Http::post('http://api.devbank.local/api/users', [
            'email' => $request->email,
            'password' => $request->password,
            'name' => $request->name,
            'phone' => $request->phone,
            'cpf' => $request->cpf,
            'rg' => $request->rg
        ]);
        return redirect()->route('home');
    }

    public function logout()
    {
        session()->forget('token');
        session()->forget('user');
        session()->forget('account');
        return redirect()->route('home');
    }

    public function showPasswordReset()
    {
        return view('recuperar_senha');
    }

    public function postPasswordReset(Request $request)
    {
        $response = Http::post('http://api.devbank.local/api/users/request/password-reset', [
            'email' => $request->email,
        ]);
        if ($response->status() != 202) {
            return view('recuperar_senha', ['error' => $response->object()->data->message ?? 'Erro ao recuperar senha']);
        }
        return redirect()->route('password.reset.form');
    }

    public function showPasswordResetForm()
    {
        return view('cadastrar_nova_senha');
    }

    public function postPasswordResetForm(Request $request)
    {
        $response = Http::post('http://api.devbank.local/api/users/password-reset', [
            'password' => $request->password,
            'password_confirmation' => $request->password_confirmation,
            'token' => $request->token,
            'email' => $request->email,
        ]);
        dd($response->object());
        if ($response->status() != 202) {
            return view('cadastrar_nova_senha', ['error' => $response->object()->data->message ?? 'Erro ao cadastrar senha']);
        }
        return redirect()->route('home');
    }
}
