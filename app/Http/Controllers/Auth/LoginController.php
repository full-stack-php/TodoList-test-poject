<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function login(Request $request)
    {

        if(Auth::check()){
            return redirect()->intended(route('/'));
        }

        $credentials = request(['email', 'password']);


        if (Auth::attempt($credentials)) {
            if (!$token = auth()->guard('api')->attempt($credentials)) {
                return response()->json(['error' => 'Unable to create JWT token'], 500);
            }
            return $this->respondWithToken($token);
        }
        return response()->json(['error' => 'Wrong credentials'], 500);
    }

    /**
     * Response with token
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->guard('api')->factory()->getTTL() * 60,
        ]);
    }

    /**
     * Logout current user.
     *
     * @return void
     */
    public function getLogout()
    {
        Auth::logout();
        auth()->logout();
        session()->invalidate();
        session()->regenerateToken();

        return redirect('/login');
    }
}
