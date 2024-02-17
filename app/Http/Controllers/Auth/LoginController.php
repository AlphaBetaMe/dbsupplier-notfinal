<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

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
    // protected $redirectTo = RouteServiceProvider::HOME;

   
    // public function redirectTo() {
    //     $role = Auth::user()->role_as; 
    //     switch ($role) {
    //       case '1':
    //         return 'dashboard';
    //         break;
    //       case '4':
    //         return 'dashboard';
    //         break;
    
    //       default:
    //         return '/'; 
    //       break;
    //     }
    //   }
      
    public function redirectTo()
    {
        $role = Auth::user()->role_as;
    
        switch ($role) {
            case '1': // Admin
                return 'admin/dashboard';
                break;
            case '4': // Supplier
                return 'supplier/dashboard';
                break;
            default:
                return '/';
                break;
        }
    }
    

      public function login(Request $request)
    {
        $this->validateLogin($request);

        $user = User::where('email', $request->email)->first();

        // Check if the user exists and is active
        if ($user && $user->mstatus === 'Active') {
            if ($this->attemptLogin($request)) {
                return $this->sendLoginResponse($request);
            }
        }

        // If the user is not active or authentication fails
        return $this->sendFailedLoginResponse($request);
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
