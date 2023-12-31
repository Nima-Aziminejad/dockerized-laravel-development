<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Fortify::registerView(function (){
            return Inertia::render('Auth/Register');
        });
        Fortify::loginView(function(){
            return Inertia::render('Auth/Login');
        });
        Fortify::verifyEmailView(function (){
            return Inertia::render('Auth/VerifyEmail',
                ['status' => session('status')]);
        });
        Fortify::requestPasswordResetLinkView(function (){
            return Inertia::render('Auth/ForgotPassword',
                ['status' => session('status')]);
        });
        Fortify::resetPasswordView(function (Request $request){
            return Inertia::render('Auth/ResetPassword', [
                'email' => $request->email,
                'token' => $request->route('token'),
            ]);
        });
        Fortify::confirmPasswordView(function (){
            return Inertia::render('Auth/ConfirmPassword');
        });
        Fortify::twoFactorChallengeView(function (){
            return Inertia::render('Auth/TwoChallenge');
        });


        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        RateLimiter::for('login', function (Request $request) {
            return Limit::perMinute(5)->by($request->email.$request->ip());
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });
    }
}
