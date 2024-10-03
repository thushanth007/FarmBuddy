<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Contracts\View\Factory;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(Factory $view)
    {
        $view->composers([
            'App\Http\ViewComposers\AdminLoginComposer@adminLogin' => ['admin.include.html_header', 'admin.include.header', 'admin.include.main_sidebar','admin.include.footer' ],
            'App\Http\ViewComposers\HeaderComposer@option' => ['site.include.html_header', 'site.include.header','site.include.footer']
        ]);



    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
