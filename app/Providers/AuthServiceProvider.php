<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;

use App\Policies\UserPolicy;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        User::class => UserPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Configure emails
        VerifyEmail::toMailUsing(function ($notifiable, $url) {
            return (new MailMessage)
                ->subject('Vérifier votre adresse email')
                ->greeting('Hello!')
                ->line('S\'il vous plait cliquer sur le bouton ci-dessous pour vérfier votre adresse email.')
                ->action('Vérifier l\'adresse email', $url)
                ->line('Si vous n\'avez pas créé de compte, aucune autre action n\'est requise.')
                ->salutation('Cordialement, Foacs');
        });

        ResetPassword::toMailUsing(function ($notifiable, $token){
            return(new MailMessage)
            ->subject('Réinitialiser votre mot de passe')
            ->greeting('Hello!')
            ->line('Vous recevez cet e-mail car nous avons reçu une demande de réinitialisation de mot de passe pour votre compte.')
            ->action('Réinitialiser le mot de passe', route('password.reset', $token))
            ->line('Ce lien de réinitialisation du mot de passe expirera dans 60 minutes.')
            ->line('Si vous n\'avez pas demandé de réinitialisation de mot de passe, aucune autre action n\'est requise.')
            ->salutation('Cordialement, Foacs');
        });
    }
}
