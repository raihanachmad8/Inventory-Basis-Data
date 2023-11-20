<?php

interface ViewInterface {
    public static function renderView(string $view, array $model = []): void;
    public static function render(array $view, array $model = []): void;
    public static function redirect(string $url);
}


class View implements ViewInterface
{
    public static function renderVIew(string $view, array $model = []): void
    {
        require_once __DIR__ . '/../View/header.php';
        require_once __DIR__ . '/../View/' . $view . '.php';
        require_once __DIR__ . '/../View/footer.php';
    }

    public static function render(array $view, array $model = []): void
    {
        // require_once __DIR__ . "/../View/" . $view['header'] . ".php";
        // require_once __DIR__ . "/../View/" . $view['view'] . ".php";
        // require_once __DIR__ . "/../View/" . $view['footer'].".php";
    }

    public static function redirect(string $url)
    {
        header("Location: $url");
        if (getenv("mode") != "test") {
            exit();
        }
    }
}   