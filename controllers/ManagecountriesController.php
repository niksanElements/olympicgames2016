<?php
class ManagecountriesController extends BaseController
{
    function index()
    {
        $this->authorizeAdmin();
        $this->countries = $this->model->getCountries();
    }

    function add()
    {
        $this->authorizeAdmin();
        if ($this->isPost) {
            $fullName = $_POST["full_name"];
            if (strlen($fullName) < 2 || strlen($fullName) > 100) {
                $this->setValidationError("full_name", "Invalid country name");
            }
            $shortName = $_POST["short_name"];
            if (strlen($shortName) < 1 or strlen($shortName) > 3) {
                $this->setValidationError("short_name", "Invalid country name");
            }
            if ($this->formValid()) {
                $result = $this->model->addCountry($fullName, $shortName);
                if ($result === true) {
                    $this->addInfoMessage("Add successful.");
                    $this->redirect("managecountries", "index");
                } else {
                    $this->addErrorMessage("Add failed. Try again.");
                }
            }
        }
    }

    public function edit($id)
    {
        $this->authorizeAdmin();
        $this->country = $this->model->getCountry($id);
        if($this->isPost) {
            $fullName = $_POST["full_name"];
            if (strlen($fullName) < 2 || strlen($fullName) > 100) {
                $this->setValidationError("full_name", "Invalid country name");
            }
            $shortName = $_POST["short_name"];
            if (strlen($shortName) < 1 or strlen($shortName) > 3) {
                $this->setValidationError("short_name", "Invalid country name");
            }
            if($this->formValid())
            {
              if($this->model->editCountry($id, $fullName, $shortName)){
                  $this->addInfoMessage("Success!!");
                  $this->redirect("managecountries");
              }
              else{
                  $this->addErrorMessage("Place try again!");
              }
            }
        }
    }
}
