<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Customer;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Country ;
use Auth;
use Cookie ;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';
    public function redirectTo()
    {
        return app()->getLocale() . '/';
    }
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'fullname' => ['required', 'string', 'max:255'],
           // 'lname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:customers'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $currcy = Country::find($data['country']) ;
        setcookie('country-curr', $currcy->currency_code, time()+60*60*24*365);
        
        return Customer::create([
            'slack' => Str::random(30),
            'customer_type' => 'custom',
            'name' => $data['fullname'],
            'email' => $data['email'],
            'country' => $data['country'] ,
            'currency' => $currcy->currency_code,
            'password' => Hash::make($data['password']),
            'api_token' => Str::random(60),
        ]);
    }

    // protected function NewCustomer(Request $request)
    // {
    //     $this->validate($request, [
    //         'fname' => ['required', 'string', 'max:255'],
    //         'lname' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:customers'],
    //         'password' => ['required', 'string', 'min:8', 'confirmed'],
    //     ]);

    //     Customer::create([
    //         'slack' => Str::random(30),
    //         'customer_type' => 'custom',
    //         'name' => $request->fname." ".$request->lname,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //     ]);
    //     //dd('test');
    //     Toastr::success('Post added successfully :)','Success');
    //     $credentials = $request->only('email', 'password');
    //     if (Auth::attempt($credentials)) {
    //         // Authentication passed...
    //         dd('test');
    //         return redirect()->route('home',app()->getLocale());
    //     }
    // }


}
