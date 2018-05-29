<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Pembeli;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Mail;
use App\Mail\userRegistered;

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
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'nama' => 'required|min:2|max:100',
            'gender' => 'required',
            'tempatlahir' => 'required',
            'tgllahir' => 'required',
            'kewarganegaraan' => 'required',
            'jenis_identitas' => 'required',
            'no_identitas' => 'required',
            'notlp' => 'required',
            'alamat' => 'required',
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



      $user = User::create([
          'username' => $data['username'],
          'email' => $data['email'],
          'password' => bcrypt($data['password']),
          'token' => str_random(20),
      ]);

      $pembeli = Pembeli::create([
        'nama' => $data['nama'],
        'gender' => $data['gender'],
        'tempatlahir' => $data['tempatlahir'],
        'tgllahir' => $data['tgllahir'],
        'kewarganegaraan' => $data['kewarganegaraan'],
        'jenis_identitas' => $data['jenis_identitas'],
        'no_identitas' => $data['no_identitas'],
        'notlp' => $data['notlp'],
        'alamat' => $data['alamat'],
        'user_id' => $user->id,

      ]);
      $user->assignRole('pembeli');
      Mail::to($user->email)->send(new userRegistered($user));

      // return $user;
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        // $this->guard()->login($user);

        // return $this->registered($request, $user)
        //                 ?: redirect($this->redirectPath());

        return redirect('/login')->with('warning','Silahkan Cek Email anda dan lakukan verifikasi email');
    }

    public function verify_register($token,$id)
    {
      //mengambil data user
      $user = User::findOrFail($id);

      //menguji apakah tokennya sama atau tidak
      if ($user->token != $token) {
        return redirect('/login')->with('warning', 'token tidak match');
      }
      //status user menjadi 1
      $user->status = 1;
      $user->save();


      //login
      $this->guard()->login($user);
      //redirect
      return redirect('/home');
    }
}
