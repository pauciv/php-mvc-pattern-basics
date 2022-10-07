<?php

// esta clase, en función del Query Param (?controller=...) que haya, 
// instancia la clase del controller correspondiente (EmployeeController o HobbieController)
// si no hay param se mantiene en main.php.

class Router 
{
    function __construct()
    {
        if (isset($_GET['controller'])) {
            $controllerName = $_GET['controller'] . "Controller"; // = ej: EmployeeController
            $controllerPath = CONTROLLERS . $controllerName . ".php"; // = ej: .../controllers/EmployeeController.php
            
            echo '$controllerName = ', $controllerName, "<br>";
            echo '$controllerPath = ', $controllerPath, "<br>";
            // CONTROLLERS = BASE_PATH . '/controllers/' |  (config/constants.php)
            // BASE_PATH = getcwd() |                       (config/baseConstants.php)

            $fileExists = file_exists($controllerPath);

            if ($fileExists) {
                require_once $controllerPath; // = ej: .../controllers/EmployeeController.php
                $controller = new $controllerName; // = ej: new EmployeeController
            } else {
                $errorMsg = "The page you are trying to access does not exist.";
                require_once VIEWS . "error/error.php";
            }
        } else {
            require_once VIEWS . "main/main.php"; // .../views/main/main
            echo "views/main/main.php: ", VIEWS . "main/main.php", "<br>";
        }
    }
}
