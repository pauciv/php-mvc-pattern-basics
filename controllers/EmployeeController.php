<?php

// esta clase se instancia en Router
class EmployeeController
{
    use Controller; 
    // trait que tiene un construct que le da valor a las siguientes propiedades:
    
    // $model = ej: new EmployeeModel (que es el return del método loadModel del trait Controller)
    // $view = new View()

    /* ~~~ CONTROLLER METHODS ~~~ */
    // los métodos se ejecutan en Controller.php en función del action del Query Param

    function getAllEmployees() 
    {
        // model = ej: new EmployeeModel
        $employees = $this->model->get(); // get(): returns the array with the DB data
        
        echo "<hr>", '$employees:', "<br>";
        // echo "<pre>";
        print_r($employees);
        // echo "</pre>";

        // $view = new View()
        if (isset($employees)) {
            $this->view->data = $employees;
            $this->view->render("employee/employeeDashboard");
        }
    }

    function getEmployee($request) // $request = array de los Query Params que se crea con el $_REQUEST en Controller
    {
        $employee = null;
        if (isset($request["id"])) {

            echo "<hr>", '$request: ', "<br>";
            print_r($request);
            // model = ej: new EmployeeModel
            $employee = $this->model->getById($request["id"]); //
        }

        $this->view->action = $request["action"];
        $this->view->data = $employee;
        $this->view->render("employee/employee");
    }

    function createEmployee($request)
    {
        if (sizeof($_POST) > 0) {
            $employee = $this->model->create($_POST);

            if ($employee[0]) {
                header("Location: index.php?controller=Employee&action=getAllEmployees");
            } else {
                echo $employee[1];
            }
        } else {
            $this->view->action = $request["action"];
            $this->view->render("employee/employee");
        }
    }

    function updateEmployee($request)
    {
        if (sizeof($_POST) > 0) {
            $employee = $this->model->update($_POST);

            if ($employee[0]) {
                header("Location: index.php?controller=Employee&action=getAllEmployees");
            } else {
                $this->action = $request["action"];
                $this->error = "The data entered is incorrect, check that there is no other employee with that email.";
                $this->view->render("employee/employee");
            }
        } else {
            $this->view->render("employee/employee");
        }
    }

    function deleteEmployee($request)
    {
        $action = $request["action"];
        $employee = null;
        if (isset($request["id"])) {
            $employee = $this->model->delete($request["id"]);
            header("Location: index.php?controller=Employee&action=getAllEmployees");
        }
    }
}
