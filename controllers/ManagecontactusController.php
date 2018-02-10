<?php
class ManagecontactusController extends BaseController
{
  function index()
  {
    $this->authorizeAdmin();
    $this->contactus = $this->model->getAllContacts();
  }

  function add()
  {
    $this->authorizeAdmin();
    if ($this->isPost) {
      $name = $_POST["name"];
      if (strlen($name) < 2 || strlen($name) > 100) {
        $this->setValidationError("contactus", "Invalid team member name");
      }

      $age = $_POST["age"];
      if ($age < 0 or $age > 100) {
        $this->setValidationError("contactus", "Invalid age");
      }

      $body = $_POST["body"];
      if (strlen($body) < 0 or strlen($body) > 10000) {
        $this->setValidationError("contactus", "Invalid text size");
      }

      $education = $_POST["education"];
      if (strlen($education) < 1 || strlen($education) > 1000) {
        $this->setValidationError("contactus", "Invalid text size");
      }
      $passion = $_POST["passion"];
      if (strlen($passion) < 1 || strlen($passion) > 100) {
        $this->setValidationError("contactus", "Invalid text size");
      }
      $work = $_POST["work"];
      if (strlen($work) < 1 || strlen($work) > 100) {
        $this->setValidationError("contactus", "Invalid text size");
      }

      if ($this->formValid()) {
        $result = $this->model->addContact($name, $age, $body, $education, $passion, $work);
        if ($result === true) {
          $this->addInfoMessage("Add successful.");
          $this->redirect("managecontactus", "index");
        } else {
          $this->addErrorMessage("Add failed. Try again.");
        }
      }
    }
  }

  function edit(int $id)
  {
    $this->authorizeAdmin();

    $this->authorizeAdmin();
    if ($this->isPost) {
      $name = $_POST["name"];
      if (strlen($name) < 2 or strlen($name) > 100) {
        $this->setValidationError("contactus", "Invalid team member name");
      }

      $age = $_POST["age"];
      if ($age < 0 or $age > 100) {
        $this->setValidationError("contactus", "Invalid age");
      }

      $body = $_POST["body"];
      if (strlen($body) < 1 or strlen($body) > 10000) {
        $this->setValidationError("contactus", "Invalid text size");
      }

      $education = $_POST["education"];
      if (strlen($education) < 1 or strlen($education) > 1000) {
        $this->setValidationError("contactus", "Invalid text size");
      }
      $passion = $_POST["passion"];
      if (strlen($passion) < 1 or strlen($passion) > 100) {
        $this->setValidationError("contactus", "Invalid text size");
      }
      $work = $_POST["work"];
      if (strlen($work) < 1 or strlen($work) > 100) {
        $this->setValidationError("contactus", "Invalid text size");
      }

      if ($this->formValid()) {
        $result = $this->model->editContact($id, $name, $age, $body, $education, $passion, $work);
        if ($result === true) {
          $this->addInfoMessage("Edit successful.");
          $this->redirect("managecontactus", "index");
        } else {
          $this->addErrorMessage("Edit failed. Try again.");
        }
      }
    }
  
    $this->contactus = $this->model->getContact($id);
  }

  function delete($id)
  {
    $this->authorizeAdmin();
    $result = $this->model->deleteContact($id);
    if($result === true)
    {
      $this->addInfoMessage("Delete successful.");
      $this->redirect("managecontactus", "index");
    }
    else
    {
      $this->addErrorMessage("Delete failed. Try again.");
    }
  }
}
?>
