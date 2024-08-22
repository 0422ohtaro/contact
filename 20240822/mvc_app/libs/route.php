<?php
function route($path, $httpMethod) {
    try {
        list($controller, $method) = explode('/', $path);
        $case = [$method, $httpMethod];

        $routes = [
            'home' => [
                'get' => ['index' => 'index'],
            ],
            'user' => [
                'get' => [
                    'log-in' => 'logIn',
                    'sign-up' => 'signUp',
                    'log-out' => 'logOut',
                    'my-page' => 'myPage',
                    'edit' => 'edit',
                    'delete' => 'delete',
                ],
                'post' => [
                    'create' => 'create',
                    'certification' => 'certification',
                    'update' => 'update',
                ],
            ],
            'contact' => [
    'get' => [
        'index' => 'index',
        'edit' => 'edit',
        'delete' => 'delete',
        'confirm' => 'confirm',
        'complete' => 'complete',
    ],
    'post' => [
        'create' => 'create',
        'confirm' => 'confirm',
        'complete' => 'complete',
        'update' => 'update',
        'confirmEdit' => 'confirmEdit',
        'completeEdit' => 'completeEdit',
    ],
],
        ];

        if (isset($routes[$controller][$httpMethod][$method])) {
            $controllerName = ucfirst($controller) . 'Controller';
            $methodName = $routes[$controller][$httpMethod][$method];
        } else {
            throw new Exception('No route found.');
        }

        if (!empty($controllerName) && !empty($methodName)) {
            $controllerPath = __DIR__ . "/../Controllers/{$controllerName}.php";
            if (file_exists($controllerPath)) {
                require_once($controllerPath);
                $obj = new $controllerName();
                $obj->$methodName();
            } else {
                throw new Exception("Controller file not found: {$controllerPath}");
            }
        } else {
            throw new Exception('No route found.');
        }
    } catch (Throwable $e) {
        error_log($e->getMessage());
        header("HTTP/1.0 404 Not Found");
        echo "404 Not Found";
        exit();
    }
}
