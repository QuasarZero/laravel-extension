<?php

    namespace Quasar\Extension\Laravel\Database;

    use Closure;
    use ErrorException;
    use Illuminate\Database\Connection;
    use Illuminate\Database\MySqlConnection;
    use Illuminate\Database\PostgresConnection;
    use Illuminate\Database\Schema\Builder;
    use Illuminate\Database\Schema\Grammars\Grammar;
    use Illuminate\Database\SQLiteConnection;
    use Illuminate\Database\SqlServerConnection;
    use Illuminate\Support\Facades\Facade;

    /**
     * Created on 2019-12-24 11:44
     * @method static Builder create(string $tableName, Closure $closure)
     * @method static Builder drop(string $table)
     * @method static Builder dropIfExists(string $table)
     * @method static Builder table(string $table, Closure $callback)
     * @method static Builder rename(string $from, string $to)
     *
     * @author Quasar
     */
    class Schema extends Facade
    {
        /**
         * Get a schema builder instance for a connection.
         *
         * @param string $name
         *
         * @return Builder
         * @throws ErrorException
         * @author Quasar
         */
        public static function connection($name)
        {
            /** @var Connection $connection */
            /** @noinspection PhpUndefinedMethodInspection */
            $connection = static::$app['db']->connection($name);
            self::routeGrammar($connection);

            return $connection->getSchemaBuilder();
        }

        /**
         * Get a schema builder instance for the default connection.
         *
         * @return Builder
         * @throws ErrorException
         * @author Quasar
         */
        protected static function getFacadeAccessor()
        {
            /** @var Connection $connection */
            /** @noinspection PhpUndefinedMethodInspection */
            $connection = static::$app['db']->connection();
            self::routeGrammar($connection);

            return $connection->getSchemaBuilder();
        }

        /**
         * Grammar路由方法
         *
         *
         * @param Connection $connection
         *
         * @throws ErrorException
         * @author Quasar
         */
        protected static function routeGrammar(Connection $connection)
        {
            if($connection instanceof MySqlConnection){
                $grammar = $connection->withTablePrefix(new MySQLGrammar());
            }
            elseif($connection instanceof PostgresConnection){
                $grammar = $connection->withTablePrefix(new PostgreSQLGrammar());
            }
            elseif($connection instanceof SqlServerConnection){
                $grammar = $connection->withTablePrefix(new SQLServerGrammar());
            }
            elseif($connection instanceof SQLiteConnection){
                $grammar = $connection->withTablePrefix(new SQLiteGrammar());
            }
            else{
                throw new ErrorException('There is not grammar to support \''.get_class($connection).'\'');
            }
            /** @var Grammar $grammar */
            $connection->setSchemaGrammar($grammar);
        }
    }