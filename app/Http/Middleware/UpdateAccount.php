<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UpdateAccount
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (session()->has('account')) :
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . session()->get('token'),
            ])->get('http://api.devbank.local/api/users/me');
            session()->put('account', $response->object()->data->account);
        endif;
        return $next($request);
    }
}
