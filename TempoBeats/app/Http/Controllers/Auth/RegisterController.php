<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\likedPlaylist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use DateTime;

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
    protected $redirectTo = RouteServiceProvider::EmV;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
 

    public function __construct()
    {
        $this->middleware('guest');
    }
    public function mustVerifyEmail()
    {
        return false;
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $requireVerification = config('auth.registration.require_verification');
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users',
                function ($attribute, $value, $fail) {
                    // Extract the domain from the email
                    $domain = substr(strrchr($value, "@"), 1);
                    
                    // Check if the domain is valid
                    if (!in_array($domain, ['gmail.com', 'icloud.com', 'yahoo.com', 'outlook.com'])) {
                        $fail('The '.$attribute.' must be a valid email address.');
                    }
                }
            ],
            'birthday' => ['required', 'date', 'before_or_equal:' . now()->subYears(10)->format('Y-m-d')],
            'gender' => ['required', Rule::in(['Male', 'Female','Other', null])],
            'password' => ['required', 'string', 'min:8','regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,16}$/','max:16', 'confirmed'],
        ];
        if ($requireVerification) {
            $rules['email'] = array_merge($rules['email'], ['unique:users,email_verified_at,NULL']);
        }

       // return Validator::make($data, $rules);
       $messages = [
        'birthday.before_or_equal' => 'Minimum age requirement is 10 or Older',
    ];
    
        return Validator::make($data, $rules, $messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $birthday = new DateTime($data['birthday']);
        $today = new DateTime();
        $age = $today->diff($birthday)->y;
        $Role = 0;
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'Gender' => $data['gender'],
            'Age' => $age,
            'password' => Hash::make($data['password']),
        ]);
        if (config('auth.registration.require_verification')) {
            $user->sendEmailVerificationNotification();
        }
        
        $obj = new likedPlaylist();
        $obj->user_id = $user->id;
        $obj->save();
        return $user;
    }
}
