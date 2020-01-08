<?php

    namespace Quasar\Extension\Laravel\Console;

    use Illuminate\Console\Command;

    /**
     * Created on 2020-01-07 20:48
     *
     * @author Quasar
     */
    class MakeServiceCommand extends Command
    {
        /**
         * The name and signature of the console command.
         *
         * @var string
         */
        protected $signature = 'make:service {name}';

        /**
         * The console command description.
         *
         * @var string
         */
        protected $description = 'Create a new service class';

        public function __construct()
        {
            parent::__construct();
        }

        /**
         * Execute the console command.
         *
         * @return mixed
         */
        public function handle()
        {
            $name        = $this->argument('name');
            $storagePath = $this->_resolveName($name);
            $this->_createDirectory(app_path('Services')."{$storagePath['directory']}");
            $result = file_put_contents(app_path('Services')."{$storagePath['full-path']}", $this->_getTemplate($storagePath));
            if($result) $this->info(">>> Service was created successfully");
            else $this->info(">>> Create service file failure");

            return true;
        }

        /**
         * 创建依赖的文件夹
         *
         * @param string $path 路径
         *
         * @author Quasar
         */
        private function _createDirectory($path)
        {
            if(!is_dir($path)) mkdir($path, 0777, true);
        }

        /**
         * 解析创建的文件名（路径）
         *
         * @param string $name 命令参数传入的名称
         *
         * @return array
         * @author Quasar
         */
        private function _resolveName($name)
        {
            $temp   = explode('/', $name);
            $name   = array_pop($temp);
            $result = [
                'directory'  => ($temp ? '/' : '').implode('/', $temp),
                'file-name'  => "{$name}.php",
                'class-name' => $name,
                'namespace'  => ($temp ? '\\' : '').implode('\\', $temp)
            ];

            return array_merge($result, [
                'full-path' => "{$result['directory']}/{$result['file-name']}",
            ]);
        }

        /**
         * 获取创建模板
         *
         * @param array $templateConfig 模板配置
         *
         * @return string
         * @author Quasar
         */
        private function _getTemplate($templateConfig)
        {
            $currentTime = date('Y-m-d H:i:s');
            $parentClass = config('quasar.console.make.service.parent_class', '');
            $creator     = config('quasar.console.make._creator');
            if($parentClass) $parentClass = "extends {$parentClass}";
            if($creator) $creator = "@author {$creator}";

            return <<<PHP7
<?php
    namespace App\Services{$templateConfig['namespace']};

    /**
     * Created on {$currentTime}
     * $creator
     */
    class {$templateConfig['class-name']} {$parentClass}
    {
        public function __construct()
        {
            parent::__construct();
        }
    }

PHP7;
        }
    }