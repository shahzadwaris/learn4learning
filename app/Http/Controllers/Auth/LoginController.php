<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Requests\LogInRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

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
//    protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '';

    protected function redirectTo()
    {
        if (Auth::user()['type'] == 'admin') {
            return redirect()->route('home');
        }
        if (Auth::user()['type'] == 'teacher') {
            return redirect()->route('teacherHome');
        }
        if (Auth::user()['type'] == 'student') {
            return redirect()->route('studentHome');
        }
    }

    public function login(LogInRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user) {
            Auth::login($user);
            return $this->redirectTo();
        }
        $request->session()->flash('message.level', 'danger');
        $request->session()->flash('message.content', 'Sorry..!Invalid Email or password..please try again.');

        return redirect()->back()->withInput(['email'=>$request->email]);
    }
}
