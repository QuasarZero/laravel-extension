<?php

    namespace Quasar\Extension\Laravel\Database\Grammar;

    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Schema\Grammars\PostgresGrammar;
    use Illuminate\Support\Fluent;

    /**
     * Created on 2019-12-24 15:24
     *
     * @author Quasar
     */
    class PostgreSQLGrammar extends PostgresGrammar
    {
        /**
         * 覆盖重写父类执行统一构建SQL脚本的方法
         *
         * @param Blueprint $blueprint
         * @param Fluent    $command
         *
         * @return string
         * @author Quasar
         */
        public function compileCreate(Blueprint $blueprint, Fluent $command)
        {
            $sql = parent::compileCreate($blueprint, $command);
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
         *
         * @author Quasar
         * @version PostgreSQL >= 9.0
         */
        private function _injectComment(string &$sql, Blueprint $blueprint)
        {
            if(isset($blueprint->comment) && $blueprint->getColumns()){
                $blueprint->comment = str_replace('\'', '\\\'', $blueprint->comment);
                $sql                = <<<PGSQL
DO $$
BEGIN
    $sql;
    COMMENT ON TABLE {$blueprint->getTable()} IS '{$blueprint->comment}';
END$$;
PGSQL;
            }
        }
    }