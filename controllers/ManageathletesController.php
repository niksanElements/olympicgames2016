<?php
class ManageathletesController extends BaseController
{
  function index()
  {
    $this->authorizeAdmin();

    $this->athletes = $this->model->getAllAthletes();
  }

  function add()
  {
    $this->authorizeAdmin();

    if($this->isPost)
    {

      
      $isTeam = $_POST["isTeam"];
      $full_name = $_POST["full_name"];
      if (strlen($full_name) < 2 || strlen ($full_name)> 200) {
          $this->setValidationError("full_name", "Invalid name");
      }
      $age = $_POST["age"];
      $sportID = $_POST["sportID"];
      $countryID = $_POST["countryID"];

      if($this->formValid())
      {
        $result = $this->model->addAthlete($isTeam, $full_name, $age, $sportID, $countryID);
        if($result === true)
        {
          $this -> addInfoMessage("Add successful.");
          $this -> redirect('manageathletes', 'index');
        }
        else
        {
          $this->addErrorMessage("Add failed. Try again.");
        }
      }
    }

    $this->countries = $this->model->getCountries();
    $this->sports = $this->model->getSports();
  }

  function edit($id)
  {
    $this->authorizeAdmin();
    $this->athlete = $this->model->getAthlete($id);
    $this->countries = $this->model->getCountries();
    $this->sports = $this->model->getSports();

    if($this->isPost)
    {
      $full_name = $_POST["full_name"];
      if (strlen($full_name) < 2 || strlen ($full_name)> 200) {
          $this->setValidationError("full_name", "Invalid name");
      }
      $age = $_POST["age"];
      $sportID = $_POST["sportID"];
      $countryID = $_POST["countryID"];

      if($this->formValid())
      {
        $result = $this->model->editAthlete($id, $full_name, $age, $sportID, $countryID);
        if($result === true)
        {
          $this -> addInfoMessage("Edit successful.");
          $this -> redirect('manageathletes', 'index');
        }
        else
        {
          $this->addErrorMessage("Edit failed. Try again.");
        }
      }
    }
  }

  function delete($id)
  {
    $this->authorizeAdmin();
    $result = $this->model->deleteAthlete($id);
    if($result === true)
    {
      $this -> addInfoMessage("Delete successful.");
      $this -> redirect('manageathletes', 'index');
    }
    else
    {
      $this->addErrorMessage("Delete failed. Try again.");
    }
  }
}
?>
