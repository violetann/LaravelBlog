<?php
namespace App\Http\Controllers\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Session;

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
     * Auth guard
     *
     * @var
     */
    protected $auth;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '';
    /**
     * Create a new controller instance.
     *
     * LoginController constructor.
     * @param Guard $auth
     */
    public function __construct(Guard $auth)
    {
        $this->middleware('guest', ['except' => 'logout']);
        $this->auth = $auth;
    }
    public function login(Request $request)
    {
        $email      = $request->get('email');
        $password   = $request->get('password');
        $remember   = $request->get('remember');
        if ($this->auth->attempt([
            'email'     => $email,
            'password'  => $password
        ], $remember == 1 ? true : false)) {
            return redirect()->route('index');
        }
        else {
            Session::flash('errors','Incorrect email or password');
            return redirect()->back();
        }
    }
}