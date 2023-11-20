<?php

interface RouterInterface {
    
}

class Router {
    public static array $routes = [];

    public static function run(): void
    {
        $path = '/';
        if (isset($_SERVER['PATH_INFO'])) {
            $path = $_SERVER['PATH_INFO'];
        }

        $method = $_SERVER['REQUEST_METHOD'];

        foreach (self::$routes as $route) {
            $pattern = "#^" . $route['path'] . "$#";
            if (preg_match($pattern, $path, $variables) && $method == $route['method']) {

                // call middleware
                foreach ($route['middleware'] as $middleware){
                    $instance = new $middleware;
                    $instance->before();
                }

                $function = $route['function'];
                $controller = new $route['controller'];
                // $controller->$function();

                array_shift($variables);
                call_user_func_array([$controller, $function], $variables);

                return;
            }
        }

        http_response_code(404);
        echo 'CONTROLLER NOT FOUND';
    }

    public static function add(string $method, string $path, string $controller, string $function, array $middleware = []): void
    {
        self::$routes[] = [
            'method' => $method,
            'path' => $path,
            'controller' => $controller,
            'function' => $function,
            'middleware' => $middleware
        ];
    }

    public static function get(string $path, string $controller, string $function, array $middleware = []): void
    {
        self::add('GET', $path, $controller, $function, $middleware);
        self::run();
    }

    public static function post(string $path, string $controller, string $function, array $middleware = []): void
    {
        self::add('POST', $path, $controller, $function, $middleware);
        self::run();
    }

    public static function put(string $path, string $controller, string $function, array $middleware = []): void
    {
        self::add('PUT', $path, $controller, $function, $middleware);
        self::run();
    }

    public static function delete(string $path, string $controller, string $function, array $middleware = []): void
    {
        self::add('DELETE', $path, $controller, $function, $middleware);
        self::run();
    }

    public static function patch(string $path, string $controller, string $function, array $middleware = []): void
    {
        self::add('PATCH', $path, $controller, $function, $middleware);
        self::run();
    }


}