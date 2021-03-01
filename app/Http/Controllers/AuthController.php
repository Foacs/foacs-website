<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Events\Verified;
use Illuminate\Auth\Events\PasswordReset;
use App\Models\User;

class AuthController extends Controller
{
    
    public function login()
    {
	    return view('auth.login');
    }

    public function authenticate(Request $request) 
    {
    	$credentials = $request->only('email', 'password');

    	if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();

            session()->flash('success', 'Vous êtes désormais connecté');
            session()->flash('success-title', 'Connexion réussit.');
    		return redirect()->route('home');
    	}

    	return back()->withErrors([
    		'email' => 'Les informations de connection fournisent ne correspondent pas à nos enregistrements.'
    	]);
    }

    public function register() {
        return view('auth.register');
    }


    public function create(Request $request) {

        $validate = $request->validate([
            'name' => 'required|unique:App\Models\User,name',
            'email' => 'required|email|unique:App\Models\User,email',
            'password' => 'required|confirmed',
            'EULA_agree' => 'accepted'
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);
        event(new Registered($user));
        Auth::login($user);
        session()->flash('success', 'Votre compte a été créé.');
        session()->flash('success-title', 'Compte créé.');
        return redirect()->route('auth.login');
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        session()->flash('success', 'Vous êtes déconnecté.');
        return back();
    }

    public function emailVerify(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->route('home');
        }
        return view('auth.verify-email', ['active' => '']);
    }

    public function emailVerifyStore(EmailVerificationRequest $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->route('home');
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        session()->flash('success', 'Votre email a été vérfié.');
        session()->flash('success-title', 'Email vérfié.');
        return redirect()->route('home');
    }

    public function verificationNotification(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->route('home');
        }

        $request->user()->sendEmailVerificationNotification();
        
        return back()->with('status', 'verification-link-sent');
    }

    public function forgotPassword() 
    {
        return view('auth.forgot-password');
    } 

    public function forgotPasswordStore(Request $request) 
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
                    ? back()->with(['status' => __($status)])
                        ->with('success', 'Email envoyé.')
                    : back()->withErrors(['email' => __($status)]);
    }

    public function passwordChange(Request $request, User $user)
    {
        return view('auth.change-password', ['user' => $user]);
    }

    public function passwordChangeStore(Request $request, User $user)
    {
        $request->validate([
            'current_password' => 'required|password',
            'password' => 'required|min:8|confirmed'
        ]);

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('profile.show',  $user)->with('success', 'Le mot de passe a été modifié.');
    }

    public function passwordReset($token)
    {
        var_dump(session()->get('errors'));
        return view('auth.reset-password', ['token' => $token]);
    }

    public function passwordResetStore(Request $request) 
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
            ]);
            
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->save();

                $user->setRememberToken(Str::random(60));

                event(new PasswordReset($user));
            }
        );

        return $status == Password::PASSWORD_RESET
                    ? redirect()->route('auth.login')
                        ->with('status', __($status))->with('success', 'Votre mot de passe a été réinitialisé.')
                    : back()->withErrors(['email' => [__($status)]]);
    }

    public function handleGithubCallback()
    {
        $user = Socialite::driver('github')->user();
        $findUser = User::where('social_id', $user->id)->first();

        if ($findUser) {
            Auth::login($findUser);
            return redirect()->route('home');
        } else {
            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'social_id' => $user->id,
                'social_type' => 'github',
                'password' => Hash::make('my-github'),
                'avatar' => $user->avatar,
            ]);

            Auth::login($newUser);
            return redirect()->route('home');
        }
    }

}
