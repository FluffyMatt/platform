<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ldap;
use Hash;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    // Override use of email
    protected $username = 'username';

    protected $loginPath = '/login';

    protected $redirectPath = '/';

    protected $ldap;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
        $this->ldap = new Ldap;
    }

    public function getLogin(Request $request) {

      if (view()->exists('auth.authenticate')) {
          return view('cms.auth.authenticate');
      }

      return view('cms.auth.login');

    }

    // Customer postLogin logic
    public function login(Request $request) {

      $this->validate($request, [
          $this->loginUsername() => 'required', 'password' => 'required',
      ]);

      $credentials = $request->only('username', 'password');

      if (!Auth::attempt($credentials)) {

        $attempt = $this->ldap->attempt($credentials);

        if ($attempt) {

          // User comes back as an array of information
          // grab the info you need and save
          $user = $this->__userFormat($attempt, $credentials);

          $exists = User::where('username', $user['username'])->first();
          //exit(dd($exists));
          // Check if user exists. If true update else create
          if (!is_null($exists) && $exists->exists()) {

            // Set new password and save user
            $exists->password = $user['password'];

            $exists->save();

            Auth::login($exists);

          } else {

            // Create and login new user
            Auth::login($user = User::create($user));

          }

          if (Auth::user()) {

            return redirect()->intended($this->redirectPath());

          }

        } else {

          // Redirect if user fails LDAP auth
          return redirect($this->loginPath)
            ->withInput($request->only($this->loginUsername(), 'remember'))
            ->withErrors([
                $this->loginUsername() => $this->getFailedLoginMessage(),
          ]);

        }

      } else {

        return redirect()->intended($this->redirectPath())->with('success', 'Successfully logged in');

      }

    }

    private function __userFormat($userInfo, $creds, $user = []) {

      if (isset($userInfo['givenname'])){
          $fullName = $userInfo['givenname'][0].' '.$userInfo['sn'][0];
          $firstName = $userInfo['givenname'][0];
          $lastName = $userInfo['sn'][0];
      } else {
          $fullName = $userInfo['cn'][0];
          $name = explode(' ', $fullname);
          $firstName = $name[0];
          $lastName = $name[1];
      }

      $user = [
        'first_name' => $lastName,
        'last_name' => $firstName,
        'full_name' => $fullName,
        'username' => $creds['username'],
        'email' => $userInfo['userprincipalname'][0],
        'password' => Hash::make($creds['password']),
      ];

      return $user;

    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function getLogout(Request $request) {

      Auth::logout();

      $request->session()->flash('success', 'You have been logged out');

      return redirect('login');

    }

}
