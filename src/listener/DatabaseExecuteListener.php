<?php

    namespace Quasar\Extension\Laravel\Listener;

    use Illuminate\Database\Events\QueryExecuted;
    use Illuminate\Support\Facades\Session;

    class DatabaseExecuteListener
    {
        /**
         * Create the event listener.
         *
         * @return void
         */
        public function __construct()
        {
            //
        }

        /**
         * Handle the event.
         *
         * @param QueryExecuted $event
         *
         * @return void
         */
        public function handle(QueryExecuted $event)
        {
            $sql = str_replace("?", "'%s'", $event->sql);
            $log = vsprintf($sql, $event->bindings);
            if(Session::get('_OUTPUT_SQL_SWITCH')){
                if(Session::get('_OUTPUT_SQL_PRINT_MODE')) print_r($log);
                else dump($log);
                if(Session::get('_OUTPUT_SQL_PRINT_CONTINUOUSLY')){
                    Session::put('_OUTPUT_SQL_PRINT_MODE', false);
                }
            }
        }
    }
