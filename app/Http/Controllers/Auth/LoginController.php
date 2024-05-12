<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('admin')->only('authenticated');
    }

    protected function authenticated(Request $request, $user)
    {
        // Xử lý khi người dùng đăng nhập thành công
        return redirect()->intended($this->redirectPath());
    }
	
	public function username()
	{
		$identity = request()->get('email');
		if(is_numeric($identity))
			$fieldName = 'phone';
		elseif(filter_var($identity, FILTER_VALIDATE_EMAIL))
			$fieldName = 'email';
		else
			$fieldName = 'username';
		request()->merge([$fieldName => $identity]);
		return $fieldName;
	}
}
