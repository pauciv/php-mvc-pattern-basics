<?php

class HobbieController
{
    use Controller;

    /* ~~~ CONTROLLER METHODS ~~~ */

    function getAllHobbies()
    {
        $hobbies = $this->model->get();
        if (isset($hobbies)) {
            $this->view->data = $hobbies;
            $this->view->render("hobbie/hobbieDashboard");
        }
    }

    function getHobbie($request)
    {
        $hobbie = null;
        if (isset($request["id"])) {
            $hobbie = $this->model->getById($request["id"]);
        }

        $this->view->action = $request["action"];
        $this->view->data = $hobbie;
        $this->view->render("hobbie/hobbie");
    }

    function createHobbie($request)
    {
        if (sizeof($_POST) > 0) {
            $hobbie = $this->model->create($_POST);

            if ($hobbie[0]) {
                header("Location: index.php?controller=Hobbie&action=getAllHobbies");
            } else {
                echo $hobbie[1];
            }
        } else {
            $this->view->action = $request["action"];
            $this->view->render("hobbie/hobbie");
        }
    }

    function updateHobbie($request)
    {
        if (sizeof($_POST) > 0) {
            $hobbie = $this->model->update($_POST);

            if ($hobbie[0]) {
                header("Location: index.php?controller=Hobbie&action=getAllHobbies");
            } else {
                $this->action = $request["action"];
                $this->error = "The data entered is incorrect, check that there is no other hobbie with that name.";
                $this->view->render("hobbie/hobbie");
            }
        } else {
            $this->view->render("hobbie/hobbie");
        }
    }

    function deleteHobbie($request)
    {
        $action = $request["action"];
        $hobbie = null;
        if (isset($request["id"])) {
            $hobbie = $this->model->delete($request["id"]);
            header("Location: index.php?controller=Hobbie&action=getAllHobbies");
        }
    }
}
