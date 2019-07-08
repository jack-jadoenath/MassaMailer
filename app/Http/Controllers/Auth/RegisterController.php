<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Package;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/home';

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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required' ,'max:15'],
            'card_last_four' => ['required', 'min:12', 'max:19'],
            'card_valid' => ['required', 'min:5', 'max:5'],
            'card_ccv' => ['required', 'min:3', 'max:3'],
            'packet' => ['required'],
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
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'last_payment' => Carbon::now(),
            'phone' => $data['phone'],
            'card_last_four' => substr($data['card_last_four'], -4),
            'packages_id' => $data['packet']
        ]);
    }

    public function showRegistrationForm()
    {
        //$region = Region::all();
        $packets = Package::all();
        return view('auth.register', compact('packets'));
        // This will send the $region variable to the view
    }

    
}
