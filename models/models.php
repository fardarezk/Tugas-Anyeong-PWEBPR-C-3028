<?php

require_once 'conf/database.php';

class Models{

  static function read(){
    global $con;
    $query = "SELECT * from anyeong";
    $result = mysqli_query($con, $query);
    $data = array();
    if ($result->num_rows > 0) {
      while($a = $result->fetch_array()) {
        $data[]=$a;
      }
    }
    return $data;
  }

  static function create($seller, $phone, $product, $count, $sp, $id=2){
    global $con;
    $query = "INSERT into anyeong (Seller, Phone, Product, Count, Photo, id) values (?,?,?,?,?)";
    $stmt = $con->prepare($query);
    $stmt->bind_param("ssssi", $seller, $phone, $product, $count, $sp, $id);
    $stmt->execute();
    $result = $stmt->affected_rows > 0 ? true : false;
    $stmt->close();
    return $result;
  }

  static function detail($id){
    global $con;
    $query = "SELECT * from anyeong WHERE id=".$id;
    $result = mysqli_query($con, $query);
    if ($result->num_rows > 0) {
      while($a = $result->fetch_array()) {
        $data[]=$a;
      }
    }
    else { 
      $data = [];
    }
    return $data;
  }

  static function update($id, $seller, $phone, $product, $count, $sp){
    global $con;
    $stmt = $con->prepare("UPDATE anyeong set Seller=?, Phone=?, Product=?, Count=?, Photo=? WHERE id=".$id);
    $stmt->bind_param("sssss", $seller, $phone, $product, $count, $sp);
    $stmt->execute();
    $result = $stmt->affected_rows > 0 ? true : false;
    $stmt->close();
    return $result;
  }

  static function delete($id){
    global $con;
    $query = "DELETE from anyeong where id=?";
    $stmt = $con->prepare($query);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->affected_rows > 0 ? true : false;
    $stmt->close();
    return $result;
  }
}