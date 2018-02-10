<?php
class ManagemedalsController extends BaseController
{
  function index()
  {
    $this->authorizeAdmin();
    $this->medals = $this->model->getAllMedals();
  }

  function add()
  {
    $this->authorizeAdmin();
    $this->athletes = $this->model->getAllAthletes();
    if($this->isPost)
    {
      $name = $_POST["name"];
      if (strlen($name) < 2 || strlen ($name)> 100) {
          $this->setValidationError("name", "Invalid medal name");
      }
      $type = $_POST["type"];
      if ($type < 1 or $type > 3){
        $this->setValidationError("medal", "Invalid medal input");
      }
      $playerID = $_POST["playerID"];
      if($this->formValid())
      {
        $result = $this->model->addMedal($name, $type, $playerID);
        if($result === true)
        {
          $this->addInfoMessage("Add successful.");
          $this->redirect("managemedals", "index");
        }
        else
        {
          $this->addErrorMessage("Add failed. Try again.");
        }
      }
    }
  }

  function edit($id)
  {
    $this->authorizeAdmin();
    $this->athletes = $this->model->getAllAthletes();

    if($this->isPost)
    {
      $name = $_POST["name"];
      if (strlen($name) < 1 || strlen ($name)> 100) {
          $this->setValidationError("name", "Invalid medal name");
      }
      $type = $_POST["type"];
      if ($type < 1 or $type > 3) {
        $this->setValidationError("medal", "Invalid medal info");
      }
      $playerID = $_POST["playerID"];

      if($this->formValid())
      {
        $result = $this->model->editMedal($id, $name, $type, $playerID);
        if($result === true)
        {
          $this->addInfoMessage("Edit successful.");
          $this->redirect("managemedals", "index");
        }
        else
        {
          $this->addErrorMessage("Edit failed. Try again.");
        }
      }
    }

    $this->medals = $this->model->getMedal($id);
  }

  function delete($id)
  {
    $this->authorizeAdmin();
    $result = $this->model->deleteMedal($id);
    if($result === true)
    {
      $this->addInfoMessage("Delete successful.");
      $this->redirect("managemedals", "index");
    }
    else
    {
      $this->addErrorMessage("Delete failed. Try again.");
    }
  }
}
?>
