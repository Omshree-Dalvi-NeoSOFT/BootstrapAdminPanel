<?php 

$email=$_SESSION['eml'];
$user=$_SESSION['sid'];

$fo=fopen("users/$email/details.txt","r");
fgets($fo); // userName
fgets($fo); //password
$gender=trim(fgets($fo)); // gender
$age=trim(fgets($fo)); //age
$name=trim(fgets($fo)); // Name
$image=trim(fgets($fo)); // ProfileName
$imgpath="users/$email/$image";
?>

<div class="card" style="width: 18rem;">
  <img src="<?php echo $imgpath ;?>" height="250px" width="100%" class="card-img-top" alt="Profile Photo">
  <div class="card-body">
    <h5 class="card-title"><?php echo $user;?></h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Name : <?php echo $name;?></li>
    <li class="list-group-item">Age : <?php echo $age;?></li>
    <li class="list-group-item">Gender : <?php echo $gender;?></li>
  </ul>
  <div class="card-body">
    <a href="?con=changeimage" class="card-link">Change Image</a>
  </div>
</div>