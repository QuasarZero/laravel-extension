<?php

    namespace Quasar\Extension\Laravel\Console;

    /**
     * Created on 2019-12-26 8:58
     *
     * @author Quasar
     */
    class MigrationServiceProvider extends \Illuminate\Database\MigrationServiceProvider
    {
        public function __construct($app)
        {
            parent::__construct($app);
        }

        /**
         * Register the migration creator.
         *
         * @return void
         */
        protected function registerCreator()
        {
            $this->app->singleton('migration.creator', function ($app) {
                return new MigrationCreator($app['files']);
            });
        }
    }