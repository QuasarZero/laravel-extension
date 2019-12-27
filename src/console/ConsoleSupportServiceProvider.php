<?php

    namespace Quasar\Extension\Laravel\Console;

    use Illuminate\Contracts\Support\DeferrableProvider;
    use Illuminate\Foundation\Providers\ArtisanServiceProvider;
    use Illuminate\Foundation\Providers\ComposerServiceProvider;
    use Illuminate\Support\AggregateServiceProvider;

    /**
     * Created on 2019-12-27 10:51
     *
     * @author Quasar
     */
    class ConsoleSupportServiceProvider extends AggregateServiceProvider implements DeferrableProvider
    {
        /**
         * The provider class names.
         *
         * @var array
         */
        protected $providers = [
            ArtisanServiceProvider::class,
            ComposerServiceProvider::class,
            MigrationServiceProvider::class,
            CommandServiceProvider::class
        ];

        /**
         * Bootstrap the application events.
         *
         * @return void
         */
        public function boot()
        {
            # execute some init statement
        }
    }