<?php namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Logic\User\UserRepository;
use Illuminate\Contracts\Auth\Guard;
use App\User;
use App\Social;
use App\Role;
use Input, Validator, Auth;
use Laravel\Socialite\Facades\Socialite;
use Session;



class AuthController extends Controller {
    protected $auth;
    protected $userRepository;
    public function __construct( Guard $auth, UserRepository $userRepository )
    {
        $this->auth = $auth;
        $this->userRepository = $userRepository;
    }
    public function getLogin()
    {
        return view('auth.login');
    }
    public function postLogin()
    {
        $email      = Input::get('email');
        $password   = Input::get('password');
        $remember   = Input::get('remember');
        if($this->auth->attempt([
            'email'     => $email,
            'password'  => $password
        ], $remember == 1 ? true : false))
        {
            return redirect()->route('index');
        }
        else
        {
            Session::flash('errors','Incorrect email or password');
            return redirect()->back();
        }
    }
    public function getLogout()
    {
        \Auth::logout();

        return redirect()->route('auth.login');
    }
    public function getRegister()
    {
        return view('auth.register');
    }
    public function postRegister()
    {
        $input = Input::all();
        $validator = Validator::make($input, User::$rules, User::$messages);
        if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $data = [
            'first_name'    => $input['first_name'],
            'last_name'     => $input['last_name'],
            'email'         => $input['email'],
            'password'      => $input['password']
        ];
        $this->userRepository->register($data);

        Session::flash('success','You are registered successfully. Please login.');

        return redirect()->route('auth.login');
    }

}