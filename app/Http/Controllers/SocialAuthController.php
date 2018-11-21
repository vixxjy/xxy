<?php

namespace todo\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use todo\User;
use Auth;

class SocialAuthController extends Controller
{
    public function redirect($service) {
        return Socialite::driver ( $service )->redirect ();
    }
    
    public function callback($service) {
        $data = Socialite::with ( $service )->user ();
       \Debugbar::error($data);
       
       $user = User::where('email', $data->email)->first();
       
       if (!is_null($user)) {
           Auth::login($user);
           
           $user->name = $data->user['name'];
           $user->facebook_id = $data->id;
           $user->save();
       }
       else {
           $user = User::where('facebook_id', $data->id)->first();
           if(is_null($user)){
                // Create a new user
                $user = new User();
                $user->name = $data->user['name'];
                $user->email = $data->email;
                $user->password = $data->email;
                $user->facebook_id = $data->id;
                $user->save();
            }
            Auth::login($user);
       }
       
        return view ( 'dashboard' )->withDetails ( $data )->withService ( $service );
        // return redirect('/dashboard')->withDetails( $data )->with('success', 'Successfully logged in!');
    }
}
