<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use App\Services\UserAuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * @var UserAuthService
     */
    private $userAuthService;

    public function __construct(
        UserAuthService $userAuthService
    )
    {
        $this->userAuthService = $userAuthService;
    }

    public function getLoginForm(Request $request)
    {
        $backUri = $request->get('backUri');


        return view('pages.auth.login', [
            'backUri' => $backUri,
            'errors' => $request->get('errors') ?? []
        ]);
    }

    public function getRegisterForm()
    {
        return view('pages.auth.register');
    }

    public function auth(LoginRequest $request)
    {
        if (!$this->userAuthService->auth($request->email, $request->password))
        {
            return redirect(route('login', [
                'backUri' => $request->get('backUri'),
                'errors' => [
                    'Wrong username\email or password!'
                ]
            ]));
        }

        return redirect($request->get('backUri') ?? route('home'));
    }

    public function register()
    {

    }

    public function logout(Request $request)
    {

        Auth::logout();

        return redirect(route('login', [ 'backUri' => $request->get('backUri') ]));

    }
}
