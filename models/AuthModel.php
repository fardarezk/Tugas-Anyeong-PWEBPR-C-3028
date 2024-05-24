<?php 

require_once 'conf/database.php';

class AuthModel{

  static function getdata($email)
  {
    global $con;
    $query = "select * from login_register where email='".$email."'";
    $result = mysqli_query($con, $query);
    $data = array();
    if ($result->num_rows > 0) {
      while($a = $result->fetch_array()) {
        $data[]=$a;
      }
    }
    return $data;
  }

  static function register($email, $username, $password)
  {
    global $con;
    $query = "insert into login_register (email, username, password) values (?,?,?)";
    $stmt = $con->prepare($query);
    $stmt->bind_param("sss", htmlspecialchars($email), htmlspecialchars($username), htmlspecialchars($password));
    $stmt->execute();
    $result = $stmt->affected_rows > 0 ? true : false;
    $stmt->close();
    return $result;
  }
}