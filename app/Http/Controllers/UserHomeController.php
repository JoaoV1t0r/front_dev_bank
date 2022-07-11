<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class UserHomeController extends Controller
{
    public function index()
    {
        return view('user.home');
    }

    public function createAccount()
    {
        return view('user.account.create_account');
    }

    public function storeAccount(Request $request)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session()->get('token'),
        ])->post('http://api.devbank.local/api/account', [
            'password' => $request->password,
        ]);
        session()->put('account', $response->object()->data);
        return redirect()->route('user.home');
    }

    public function editAccount()
    {
        return view('user.account.account');
    }

    public function updateAccount(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed',
            'oldPassword' => 'required',
        ]);
        // dd($request->toArray());
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session()->get('token'),
        ])->put('http://api.devbank.local/api/account/password', [
            'oldPassword' => $request->oldPassword,
            'password' => $request->password,
            'password_confirmation' => $request->password_confirmation,
        ]);
        if ($response->status() != 200) {
            return view('user.account.account', ['error' => $response->object()->data->message ?? 'Erro ao atualizar conta']);
        }
        return redirect()->route('user.account.edit');
    }

    public function registrationRequest()
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session()->get('token'),
        ])->get('http://api.devbank.local/api/registration-confirm');
        return view('registration_request.list', ['registrationRequests' => $response->object()->data]);
    }

    public function confirmRegistrationRequest(int $requestId)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session()->get('token'),
        ])->post('http://api.devbank.local/api/registration-confirm/' . $requestId);
        return redirect()->route('user.registration_request');
    }

    public function transfer()
    {
        return view('transfer.form_tranfer');
    }

    public function confirmTransfer(Request $request)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session()->get('token'),
        ])->post('http://api.devbank.local/api/transfer', $request->toArray());
        return redirect()->route('user.home');
    }

    public function deposit()
    {
        return view('deposit.depoist_form');
    }

    public function createDeposit(Request $request)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session()->get('token'),
        ])->post('http://api.devbank.local/api/deposit', $request->toArray());
        return view('deposit.depoist_form', ['depositUuid' => $response->object()->data->uuid]);
    }

    public function confirmDeposit(Request $request)
    {
        return view('deposit.deposit_payer');
    }

    public function confirmDepositPayer(Request $request)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session()->get('token'),
        ])->post('http://api.devbank.local/api/deposit/pay', $request->toArray());
        if ($response->status() != 200) {
            return view('deposit.deposit_payer', ['error' => $response->object()->data->message ?? 'Erro durante o pagamento']);
        }
        return redirect()->route('user.home');
    }
}
