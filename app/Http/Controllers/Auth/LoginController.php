<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;
use App\Permission;
use App\PermissionUsers;

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

    protected function sendLoginResponse(Request $request)
    {


        $idUser = $this->guard()->user();
        $user = new User;
        $userRol=$user->rol($idUser->id);
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        foreach($userRol as $rol){

            if($rol->permission == 'Admin'){
                session(["rol"=>$rol->permission]);
                return redirect('/dashboard');
            }else if($rol->permission == 'Propietario'){
                session(["rol"=>$rol->permission]);
                return redirect('/propietary');
            }
            else if($rol->permission == 'Estudiante' || $rol->permission == 'Trabajador'){
                session(["rol"=>$rol->permission]);
                return redirect('/user');
            }else{
                return redirect('/error');
            }
        }


    }

}
