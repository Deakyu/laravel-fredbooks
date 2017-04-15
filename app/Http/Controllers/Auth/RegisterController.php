<?php

namespace App\Http\Controllers\Auth;

use App\SocialProvider;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Laravel\Socialite\Facades\Socialite;

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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'major' => 'required|min:1|max:255',
            'standing' => 'required|min:1|max:255'
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
            'major' => $data['major'],
            'standing' => $data['standing']
        ]);
    }

    public function redirectToProvider() {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback() {
        try {
            $socialUser = Socialite::driver('google')->user();
        } catch(\Exception $e) {
            return redirect('/');
        }
        // Check if we have logged provider
        $socialProvider = SocialProvider::where('provider_id', $socialUser->getId())->first();
        if(!$socialProvider) {
            // Create a new user and provider
            $user = User::firstOrCreate(
                ['email' => $socialUser->getEmail()],
                ['name' => $socialUser->getName()]
            );

            $user->socialProviders()->create(
                ['provider_id'=>$socialUser->getId(), 'provider'=>'google']
            );

        } else {
            $user = $socialProvider->user;
        }

        auth()->login($user);

        return redirect('/book');

    }
}
























