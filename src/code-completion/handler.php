<?php
    /** @noinspection PhpUndefinedClassInspection */
    /**
     * This file is created by Quasar on 2019-12-25 14:45
     */

    namespace Illuminate\Support\Facades
    {

        use BadMethodCallException;
        use Closure;
        use Illuminate\Http\JsonResponse;
        use Illuminate\Routing\PendingResourceRegistration;
        use Illuminate\Routing\RouteCollection;
        use Illuminate\Routing\Router;
        use Illuminate\Routing\RouteRegistrar;
        use ReflectionException;

        /**
         *
         *
         * @method static RouteRegistrar prefix(string $prefix)
         * @method static RouteRegistrar where(array $where)
         * @method static RouteRegistrar middleware(array|string|null $middleware)
         * @method static RouteRegistrar as(string $value)
         * @method static RouteRegistrar domain(string $value)
         * @method static RouteRegistrar name(string $value)
         * @method static RouteRegistrar namespace(string $value)
         *
         * @see \Illuminate\Routing\Router
         */
        class Route
        {
            /**
             * Register a new GET route with the router.
             *
             * @param string                             $uri
             * @param Closure|array|string|callable|null $action
             *
             * @return \Illuminate\Routing\Route
             * @static
             */
            public static function get($uri, $action = null)
            {
                /** @var Router $instance */
                return $instance->get($uri, $action);
            }

            /**
             * Register a new POST route with the router.
             *
             * @param string                             $uri
             * @param Closure|array|string|callable|null $action
             *
             * @return \Illuminate\Routing\Route
             * @static
             */
            public static function post($uri, $action = null)
            {
                /** @var Router $instance */
                return $instance->post($uri, $action);
            }

            /**
             * Register a new PUT route with the router.
             *
             * @param string                             $uri
             * @param Closure|array|string|callable|null $action
             *
             * @return \Illuminate\Routing\Route
             * @static
             */
            public static function put($uri, $action = null)
            {
                /** @var Router $instance */
                return $instance->put($uri, $action);
            }

            /**
             * Register a new PATCH route with the router.
             *
             * @param string                             $uri
             * @param Closure|array|string|callable|null $action
             *
             * @return \Illuminate\Routing\Route
             * @static
             */
            public static function patch($uri, $action = null)
            {
                /** @var Router $instance */
                return $instance->patch($uri, $action);
            }

            /**
             * Register a new DELETE route with the router.
             *
             * @param string                             $uri
             * @param Closure|array|string|callable|null $action
             *
             * @return \Illuminate\Routing\Route
             * @static
             */
            public static function delete($uri, $action = null)
            {
                /** @var Router $instance */
                return $instance->delete($uri, $action);
            }

            /**
             * Register a new OPTIONS route with the router.
             *
             * @param string                             $uri
             * @param Closure|array|string|callable|null $action
             *
             * @return \Illuminate\Routing\Route
             * @static
             */
            public static function options($uri, $action = null)
            {
                /** @var Router $instance */
                return $instance->options($uri, $action);
            }

            /**
             * Register a new route responding to all verbs.
             *
             * @param string                             $uri
             * @param Closure|array|string|callable|null $action
             *
             * @return \Illuminate\Routing\Route
             * @static
             */
            public static function any($uri, $action = null)
            {
                /** @var Router $instance */
                return $instance->any($uri, $action);
            }

            /**
             * Register a new Fallback route with the router.
             *
             * @param Closure|array|string|callable|null $action
             *
             * @return \Illuminate\Routing\Route
             * @static
             */
            public static function fallback($action)
            {
                /** @var Router $instance */
                return $instance->fallback($action);
            }

            /**
             * Create a redirect from one URI to another.
             *
             * @param string $uri
             * @param string $destination
             * @param int    $status
             *
             * @return \Illuminate\Routing\Route
             * @static
             */
            public static function redirect($uri, $destination, $status = 302)
            {
                /** @var Router $instance */
                return $instance->redirect($uri, $destination, $status);
            }

            /**
             * Register a new route that returns a view.
             *
             * @param string $uri
             * @param string $view
             * @param array  $data
             *
             * @return \Illuminate\Routing\Route
             * @static
             */
            public static function view($uri, $view, $data = [])
            {
                /** @var Router $instance */
                return $instance->view($uri, $view, $data);
            }

            /**
             * Register a new route with the given verbs.
             *
             * @param array|string                       $methods
             * @param string                             $uri
             * @param Closure|array|string|callable|null $action
             *
             * @return \Illuminate\Routing\Route
             * @static
             */
            public static function match($methods, $uri, $action = null)
            {
                /** @var Router $instance */
                return $instance->match($methods, $uri, $action);
            }

            /**
             * Register an array of resource controllers.
             *
             * @param array $resources
             * @param array $options
             *
             * @return void
             * @static
             */
            public static function resources($resources, $options = [])
            {
                /** @var Router $instance */
                $instance->resources($resources, $options);
            }

            /**
             * Route a resource to a controller.
             *
             * @param string $name
             * @param string $controller
             * @param array  $options
             *
             * @return PendingResourceRegistration
             * @static
             */
            public static function resource($name, $controller, $options = [])
            {
                /** @var Router $instance */
                return $instance->resource($name, $controller, $options);
            }

            /**
             * Create a route group with shared attributes.
             *
             * @param array          $attributes
             * @param Closure|string $routes
             *
             * @return void
             * @static
             */
            public static function group($attributes, $routes)
            {
                /** @var Router $instance */
                $instance->group($attributes, $routes);
            }

            /**
             * Dispatch the request to the application.
             *
             * @param \Illuminate\Http\Request $request
             *
             * @return \Illuminate\Http\Response|JsonResponse
             * @static
             */
            public static function dispatch($request)
            {
                /** @var Router $instance */
                return $instance->dispatch($request);
            }

            /**
             * Register a route matched event listener.
             *
             * @param string|callable $callback
             *
             * @return void
             * @static
             */
            public static function matched($callback)
            {
                /** @var Router $instance */
                $instance->matched($callback);
            }

            /**
             * Add a new route parameter binder.
             *
             * @param string          $key
             * @param string|callable $binder
             *
             * @return void
             * @static
             */
            public static function bind($key, $binder)
            {
                /** @var Router $instance */
                $instance->bind($key, $binder);
            }

            /**
             * Register a model binder for a wildcard.
             *
             * @param string       $key
             * @param string       $class
             * @param Closure|null $callback
             *
             * @return void
             * @static
             */
            public static function model($key, $class, $callback = null)
            {
                /** @var Router $instance */
                $instance->model($key, $class, $callback);
            }

            /**
             * Set a global where pattern on all routes.
             *
             * @param string $key
             * @param string $pattern
             *
             * @return void
             * @static
             */
            public static function pattern($key, $pattern)
            {
                /** @var Router $instance */
                $instance->pattern($key, $pattern);
            }

            /**
             * Set a group of global where patterns on all routes.
             *
             * @param array $patterns
             *
             * @return void
             * @static
             */
            public static function patterns($patterns)
            {
                /** @var Router $instance */
                $instance->patterns($patterns);
            }

            /**
             * Get a route parameter for the current route.
             *
             * @param string      $key
             * @param string|null $default
             *
             * @return mixed
             * @static
             */
            public static function input($key, $default = null)
            {
                /** @var Router $instance */
                return $instance->input($key, $default);
            }

            /**
             * Get the request currently being dispatched.
             *
             * @return \Illuminate\Http\Request
             * @static
             */
            public static function getCurrentRequest()
            {
                /** @var Router $instance */
                return $instance->getCurrentRequest();
            }

            /**
             * Get the currently dispatched route instance.
             *
             * @return \Illuminate\Routing\Route|null
             * @static
             */
            public static function current()
            {
                /** @var Router $instance */
                return $instance->current();
            }

            /**
             * Check if a route with the given name exists.
             *
             * @param string $name
             *
             * @return bool
             * @static
             */
            public static function has($name)
            {
                /** @var Router $instance */
                return $instance->has($name);
            }

            /**
             * Alias for the "currentRouteNamed" method.
             *
             * @param mixed $patterns
             *
             * @return bool
             * @static
             */
            public static function is($patterns = null)
            {
                /** @var Router $instance */
                return $instance->is($patterns);
            }

            /**
             * Alias for the "currentRouteUses" method.
             *
             * @param array $patterns
             *
             * @return bool
             * @static
             */
            public static function uses($patterns = null)
            {
                /** @var Router $instance */
                return $instance->uses($patterns);
            }

            /**
             * Register the typical authentication routes for an application.
             *
             * @param array $options
             *
             * @return void
             * @static
             */
            public static function auth($options = [])
            {
                /** @var Router $instance */
                $instance->auth($options);
            }

            /**
             * Get the underlying route collection.
             *
             * @return RouteCollection
             * @static
             */
            public static function getRoutes()
            {
                /** @var Router $instance */
                return $instance->getRoutes();
            }

            /**
             * Register a custom macro.
             *
             * @param string          $name
             * @param object|callable $macro
             *
             * @return void
             * @static
             */
            public static function macro($name, $macro)
            {
                Router::macro($name, $macro);
            }

            /**
             * Mix another object into the class.
             *
             * @param object $mixin
             * @param bool   $replace
             *
             * @return void
             * @throws ReflectionException
             * @static
             */
            public static function mixin($mixin, $replace = true)
            {
                Router::mixin($mixin, $replace);
            }

            /**
             * Checks if macro is registered.
             *
             * @param string $name
             *
             * @return bool
             * @static
             */
            public static function hasMacro($name)
            {
                return Router::hasMacro($name);
            }

            /**
             * Dynamically handle calls to the class.
             *
             * @param string $method
             * @param array  $parameters
             *
             * @return mixed
             * @throws BadMethodCallException
             * @static
             */
            public static function macroCall($method, $parameters)
            {
                /** @var Router $instance */
                return $instance->macroCall($method, $parameters);
            }

        }
    }
