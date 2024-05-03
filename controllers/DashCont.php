<?php
require_once "function/function.php";
require_once "models/models.php";

class DashCont{
  
  public function index(){
    $data = Models::read();
    loadView('dashboard', $data);
  }
}