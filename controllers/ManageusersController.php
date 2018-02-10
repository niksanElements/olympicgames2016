<?php
/**
 * Created by PhpStorm.
 * User: Chelikov
 * Date: 18.8.2016 г.
 * Time: 19:28 ч.
 */

class ManageusersController extends BaseController
{
    function index()
    {
        $this->authorizeAdmin();
        $this->users = $this->model->getAllUsers();
    }

    function edit($id)
    {
        $this->authorizeAdmin();

        if($this->isPost)
        {
            $username = $_POST["username"];
            $full_name = $_POST["full_name"];
            $email = $_POST["email"];
            $status = $_POST["status"];
            $password = $_POST["password"];
            $password_confirm = $_POST["password_confirm"];

            if (strlen($username) < 2 || strlen ($username)> 50) {
                $this->setValidationError("username", "Invalid Username");
            }
            if (strlen($full_name) < 2|| strlen ($full_name)> 200) {
                $this->setValidationError("fullName", "Full Name must be between 2 and 200 characters.");
            }
            if (strlen($email) < 2 || strlen($email) > 80) {
                $this->setValidationError("email", "Please, enter your email address.");
            }

            if($this->formValid())
            {
                $result = $this->model->editUser($id, $username, $full_name, $email, $status, $password);
                if($result === true)
                {
                    $this->addInfoMessage("Edit successful.");
                }
                else
                {
                    $this->addErrorMessage("Edit failed. Try again.");
                }
            }
        }

        $this->user = $this->model->getUser($id);
    }
    
    function delete($id)
    {
        $this->authorizeAdmin();
        $result = $this->model->deleteUser($id);
        if($result === true)
        {
            $this->addInfoMessage("Delete successful.");
        }
        else
        {
            $this->addErrorMessage("Delete failed. Try again.");
        }
        $this->redirect("manageusers", "index");
    }
}
