<?php

// se instancia en los métodos de la clase EmployeeController

class View
{
    public $data; // = $employees = array with the DB data (se usa para hacer el foreach en EmployeeDashboard.php)

    function render($name) // ej: ("employee/employeeDashboard")
    {
        require_once VIEWS . '/' . $name . ".php";
        
        echo "<br>", VIEWS . $name . ".php";
    }
}
