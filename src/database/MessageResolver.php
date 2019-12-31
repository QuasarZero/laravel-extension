<?php

    namespace Quasar\Extension\Laravel\Database;

    use Illuminate\Support\Facades\DB;
    use ReflectionClass;
    use ReflectionException;

    /**
     * Created on 2019-12-31 10:02
     *
     * @author Quasar
     */
    class MessageResolver
    {
        /**
         * 对数据库的原生信息进行解析处理
         *
         * @param string $message
         *
         * @return string
         * @author Quasar
         */
        public static function resolve(string $message): string
        {
            $defaultDatabaseType = strtolower(DB::connection()->getDriverName());
            try{
                /** @var MessageResolveHandler $handler */
                $handler = (new ReflectionClass(self::_getHandler()[ $defaultDatabaseType ]))->newInstance();
                $message = self::_filter($handler)->handle($message);
            }catch(ReflectionException $reflectionException){
                return $message;
            }

            return $message;
        }

        /**
         * Class object filter
         *
         * @param MessageResolveHandler $messageResolveHandler
         *
         * @return MessageResolveHandler
         */
        private static function _filter(MessageResolveHandler $messageResolveHandler)
        {
            return $messageResolveHandler;
        }

        /**
         * 获取处理者列表
         *
         * @return array
         * @author Quasar
         */
        private static function _getHandler()
        {
            return [
                'mysql'  => config('quasar.database.message_resolve_handler.mysql'),
                'pgsql'  => config('quasar.database.message_resolve_handler.postgresql'),
                'sqlite' => config('quasar.database.message_resolve_handler.sqlite'),
                'sqlsrv' => config('quasar.database.message_resolve_handler.sqlserver'),
            ];
        }
    }