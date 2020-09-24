<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LogInRequest;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
//    protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '';
    protected function redirectTo(){
        if(auth::user()['type'] == 'admin'){
            return redirect()->route('home');
        }
        if(auth::user()['type'] == 'teacher'){
            return redirect()->route('teacherHome');
        }
        if(auth::user()['type'] == 'student'){
            return redirect()->route('studentHome');
        }
    }



    public function login(LogInRequest $request)
    {

        //  $Auths=Auth::User()->id;
        //   $countu=count($Auths);

        //  if($countu >=1 ){
        //     $request->session()->flash('message.level', 'success');
        //     $request->session()->flash('message.content', 'One User Already Loggin.');
        //      return back();

        //  }
        //  else{
        
        $user = User::where('email',$request->email)->first();

        $email = $user['email'];
        $password = $user['password'];
        $requestPassword=$request->password;
        if (Hash::check($requestPassword,$password) && $email)
        {
            if ($user['approved_at']!=""){
                Auth::login($user);
                return $this->redirectTo();
            }
            else{
                   $request->session()->flash('message.level', 'danger');
        $request->session()->flash('message.content', 'Sorry.Please verify your email.');

                return redirect()->back()->withInput(['email'=>$email]);

            }

        }
        else{
             $request->session()->flash('message.level', 'danger');
        $request->session()->flash('message.content', 'Sorry..!Invalid Email or password..please try again');
            return redirect()->back()->withInput(['email'=>$email]);
        }
    }





    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
