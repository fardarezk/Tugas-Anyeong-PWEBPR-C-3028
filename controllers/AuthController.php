<?php

require_once "models/AuthModel.php";
require_once "function/function.php";

class AuthController{
  
  public function __construct()
  {
    global $url;
    session_start();
    if(isset($_SESSION['is_auth']) and $_SESSION['is_auth'] == true)
    {
      echo "<script>window.location.href = '".$url."/dashboard'</script>";
    }
  }

  static function viewlogin(){
    loadView('login');
  }

  static function viewregister(){
      loadView('regist');
  }

  static function login(){
    global $url;
    if (empty($_POST["email"])) {
      echo "<script>alert('Email tidak boleh kosong');window.location.href = '".$url."/'</script>";
      exit(); 
    } 
    else if (empty($_POST["password"])) {
      echo "<script>alert('Password tidak boleh kosong');window.location.href = '".$url."/'</script>";
      exit();
    }
    if (strlen($_POST["password"]) < 8) {
      echo("<script>alert('Password minimal input 8 karakter');window.location.href = '".$url."/'</script>");
      exit();
    }
    $data = AuthModel::getdata($_POST["email"]);
    if ($_POST["email"] != $data[0]['email']) {
      echo("<script>alert('Email salah');window.location.href = '".$url."/'</script>");
      exit();
    }
    if ($_POST["password"] != $data[0]['password']) {
      echo("<script>alert('Password salah');window.location.href = '".$url."/'</script>");
      exit();
    }
    session_start();
    $_SESSION["username"] = $data[0]['username'];
    $_SESSION["email"] = $data[0]['email'];
    $_SESSION["id_user"] = $data[0]['id_user'];
    $_SESSION["is_auth"] = true;
    header('Location: '.$url.'/dashboard');
    exit();
  }

  static function register(){
    global $url;
    if (empty($_POST["username"])) {
      echo "<script>alert('Username tidak boleh kosong');window.location.href = '".$url."/register'</script>";
      exit(); 
    } 
    else if (empty($_POST["password"])) {
      echo "<script>alert('Password tidak boleh kosong');window.location.href = '".$url."/register'</script>";
      exit();
    }
    else if (empty($_POST["email"])) {
      echo "<script>alert('Email tidak boleh kosong');window.location.href = '".$url."/register'</script>";
      exit();
    }
    if (strlen($_POST["password"]) < 8) {
      echo("<script>alert('Password minimal input 8 karakter');window.location.href = '".$url."/register'</script>");
      exit();
    }
    $data = AuthModel::getdata($_POST["username"]);
    if ($data[0]['username'] != "") {
      echo("<script>alert('Username sudah dipakai!');window.location.href = '".$url."/register'</script>");
      exit();
    }
    $result = AuthModel::register($_POST['email'], $_POST['username'], $_POST['password']);
    if($result){
      $data = AuthModel::getdata($_POST["username"]);
      session_start();
      $_SESSION["username"] = $data[0]['username'];
      $_SESSION["email"] = $data[0]['email'];
      $_SESSION["id_user"] = $data[0]['id_user'];
      $_SESSION["is_auth"] = true;
      header('Location: '.$url.'/dashboard');
      exit();
    }
    else {
      echo("<script>alert('gagal register, ulangi kembali');window.location.href = '".$url."/register'</script>");
      exit();
    }
  }

  static function logout(){
    global $url;
    session_start();
    if(!isset($_SESSION['is_auth']))
    {
      echo "<script>window.location.href = '".$url."/'</script>";
      exit();
    }
    session_unset();
    session_destroy();
    header('Location: '.$url.'/');
  }
}