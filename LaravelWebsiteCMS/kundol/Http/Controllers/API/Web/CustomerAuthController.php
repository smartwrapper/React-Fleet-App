<?php

namespace App\Http\Controllers\API\Web;

use App\Contract\Web\CustomerAuthInterface;
use App\Http\Controllers\Controller as Controller;
use App\Http\Requests\CustomerLoginRequest;
use App\Http\Requests\CustomerStoreRequest;
use App\Http\Requests\ForgetRequest;
use App\Http\Requests\ResetRequest;
use App\Models\Admin\Customer;
use App\Models\User;
use App\Repository\Web\CustomerAuthRepository;
use Auth;
use Illuminate\Http\Request;
use Socialite;

class CustomerAuthController extends Controller
{
    private $CustomerAuthRepository;
    private $callFromWeb = 0;

    public function __construct(CustomerAuthInterface $CustomerAuthRepository)
    {
        $this->CustomerAuthRepository = $CustomerAuthRepository;
    }

    public function register(CustomerStoreRequest $request)
    {
        $parms = $request->all();
        return $this->CustomerAuthRepository->store($parms);
    }

    public function forgetPassword(ForgetRequest $request)
    {
        $parms = $request->all();
        return $this->CustomerAuthRepository->forgetPassword($parms);
    }

    public function resetPassword(ResetRequest $request)
    {
        $parms = $request->all();
        return $this->CustomerAuthRepository->resetPassword($parms);
    }

    public function login(CustomerLoginRequest $request)
    {
        if (auth()->guard('customer')->user() || $request->cookie('_customer_token')) {
            return response()->json(['status' => 'Warning', "message" => "Already logged in", "_token" => $request->cookie('_token')], 200);
        }

        $parms = $request->all();
        return $this->CustomerAuthRepository->login($parms);
    }

    public function Callback($provider)
    {
        $userSocial =Socialite::driver($provider)->stateless();
        if(isset($_GET['fromApp']) && $_GET['fromApp'] == '1')
            $userSocial = $userSocial->userFromToken($_GET['code']);
        else
            $userSocial = $userSocial->user();
        

        $users =   Customer::where(['email' => $userSocial->getEmail()])->first();
        if ($users) {
            return $this->CustomerAuthRepository->loginWithProvider($users);
        } else {

            

            $user = Customer::create([
                'first_name'          => $userSocial->getName(),
                'last_name'          => $userSocial->getName(),
                'email'         => $userSocial->getEmail(),
                'provider_id'   => $userSocial->getId(),
                'provider'      => $provider,
            ]);

            if($this->callFromWeb){
                return $this->callFromWeb;
            }else{
                
                return $this->CustomerAuthRepository->loginWithProvider($user);
            }
        }
    }

    public function redirect($provider)
    {
        $this->callFromWeb = isset($_GET['from-web']) ? 1 : 0;
        if($provider == 'facebook'){
            $fields = ['first_name', 'last_name', 'email', 'gender', 'verified'];
            $scopes = ['email'];
            return Socialite::driver($provider)
            ->fields($fields)->scopes($scopes)
            ->stateless()
            ->redirect();
        }
        if($provider == 'google'){
            $scopes = [
                'https://www.googleapis.com/auth/plus.me',
                'https://www.googleapis.com/auth/plus.profile.emails.read'
            ];
            return Socialite::driver($provider)
            ->scopes($scopes)
            ->stateless()
            ->redirect();
        }

        return Socialite::driver($provider)
            ->stateless()
            ->redirect();
       
    }

    public function logout(Request $request)
    {
        $parms = $request->all();
        return $this->CustomerAuthRepository->logout($parms);
    }
}
