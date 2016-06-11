<?php


class Router
{
    private $routes;

    public function __construct()
    {
        // Підключаємо файл із роутерами
        $routersPath = ROOT . '/../app/config/routers.php';
        $this->routes = include ($routersPath);
    }

    /**
     * Return request string
     * @return string
     */
    public function getURI()
    {
        // Отримуємо рядок запиту
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/'); // trim видаляє '/' з початку і кінця
        }
    }

public function run()
    {
        /*
         * Отримуємо рядок запиту
         * Перевіряємо наявність такого запиту в файлі з роутами (routers.php)
         * Якщо є, то визначаємо який контроер і action будуть опрацьовувати запит
         * Створюємо об'єкт та викликаємо метод (action)
         */
        $uri = $this->getURI();

        foreach ($this->routes as $uriPattern => $path) {

            // Порівнюємо $uriPattern з $uri
            if (preg_match("~$uriPattern~", $uri)) {

                // Отримуємо внутрішній шлях із зовнішнього згідно правила
                $internalRouter = preg_replace("~$uriPattern~", $path, $uri);

                // Визначаємо контролер, action і параметри
                $segments = explode('/', $internalRouter);

                $controllerName = array_shift($segments) . 'Controller';
                $controllerName = ucfirst($controllerName);

                $actionName = 'action' . ucfirst(array_shift($segments));

                $parametrs = $segments;

                // Підключаємо файл класа контролера
                $controllerFile = ROOT . '/../app/controllers/' . $controllerName . '.php';

                if (file_exists($controllerFile)) {
                    include_once ($controllerFile);
                }

                if (method_exists($controllerName, $actionName)) {
                    $controllerOblect = new $controllerName;
                    $result = call_user_func_array(array($controllerOblect, $actionName), $parametrs);
                    if ($result != null) {
                        break;
                    }
                }
            }
        }
    }
}