<?php
class AdminpanelController extends BaseController
{
  function index()
  {
    $this->authorizeAdmin();


  }
}
?>
