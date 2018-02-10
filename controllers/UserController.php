<?php
/**
 * Created by PhpStorm.
 * User: Nikolay
 * Date: 8/2/2016
 * Time: 11:18 PM
 */


class UserController extends BaseController
{

    public function index()
    {
        $this->redirect("user","account");
    }

    public function registration()
    {
        if($this->isPost){
            $username =$_POST['username'];
            if (strlen($username) < 2 || strlen ($username)> 50) {
                $this -> setValidationError("username", "Invalid Username");
            }
            $passwordRepeat =$_POST['password-repeat'];
            $password =$_POST['password'];
            if (strlen($password) < 3) {
                $this -> setValidationError("password", "Invalid Password - password must be at least 3 symbols.");
            }
            if ($password != $passwordRepeat) {
                $this -> setValidationError("password-repeat", "The 2 passwords do not match.");
            }

            $fullName =$_POST['fullName'];
            if (strlen($fullName) < 2|| strlen ($fullName)> 200) {
                $this->setValidationError("fullName", "Full Name must be between 2 and 200 characters.");
            }

                $email = $_POST['email'];
                if (strlen($email) < 2 || strlen($email) > 80) {
                    $this->setValidationError("email", "Please, enter your email address.");
                }
            if($this->formValid()){
                $userID = $this->model->registration ($username, $password, $fullName, $email);
                if ($userID){
                    $_SESSION['username'] = $username;
                    $_SESSION['userID'] = $userID;
                    if($userID == 1){
                      $_SESSION['admin'] = true;
                    }
                    $this -> addInfoMessage("Registration successful.");
                    $this -> redirect('home');
                }else{
                    $this->addErrorMessage("Registration failed. Try again.");
                }

            }

        }
    }

    public function login()
    {
        if($this->isPost){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $loginResult = $this->model->login($username, $password);
            if (is_array($loginResult)){
                $_SESSION['userID'] = $loginResult["userID"];
                $_SESSION['username'] = $username;
                if($loginResult['status'] === 'R' or $loginResult['status'] === 'A') {
                    $_SESSION['redactor'] = true;
                }
                else{
                    $_SESSION['redactor'] = false;
                }
                if($loginResult["status"] === 'A'){
                  $_SESSION['admin'] = true;
                }
                else {
                  $_SESSION['admin'] = false;
                }
                $this->addInfoMessage("Loggin successful.");
                return $this->redirect('home');
            } else{
                $this->addErrorMessage("Error: Login failed.");
            }
        }
    }

    public function logout()
    {
        session_destroy();
        $this->addInfoMessage("Logout successful.");
        $this->redirect("home");
    }

    public function account()
    {
        $this->authorize();

        if($this->isPost)
        {
            $full_name = $_POST["full_name"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $password_confirm = $_POST["password_confirm"];

            if (strlen($full_name) < 2|| strlen ($full_name)> 200) {
                $this->setValidationError("full_name", "Full Name must be between 2 and 200 characters.");
            }
            if (strlen($email) < 2 || strlen($email) > 80) {
                $this->setValidationError("email", "Please, enter your email address.");
            }

            if($this->formValid())
            {
                $result = $this->model->editUserAccount($_SESSION["userID"], $full_name, $email, $password);
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

        $this->user = $this->model->getUserAccount($_SESSION["userID"]);
    }
}
