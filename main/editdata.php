<?php 
require_once "cont.php";


if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM anyeong WHERE id='$id'";
  $result = mysqli_query($con, $query);
  if ($data = $result->fetch_assoc()) {
      $seller = $data['Seller'];
      $phone = $data['Phone'];
      $product = $data['Product'];
      $count = $data['Count'];
      $sp = $data['Photo'];

  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link rel="stylesheet" href="style/dashboard.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="cont-bg"></div>
        <div class="content flex-row">
          <div class="sidebar flex-column">
            <div class="title-nav">
              <h2>Anyeong~</h2>
            </div>
            <div class="nav">
              <ul>
                <li class="active">
                  <a href="dashboard.php" class="nav-link">
                    <i class="icon-nav">
                      <svg width="33" height="33" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.04999 17.55H14.85V4.04997H4.04999V17.55ZM4.04999 28.35H14.85V20.25H4.04999V28.35ZM17.55 28.35H28.35V14.85H17.55V28.35ZM17.55 4.04997V12.15H28.35V4.04997H17.55Z"fill="#8E8E93" />
                      </svg>
                    </i>
                    Dashboard
                  </a>
                </li>
                <li class="active">
                    <a href="login.php" class="nav-link">
                        <i class="icon-nav">
                            <svg width="33" height="33" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.2929 14.2929C16.9024 14.6834 16.9024 15.3166 17.2929 15.7071C17.6834 16.0976 18.3166 16.0976 18.7071 15.7071L21.6201 12.7941C21.6351 12.7791 21.6497 12.7637 21.6637 12.748C21.87 12.5648 22 12.2976 22 12C22 11.7024 21.87 11.4352 21.6637 11.252C21.6497 11.2363 21.6351 11.2209 21.6201 11.2059L18.7071 8.29289C18.3166 7.90237 17.6834 7.90237 17.2929 8.29289C16.9024 8.68342 16.9024 9.31658 17.2929 9.70711L18.5858 11H13C12.4477 11 12 11.4477 12 12C12 12.5523 12.4477 13 13 13H18.5858L17.2929 14.2929Z" fill="#323232"/>
                                <path d="M5 2C3.34315 2 2 3.34315 2 5V19C2 20.6569 3.34315 22 5 22H14.5C15.8807 22 17 20.8807 17 19.5V16.7326C16.8519 16.647 16.7125 16.5409 16.5858 16.4142C15.9314 15.7598 15.8253 14.7649 16.2674 14H13C11.8954 14 11 13.1046 11 12C11 10.8954 11.8954 10 13 10H16.2674C15.8253 9.23514 15.9314 8.24015 16.5858 7.58579C16.7125 7.4591 16.8519 7.35296 17 7.26738V4.5C17 3.11929 15.8807 2 14.5 2H5Z" fill="#323232"/>
                            </svg>
                        </i>
                        Logout
                    </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="main-board">
            <div class="head-board">
                <h3>Edit Data</h3>
                <h5>Monday, Dec 23 2023</h5>
            </div>
            <form id="form" action="cont.php" METHOD= "POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $id ?>">
            <div class="input-control">
              <label for="Seller">Seller</label>
              <input type="text" name="Seller" value="<?= $seller ?>" >
            </div>
            <div class="input-control">
              <label for="Phone">Phone</label>
              <input type="text" name="Phone" value="<?= $phone ?>">
            </div>
            <div class="input-control">
              <label for="Product">Product</label>
                <input type="text" name="Product" value="<?= $product ?>">
              </div>
              <div class="input-control">
                  <label for="Count">Count</label>
                  <input type="text" name="Count" value="<?= $count ?>">
              </div>
              <div class="">
                <label for="sp" class="">Photo</label>
                <input type="hidden" name="sp" value="<?= $sp ?>">
                <input class="" type="file" id="sp" name="sp" accept=".img, .jpeg, .png ,.jpg" required />
                </div>
              <input type="hidden" name="id" >
              <button id="AddButton" name="proses" type="submit" value="update">Update</button>
          </form>
          </div>
        </div>
    </div>
</body>
</html>