<?php

declare(strict_types=1);

namespace TypiCMS\Modules\Partners\Providers;

use Override;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use TypiCMS\Modules\Partners\Composers\SidebarViewComposer;

class ModuleServiceProvider extends ServiceProvider
{
    #[Override]
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/partners.php', 'typicms.modules.partners');
    }

    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/partners.php');

        $this->loadViewsFrom(__DIR__.'/../../resources/views/', 'partners');

        $this->publishes([
            __DIR__.'/../../database/migrations/create_partners_table.php.stub' => getMigrationFileName(
                'create_partners_table',
            ),
        ], 'typicms-migrations');
        $this->publishes([
            __DIR__.'/../../resources/views' => resource_path('views/vendor/partners'),
        ], 'typicms-views');
        $this->publishes([__DIR__.'/../../resources/scss' => resource_path('scss')], 'typicms-resources');

        View::composer('core::admin._sidebar', SidebarViewComposer::class);

        /*
         * Add the page in the view.
         */
        View::composer('partners::public.*', function ($view): void {
            $view->page = getPageLinkedToModule('partners');
        });
    }
}
