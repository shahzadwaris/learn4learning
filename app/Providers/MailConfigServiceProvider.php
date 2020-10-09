<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class MailConfigServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        if (Schema::hasTable('email_configurations')) {
            $mail = DB::table('email_configurations')->where('status', 1)->first();

            if ($mail) {
                $config = [
                    'driver'     => 'smtp',
                    'host'       => $mail->host,
                    'port'       => $mail->port,
                    'from'       => ['address' => $mail->emailFrom, 'name' => $mail->emailFromName],
                    'encryption' => 'tls',
                    'username'   => $mail->username,
                    'password'   => $mail->password,
                    'pretend'    => false,
                ];
                Config::set('mail', $config);
            }
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
