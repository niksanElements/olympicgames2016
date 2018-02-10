<?php
class ManagesportsController extends BaseController
{
  function index()
  {
    $this->authorizeAdmin();
    $this->sports = $this->model->getAllSports();
  }

  function add()
  {
    $this->authorizeAdmin();
    $this->venues = $this->model->getAllVenues();
    if($this->isPost)
    {
      $name = $_POST["name"];
      if (strlen($name) < 2 || strlen ($name)> 100) {
          $this->setValidationError("name", "Invalid sport name");
      }
      $venueID = $_POST["venueID"];

      if($this->formValid())
      {
        $result = $this->model->addSport($name, $venueID);
        if($result === true)
        {
          $this->addInfoMessage("Add successful.");
          $this->redirect("managesports", "index");
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
    $this->venues = $this->model->getAllVenues();

    if($this->isPost)
    {
      $name = $_POST["name"];
      if (strlen($name) < 2 || strlen ($name)> 100) {
          $this->setValidationError("name", "Invalid sport name");
      }
      $venueID = $_POST["venueID"];

      if($this->formValid())
      {
        $result = $this->model->editSport($id, $name, $venueID);
        if($result === true)
        {
          $this->addInfoMessage("Edit successful.");
          $this->redirect("managesports", "index");
        }
        else
        {
          $this->addErrorMessage("Edit failed. Try again.");
        }
      }
    }

    $this->sport = $this->model->getSport($id);
  }

  function delete($id)
  {
    $this->authorizeAdmin();
    $result = $this->model->deleteSport($id);
    if($result === true)
    {
      $this->addInfoMessage("Delete successful.");
      $this->redirect("managesports", "index");
    }
    else
    {
      $this->addErrorMessage("Delete failed. Try again.");
    }
  }
}
?>
