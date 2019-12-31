<?php

    namespace Quasar\Extension\Laravel\Console;

    use Illuminate\Contracts\Filesystem\FileNotFoundException;
    use Illuminate\Filesystem\Filesystem;

    /**
     * Created on 2019-12-27 10:24
     *
     * @author Quasar
     */
    class MigrationCreator extends \Illuminate\Database\Migrations\MigrationCreator
    {
        protected $configPath;

        /** @var string 指定Schema默认执行类 */
        const SCHEMA = 'Quasar\Extension\Laravel\Database\Schema';

        public function __construct(Filesystem $files)
        {
            parent::__construct($files);
            $this->configPath = config_path('quasar.php');
        }

        /**
         * Populate the place-holders in the migration stub.
         *
         * @param string      $name
         * @param string      $stub
         * @param string|null $table
         *
         * @return string
         * @author Quasar
         */
        protected function populateStub($name, $stub, $table)
        {
            $stub   = parent::populateStub($name, $stub, $table);
            $schema = config('quasar.migrate.schema_file', self::SCHEMA);

            return str_replace('SCHEMA_PATH', $schema, $stub);
        }

        /**
         * Get the migration stub file.
         *
         * @param string|null $table
         * @param bool        $create
         *
         * @return string
         * @throws FileNotFoundException
         */
        protected function getStub($table, $create)
        {
            if(is_null($table)){
                return $this->files->get($this->stubPath().'/blank.stub');
            }
            // We also have stubs for creating new tables and modifying existing tables
            // to save the developer some typing when they are creating a new tables
            // or modifying existing tables. We'll grab the appropriate stub here.
            $stub = $create ? 'create.stub' : 'update.stub';

            return $this->files->get($this->stubPath()."/{$stub}");
        }

        /**
         * Get the path to the stubs.
         *
         * @return string
         */
        public function stubPath()
        {
            return __DIR__.'/MigrationTemplate';
        }
    }