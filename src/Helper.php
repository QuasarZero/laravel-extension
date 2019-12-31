<?php
    /**
     * This file is created by Quasar on 2019-12-31 17:20
     */

    use Illuminate\Support\Facades\Session;

    if(!function_exists('dump_sql')){
        /**
         * 开启SQL输出打印
         *
         * @param bool $printModel 使用print_r输出
         *
         * @author Quasar
         */
        function dump_sql($printModel = false)
        {
            Session::put('_OUTPUT_SQL_SWITCH', true);
            Session::put('_OUTPUT_SQL_PRINT_MODE', $printModel);
        }
    }
