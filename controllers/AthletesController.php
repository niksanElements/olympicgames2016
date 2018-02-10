<?php
class AthletesController extends BaseController
{

  function index($sort = NULL)
  {
    $this->athletes = $this->model->getAllAthletes($sort);
  }
}
?>
