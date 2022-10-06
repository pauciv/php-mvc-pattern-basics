<?php

trait Controller
{
    public $view;
    public $model; // = ej: new EmployeeModel (que es el return del método loadModel del trait Controller)

    // este método, en el caso de que en el Query Param haya un action con el nombre de un método 
    // (ej: getAllEmployees) de la clase (ej: EmployeeController), lo ejecuta.
    function __construct()
    {
        $this->view = new View();
        $this->model = $this->loadModel(substr(__CLASS__,0,-10)); // delete Controller from EmployeeController (class) | (loadModel line 26)

        $action = "";

        if (isset($_REQUEST["action"])) {
            $action = $_REQUEST["action"]; // ej: = getAllEmployees
        }

        if (method_exists(__CLASS__, $action)) { // ej: (EmployeeController, getAllEmployees)
            call_user_func([__CLASS__, $action], $_REQUEST); 
            
            // $_REQUEST es un array de los Query Params y se pasa por parámetro del método que se ejecute
            echo "<hr>", '$_REQUEST (se pasa por parámetro en los métodos de EmployeeController: ', "<br>";
            print_r($_REQUEST);
        } else {
            $this->error("Invalid user action");
        }
    }

    function loadModel($model) // $model = ej: Employee
    {
        $url = MODELS . '/' . $model . 'Model.php'; 

        if (file_exists($url)) {
            require_once $url; // .../models/EmployeeModel.php

            $modelName = $model . 'Model'; // EmployeeModel

            return new $modelName(); // new EmployeeModel
        }
    }

    function error($errorMsg)
    {
        require_once VIEWS . "/error/error.php";
    }
}
