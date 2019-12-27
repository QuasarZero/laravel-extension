<?php

    namespace Quasar\Extension\Laravel\Config;

    /**
     * Created on 2019-12-27 11:21
     *
     * @author Quasar
     */
    class Generator
    {
        private $_path;

        public function __construct()
        {
            $this->_path = config_path('quasar.php');
        }

        /**
         * 初始化配置文件
         *
         * @return bool
         * @author Quasar
         */
        public function make()
        {
            $templatePath = __DIR__.'/template/quasar.php';
            if(is_file($this->_path)) return true;
            else return copy($templatePath, $this->_path);
        }

    }