<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
//use Illuminate\Foundation\Auth;
use App\Http\Requests;
use Auth;
use Illuminate\Support\Facades\DB;
use App\SocialAccountService;//use App\Http\Controllers\Auth;
//use App\SocialAccount;
use App\User;
use Socialite; // socialite namespace

use App\SocialAccount;

class SocialAuthController extends Controller
{
	// redirect function
	
	
	public function redirect($provider){
		return Socialite::driver($provider)->redirect();
	}
	
/*	public function redirectGoogle(){
		return Socialite::driver()->redirect();
	}*/
	// callback function
	
	
	public function callback($provider){
		
		$user =Socialite::driver($provider)->user();
		$authUser = $this->findOrCreateUser($user, $provider);
		auth()->login($authUser);
		return redirect()->to('/home');
	}
	
	
	/*public function callbackGoogle($provider){
		// when facebook call us a with token
		$user =Socialite::driver($provider)->user();
		$authUser = $this->findOrCreateUser($user, $provider);
		auth()->login($authUser);
		return redirect()->to('/home');
			
	}*/
	
	
	public function findOrCreateUser($user, $provider)
	{
		 $account = SocialAccount::whereProvider($provider)
		->whereProviderUserId($user->getId())
		->first();
		if ($account) {
			return $account->user;
		}
		else {
			$account = new SocialAccount([
					'provider_user_id' => $user->getId(),
					'provider' => $provider
			]);
			$user1 = User::whereEmail($user->getEmail())->first();
			if (!$user1)// = User::whereEmail($user->getEmail())->pluck())
			{
				$user1 = User::create([
						'email' => $user->getEmail(),
						'name' => $user->getName(),
				]);
			}
			$account->user()->associate($user1);
			$account->save();
			return $user1;
		}
	
	}
}