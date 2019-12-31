<?php

    namespace Quasar\Extension\Laravel\Database;

    /**
     *-----------------------------------------------------------------
     * This file is created by Quasar on the 2019/7/8 22:48
     *-----------------------------------------------------------------
     */
    interface MessageResolveHandler
    {
        /**
         * 分析处理数据的原生错误提示
         *
         * @param string $message 错误提示
         *
         * @return string
         */
        public function handle(string $message): string;
    }