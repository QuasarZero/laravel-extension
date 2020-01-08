<?php

    namespace Quasar\Extension\Laravel\Console;

    use Illuminate\Support\ServiceProvider;

    /**
     * Created on 2019-12-27 14:34
     *
     * @author Quasar
     */
    class CommandServiceProvider extends ServiceProvider
    {
        protected $commands = [
            'command.quasar.init',
            'command.make.service'
        ];

        public function __construct($app)
        {
            parent::__construct($app);
        }

        /**
         * Get the services provided by the provider.
         *
         * @return array
         */
        public function provides()
        {
            return $this->commands;
        }

        /**
         * Register any application services.
         *
         * @return void
         */
        public function register()
        {
            $this->app->singleton('command.quasar.init', function ()
            {
                return new InitCommand();
            });
            $this->app->singleton('command.make.service', function ()
            {
                return new MakeServiceCommand();
            });
            $this->commands($this->commands);
        }
    }