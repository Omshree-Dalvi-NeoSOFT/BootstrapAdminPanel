<?php 
$erremail=$errpass='';
  if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $password=$_POST['pass'];
    $pass1=$password;
    if(!empty($email) && !empty($password)){
      if(is_dir("users/$email")){
          $fo=fopen("users/$email/details.txt","r");
          $uname=fgets($fo);
          $pass=trim(fgets($fo));
          $password=substr(sha1($password),0,10);
          if($pass==$password){
            session_start();
            $_SESSION['sid']=$uname;
            $_SESSION['eml']=$email;
            if(!empty($_POST['rememberme'])){
              setcookie("email",$email,time()+3600*24);
              setcookie("password",$pass1,time()+3600*24);
            }
            header("location:dashboard.php");
          }
          else {
            $erremail=$errpass="Enter correct email or password";
          }
        }
      else{
        $erremail=$errpass="Enter correct email or password";
      }
    }
    else {
      $erremail=$errpass="Plz fill the blank fields";
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- include head tags and other scripts/links -->
<?php include('head.php')?>
<script>

  function cook(){
    if("<?php echo $_COOKIE['email'];?>"!=undefined){
      if("<?php echo $_COOKIE['email'];?>" == document.getElementById("email").value){
        document.getElementById("password").value = "<?php echo $_COOKIE['password'];?>";
      }
      else{
        document.getElementById("password").value = "";
      }
    }
  }

</script>
</head>
<body>
    <section class="container">
        <div class="jumbotron">
        <h1 class="display-4">Login Panel</h1>
        <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
        <hr class="my-4">
        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>

        </div>
           <!-- login form -->
            <form method="post">
            <div class="input-group input-group-lg">
                <span class="input-group-text" id="inputGroup-sizing-lg">Email - ID</span>
                <input type="email" class="form-control" name="email" id="email" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" onchange="cook()">
            </div>
                <span class="text-danger"><?php echo $erremail;?></span>
                <br>

            <div class="input-group input-group-lg">
                <span class="input-group-text" id="inputGroup-sizing-lg">Password</span>
                <input type="password" class="form-control" id="password" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" name="pass">
            </div>
                <span class="text-danger"><?php echo $errpass?></span>
                <br>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" name="rememberme" id="exampleCheck1">
                <label class="form-check-label"  for="exampleCheck1">Remember me</label>
            </div>
                <button type="submit" class="btn btn-success p-2" name="submit">Sign in</button>
                <a class="btn btn-primary " href="register.php" role="button">New User</a>
            </form>
    </section>
    <section class="container-fluid">

    <!-- include script tags. -->
    <?php include('foot.php')?>
</body>
</html>
