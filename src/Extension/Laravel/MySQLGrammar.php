<?php

    namespace Quasar\Extension\Laravel;

    use Illuminate\Database\Connection;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Fluent;

    /**
     * Created on 2019-12-24 15:24
     *
     * @author Quasar
     */
    class MySQLGrammar extends \Illuminate\Database\Schema\Grammars\MySqlGrammar
    {
        /**
         * 覆盖重写父类执行统一构建SQL脚本的方法
         *
         * @param Blueprint  $blueprint
         * @param Fluent     $command
         * @param Connection $connection
         *
         * @return string
         * @author Quasar
         */
        public function compileCreate(Blueprint $blueprint, Fluent $command, Connection $connection)
        {
            $sql = parent::compileCreate($blueprint, $command, $connection);
            $sql = $this->compileInject($sql, $blueprint);

            return $sql;
        }

        /**
         * 注入相关扩展语句
         *
         * @param string    $sql
         * @param Blueprint $blueprint
         *
         * @return string
         * @author Quasar
         */
        protected function compileInject(string $sql, Blueprint $blueprint)
        {
            $this->_injectComment($sql, $blueprint);

            return $sql;
        }

        /**
         * 注入备注
         *
         * @param string    $sql
         * @param Blueprint $blueprint
         * @author Quasar
         */
        private function _injectComment(string &$sql, Blueprint $blueprint)
        {
            if(isset($blueprint->comment) && $blueprint->getColumns()){
                $blueprint->comment = str_replace('\'', '\\\'', $blueprint->comment);
                $sql                .= " comment = '{$blueprint->comment}'";
            }
        }
    }