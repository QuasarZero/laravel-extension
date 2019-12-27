<?php

    namespace Quasar\Extension\Laravel\Console;

    use Illuminate\Console\Command;
    use Quasar\Extension\Laravel\Config\Generator;

    /**
     * Created on 2019-12-27 15:06
     *
     * @author Quasar
     */
    class InitCommand extends Command
    {
        protected $signature   = 'quasar:init';
        protected $description = 'Initialize the library of Quasar';

        public function __construct()
        {
            parent::__construct();
        }

        /**
         * execute the command
         *
         * @return bool
         */
        public function handle()
        {
            # 1
            $configMaker = new Generator();
            $result      = $configMaker->make();
            if($result) $this->info('>>> Initialized the config success');
            else $this->info('>>> Initialize the config failure');

            return true;
        }

    }