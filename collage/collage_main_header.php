<?php
require('../conn.php');
$email = $_SESSION["email"];
if(!isset($_SESSION['email'])){
  session_unset();
  session_destroy();
  header('location:Collage_login.php');
}
?>
<!doctype html>
<html>
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title></title>
    <link rel="stylesheet"href="https://fonts.googleapis.com/css?family=Tangerine">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
      }
      .bd-mode-toggle {
        z-index: 1500;
      }
      .dropdown-toggle { outline: 0; }

      ul h1{
        font-family: 'Tangerine', serif;
  font-size: 56px;
  text-shadow: 4px 4px 4px #aaa;
      }

    </style>

    
    <!-- Custom styles for this template -->

<main>

  <header class="p-3 mb-3 border-bottom">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="#" class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none">
          <img src="../uploads/<?php 
          $sql = "SELECT * FROM collage where email = '$email'";
          $query = mysqli_query($connection, $sql);
          foreach($query as $q){
                echo $q['logo'];
              }
          ?>" width="100" height="40" alt="Logo">
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
        <h1 class="mx-5"><?php echo $q['name']; ?></h1>
          <li><a href="Collage_main.php" class="nav-link mt-3 px-2 link-secondary">Home</a></li>
          <!-- <li><a href="#" class="nav-link px-2 mt-3 link-body-emphasis">Club</a></li> -->
          <!-- <li><a href="#" class="nav-link px-2 link-body-emphasis">Customers</a></li>
          <li><a href="#" class="nav-link px-2 link-body-emphasis">Products</a></li> -->
        </ul>

        <form class="d-flex mx-3" action="Collage_logic.php" method="POST">
        <input class="form-control me-2" type="search" name="search" placeholder="Search Post" aria-label="Search">
        <button class="btn btn-outline-success" type="submit"><i class="bi bi-search"></i></button>
      </form>
        <?php
        	
          $grav_url = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( 'mp' ) . "&s=40";

        ?>
        <div class="dropdown text-end">
          <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="<?php echo $grav_url; ?>" alt="mdo" width="32" height="32" class="rounded-circle">
          </a>
          <ul class="dropdown-menu text-small">
            <!-- <li><a class="dropdown-item" href="#">New project...</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li> -->
            <li><a class="dropdown-item" href="Collage_profile.php">Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
          </ul>
        </div>
      </div>
    </div>
  </header>