<?php
require_once "models/models.php";
require_once "function/function.php";

class Controller{
  
  public function index(){
    $data = Models::read();
    loadView('dashboard', $data);
  }

  public function formcreate(){
    loadView('newdata');
  }

  public function create(){
    global $url;
    $data = Models::create($_POST["Seller"],$_POST["Phone"],$_POST["Product"],$_POST["Count"],$_POST["Photo"]);
    header("Location:".$url."/dashboard");
  }

  public function detail($id){
    $data = Models::detail($id);
    return $data;
  }

  public function formupdate($id){
    // die($id);
    $data = Models::detail($id);
    loadView('update', $data);
  }

  public function update($id){
    global $url;
    $data = Models::update($id,$_POST["Seller"],$_POST["Phone"],$_POST["Product"],$_POST["Count"],$_POST["Photo"]);
    header("Location:".$url."/dashboard");
  }

  public function delete($id){
    global $url;
    $data = Models::delete($id);
    header("Location:".$url."/dashboard");
  }
}