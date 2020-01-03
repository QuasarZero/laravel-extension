<?php
    /**
     * This file is created by Quasar on 2019-12-31 17:20
     */

    use Illuminate\Support\Facades\Session;

    if(!function_exists('start_listen_sql')){
        /**
         * 开始SQL监听输出打印
         *
         * @param bool $printModel   使用print_r输出
         * @param bool $alwaysOutput 在监听输出第一行语句后不打断继续进行后续输出
         *
         * @author Quasar
         */
        function start_listen_sql(bool $printModel = false, bool $alwaysOutput = false)
        {
            Session::put('_OUTPUT_SQL_SWITCH', true);
            Session::put('_OUTPUT_SQL_PRINT_MODE', $printModel);
            Session::put('_OUTPUT_SQL_PRINT_CONTINUOUSLY', $alwaysOutput);
        }
    }
    if(!function_exists('stop_listen_sql')){
        /**
         * 停止SQL监听输出打印
         *
         * @author Quasar
         */
        function stop_listen_sql()
        {
            Session::put('_OUTPUT_SQL_SWITCH', false);
        }
    }
