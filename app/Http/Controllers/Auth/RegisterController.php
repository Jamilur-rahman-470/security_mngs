<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = new User;
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password =  Hash::make($data['password']);
        $user->type = $data['type'];
        $user->gender = $data['gender'];
        $user->address = $data['address'];
        $user->phone = $data['phone'];
        $user->reason = $data['reason'];
        $user->DBO = $data['DBO'];

        $user->save();
        if($data['type'] === 'client'){
            $client = new Client;
            $client->reg_id = $user->id;
            $client->no_of_emp = 0;
            $client->payment = 'none';
            $client->emp_type = 'clinet';
            $client->coy_type = 'client';
            $client->save();
        }
        // User::create([
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'password' => Hash::make($data['password']),
        //     'type' => $data['type'],
        //     'gender' => $data['gender'],
        //     'phone' => $data['phone'],
        //     'reason' => $data['reason'],
        //     'address' => $data['address'],
        //     'DBO' => $data['DBO'],
        // ]);
        return $user;
    }
}
