<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;

use App\Models\Parametre;
use App\Models\TypeParametre;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

use Laravel\Fortify\Actions\RedirectIfTwoFactorAuthenticatable;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        /*
        |--------------------------------------------------------------------------
        | REGISTER
        |--------------------------------------------------------------------------
        */

        Fortify::registerView(function () {

            $typePiece = TypeParametre::where(
                'code',
                'TYPE-PIECE'
            )->first();

            $typePieces = $typePiece
                ? Parametre::where(
                    'type_parametre_id',
                    $typePiece->id
                )
                    ->orderBy('libelle')
                    ->get()
                : collect();

            return view('auth.register', [
                'typePieces' => $typePieces,
            ]);
        });

        /*
        |--------------------------------------------------------------------------
        | FORTIFY ACTIONS
        |--------------------------------------------------------------------------
        */

        Fortify::createUsersUsing(
            CreateNewUser::class
        );

        Fortify::updateUserProfileInformationUsing(
            UpdateUserProfileInformation::class
        );

        Fortify::updateUserPasswordsUsing(
            UpdateUserPassword::class
        );

        Fortify::resetUserPasswordsUsing(
            ResetUserPassword::class
        );

        Fortify::redirectUserForTwoFactorAuthenticationUsing(
            RedirectIfTwoFactorAuthenticatable::class
        );

        /*
        |--------------------------------------------------------------------------
        | LOGIN RATE LIMITER
        |--------------------------------------------------------------------------
        */

        RateLimiter::for('login', function (Request $request) {

            $throttleKey = Str::transliterate(
                Str::lower(
                    $request->input(
                        Fortify::username()
                    )
                )
                . '|'
                . $request->ip()
            );

            return Limit::perMinute(5)
                ->by($throttleKey);
        });

        /*
        |--------------------------------------------------------------------------
        | TWO FACTOR RATE LIMITER
        |--------------------------------------------------------------------------
        */

        RateLimiter::for('two-factor', function (Request $request) {

            return Limit::perMinute(5)
                ->by(
                    $request->session()->get('login.id')
                );
        });
    }
}
