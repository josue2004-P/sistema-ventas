<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Config;
use App\Models\EmailSetting;

class AppServiceProvider extends ServiceProvider
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
        // Forzar HTTPS en producción
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }

        // Solo ejecutar si la tabla existe y hay conexión a la DB
        try {
            if (Schema::hasTable('email_settings')) {
                $setting = EmailSetting::where('mailer', 'resend')->first();

                if ($setting) {
                    // Configurar remitente dinámico
                    Config::set('mail.from.address', $setting->from_address);
                    Config::set('mail.from.name', $setting->from_name);

                    // Cambiar el mailer por default a 'resend'
                    Config::set('mail.default', 'resend');
                }
            }
        } catch (\Exception $e) {
            // Durante build o sin DB disponible, ignorar error
        }
    }
}
