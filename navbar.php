<?php 
session_start();
$user=$_SESSION['sid'];

$page = @$_GET['con'];
switch($page){
    case 'product': $prst="active";
    break;
    case 'order': $orst="active";
    break;
    case 'calculator': $calst="active";
    break;
    case 'contactus': $contst="active";
    break;
    
}

?>
  <!-- define nav bar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="index.php">Company Name</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
    <li class="nav-item">
        <a class="nav-link" href="#">Welcome : <?php echo $user;?></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="?con=home">Home</a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link"  href="products.php">Products</a>
      </li> -->
      <li class="nav-item">
        <a class="nav-link"  href="?con=changepass">Change Password</a>
      </li>
        
    </ul>
    <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      <a class="btn btn-outline-danger my-2 my-sm-0 ml-2" role="button" href="logout.php"> Logout</a>
    </form>
  </div>
</nav>

    
