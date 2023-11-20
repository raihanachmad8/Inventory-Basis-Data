<?php

require_once __DIR__ . '/View.php';

interface RouterInterface {
    public static function run(): void;
    public static function add(string $method, string $path, string $controller, string $function, array $middleware = []): void;
    public static function get(string $path, string $controller, string $function, array $middleware = []): void;
    public static function post(string $path, string $controller, string $function, array $middleware = []): void;
    public static function put(string $path, string $controller, string $function, array $middleware = []): void;
    public static function delete(string $path, string $controller, string $function, array $middleware = []): void;
    public static function patch(string $path, string $controller, string $function, array $middleware = []): void;


}
class Router implements RouterInterface {
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
                
                //     // Call middleware
                    foreach ($route['middleware'] as $middleware){
                            $instance = new $middleware;
                            $instance->before();
                        };

                $function = $route['function'];
                $controller = new $route['controller'];
                array_shift($variables);
                call_user_func_array([$controller, $function], $variables);
            
            return;
            }
        }

        // If no route matches, handle 404 error
        self::render404();
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
        // self::run();
    }

    public static function get(string $path, string $controller, string $function, array $middleware = []): void
    {
        self::add('GET', $path, $controller, $function, $middleware);
    }

    public static function post(string $path, string $controller, string $function, array $middleware = []): void
    {
        self::add('POST', $path, $controller, $function, $middleware);
    }

    public static function put(string $path, string $controller, string $function, array $middleware = []): void
    {
        self::add('PUT', $path, $controller, $function, $middleware);
    }

    public static function delete(string $path, string $controller, string $function, array $middleware = []): void
    {
        self::add('DELETE', $path, $controller, $function, $middleware);
    }

    public static function patch(string $path, string $controller, string $function, array $middleware = []): void
    {
        self::add('PATCH', $path, $controller, $function, $middleware);
    }

    public static function render404(): void
    {
        http_response_code(404);
        View::renderView('404');
        exit();
    }

    public static function render401(): void
    {
        http_response_code(401);
        View::renderView('401');
        exit();
    }

    public static function render500(): void
    {
        http_response_code(500);
        View::renderView('500');
        exit();
    }
}
