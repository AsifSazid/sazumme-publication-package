<?php

namespace SazUmme\Publication;

use Illuminate\Support\ServiceProvider;

class PublicationServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadRoutesFrom(__DIR__ . '/routes/api.php');
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'publication');

        $this->publishes([
            __DIR__.'/../publishable/assets' => public_path('vendor/publication'),
        ], 'public');

        $this->commands([
            ##InstallationCommandClass##
        ]);

        $this->layouts();
        $this->libs();
        $this->partials();

    }
    
    public function layouts()
    {
        \Illuminate\Support\Facades\Blade::component('sp-frontend-master', \SazUmme\Publication\App\View\Components\Frontend\Layouts\Master::class);
        \Illuminate\Support\Facades\Blade::component('sp-backend-master', \SazUmme\Publication\App\View\Components\Backend\Layouts\Master::class);
    }

    private function libs()
    {
        \Illuminate\Support\Facades\Blade::component('sp-frontend-style', \SazUmme\Publication\App\View\Components\Frontend\Layouts\Libs\Style::class);
        \Illuminate\Support\Facades\Blade::component('sp-frontend-js', \SazUmme\Publication\App\View\Components\Frontend\Layouts\Libs\Js::class);
        \Illuminate\Support\Facades\Blade::component('sp-backend-style', \SazUmme\Publication\App\View\Components\backend\Layouts\Libs\Style::class);
        \Illuminate\Support\Facades\Blade::component('sp-backend-js', \SazUmme\Publication\App\View\Components\backend\Layouts\Libs\Js::class);
    }

    private function partials()
    {
        \Illuminate\Support\Facades\Blade::component('sp-frontend-meta', \SazUmme\Publication\App\View\Components\Frontend\Layouts\Partials\Meta::class);
        \Illuminate\Support\Facades\Blade::component('sp-frontend-dummy', \SazUmme\Publication\App\View\Components\Frontend\Layouts\Partials\Dummy::class);
        \Illuminate\Support\Facades\Blade::component('sp-frontend-breadcrumb', \SazUmme\Publication\App\View\Components\Frontend\Layouts\Partials\Breadcrumb::class);
        \Illuminate\Support\Facades\Blade::component('sp-frontend-title', \SazUmme\Publication\App\View\Components\Frontend\Layouts\Partials\Title::class);
        \Illuminate\Support\Facades\Blade::component('sp-frontend-favicon', \SazUmme\Publication\App\View\Components\Frontend\Layouts\Partials\Favicon::class);
        \Illuminate\Support\Facades\Blade::component('sp-backend-meta', \SazUmme\Publication\App\View\Components\backend\Layouts\Partials\Meta::class);
        \Illuminate\Support\Facades\Blade::component('sp-backend-dummy', \SazUmme\Publication\App\View\Components\backend\Layouts\Partials\Dummy::class);
        \Illuminate\Support\Facades\Blade::component('sp-backend-breadcrumb', \SazUmme\Publication\App\View\Components\backend\Layouts\Partials\Breadcrumb::class);
        \Illuminate\Support\Facades\Blade::component('sp-backend-title', \SazUmme\Publication\App\View\Components\backend\Layouts\Partials\Title::class);
        \Illuminate\Support\Facades\Blade::component('sp-backend-favicon', \SazUmme\Publication\App\View\Components\backend\Layouts\Partials\Favicon::class);
        
        
        \Illuminate\Support\Facades\Blade::component('sp-backend-aside', \SazUmme\Publication\App\View\Components\backend\Layouts\Partials\Aside::class);
    }
    
    public function register() {}
}
