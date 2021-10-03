<?php 

error_reporting(0);

include("cap.php");
//define variables
$erremail=$erruname=$errpass=$errname=$errage=$errgender=$errimage=$errcap=$status=$status2=$status3=$errcpass="";

if(isset($_POST['sub'])){
    $temp=$_FILES['att']['tmp_name'];//read tmp name
    $fn=$_FILES['att']['name'];//orginal name
    $email=$_POST['email'];
    $uname=$_POST['uname'];
    $pass=$_POST['pass'];
    $cpass=$_POST['cpass'];
    $name=$_POST['name'];
    $age=$_POST['age'];
    $gender=$_POST['gender'];
    $dest = "users/".$email."/";
   
    if(!empty($temp) && !empty($email) && !empty($uname) && !empty($pass) && !empty($name) && !empty($age) && !empty($gender) && !empty($cpass) && !empty($_POST['captcha'])){
        if(preg_match("/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i",$email)){
            if($_POST['captcha']==$_POST['captchasum']){
                if(preg_match("/^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/",$pass)){
                    if($cpass == $pass){
                        if(preg_match("/^[a-zA-Z0-9\-\_]+$/",$uname)){
                            $ext=pathinfo($fn,PATHINFO_EXTENSION);
                            $fname="profile.$ext";
                            if($ext=="jpg" || $ext=="png" || $ext=="jpeg"){
                                if(is_dir("users/".$email)){
                                    $erremail = "is-invalid";
                                    $status= "user already registered !";
                                }
                                else{
                                    mkdir("users/$email");
                                    if(move_uploaded_file($temp,"users/$email/$fname")){
                                        $password = substr(sha1($pass),0,10);
                                        file_put_contents("users/$email/details.txt","$uname \n $password \n $gender \n $age \n $name \n $fname");
                                        $erremail=$erruname=$errpass=$errname=$errage=$errgender=$errimage="is-valid";
                                        header("location:welcome.php?mid=$email");
                                    }
                                    else{
                                        $status3="uploading error !";
                                    }
                                }
                            }
                            else{
                                $errimage = "is-invalid";
                                $status3 = "only jpg/png file formate allowed !";
                            }
                        }
                        else{
                            $erruname = "is-invalid";
                        }
                    }
                    else{
                        $errcpass="is-invalid";
                    }
                }
                else{
                    $errpass = "is-invalid";
                }
            }
            else{
                $errcap = "is-invalid";
            }
        }
        else{
            $erremail = "is-invalid";
        }
    }
    else{
        $erremail=$erruname=$errpass=$errname=$errage=$errgender=$errimage=$errcap=$errcpass="is-invalid";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>

  <!-- include head tags and other script/link tags -->
<?php include('head.php')?>

</head>
<body>

  <!-- include navbar -->
    <?php include('nav.php')?>
    <!-- <section class="p-4"></section> -->
    <section class="container">
    <div class="jumbotron">
        <h1 class="display-4">Register Panel</h1>
        <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
        <hr class="my-4">
        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
    </div>
      <!-- contact us form -->
    <form method="post" enctype="multipart/form-data" class="row g-3">
    
        <div class="col-md-4">
        <!-- Email Id -->
        <label for="validationServer02" class="form-label">Email ID</label>
        <input type="email" class="form-control <?php echo $erremail; ?>" id="validationServer02" name="email" >
        
        <!-- error msg -->
        <div class="valid-feedback">
            Looks good!
        </div>
        <div class="invalid-feedback">
            Invalid Email Id !
        </div>
        <section class="text-danger"><?php echo $status?></section>
        </div>
        
        <div class="col-md-4">

            <!-- password -->
            <label for="validationServer02" class="form-label">Password</label>
        <input type="password" class="form-control <?php echo $errpass; ?>" id="validationServer02" name="pass" >
        
        <!-- error msg -->
        <div class="valid-feedback">
            Looks good!
        </div>
        <div class="invalid-feedback">
            Invalid Password ! 
            use min 8 letter password, with at least a symbol, upper and lower case letters and a number
        </div>
        </div>

        <div class="col-md-4">

            <!-- password -->
            <label for="validationServer02" class="form-label">Confirm Password</label>
        <input type="password" class="form-control <?php echo $errcpass; ?>" id="validationServer02" name="cpass" >
        
        <!-- error msg -->
        <div class="valid-feedback">
            Looks good!
        </div>
        <div class="invalid-feedback">
            Please enter correct password !
        </div>
        </div>

        <div class="col-md-6">

            <!-- User name -->
            <label for="validationServerUsername" class="form-label">Username</label>
            <div class="input-group has-validation">
            <span class="input-group-text" id="inputGroupPrepend3">@</span>
            <input type="text" class="form-control <?php echo $erruname; ?>" id="validationServerUsername" aria-describedby="inputGroupPrepend3 validationServerUsernameFeedback" name="uname" >
            
            <!-- error msg -->
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
            Please choose a username.
            </div>
            <div id="validationServerUsernameFeedback" class="valid-feedback">
            Welcome <?php echo $uname; ?> !.
            </div>
            <section class="text-danger"><?php echo $status2?></section>
        </div>
        </div>
        
        
        
        <div class="col-md-6">
            <!-- Name -->
        <label for="validationServer03" class="form-label">Name</label>
        <input type="text" class="form-control <?php echo $errname; ?>" id="validationServer03" aria-describedby="validationServer03Feedback" name="name" >
        
        <!-- error msg -->
        <div id="validationServer03Feedback" class="invalid-feedback">
            Please provide your name.
        </div>
        <div id="validationServer03Feedback" class="valid-feedback">
            welcome <?php echo $name; ?> !.
        </div>
        </div>
        
        <div class="col-md-3">
            <!-- Age -->
            <label for="validationServer05" class="form-label">Age</label>
            <input type="text" class="form-control <?php echo $errage; ?>" id="validationServer05" aria-describedby="validationServer05Feedback" name="age" >
            
            <!-- error msg -->
            <div id="validationServer05Feedback" class="invalid-feedback">
            Please provide your age.
            </div>
            <div id="validationServer05Feedback" class="valid-feedback">
            welcome.
            </div>
        </div>

        <div class="col-md-3">
            <!-- gender -->
        <label for="validationServer04" class="form-label">Gender</label>
        <select class="form-select <?php echo $errgender; ?>" id="validationServer04" aria-describedby="validationServer04Feedback" name="gender" >
            <option selected disabled value="Null">Choose...</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
            
        </select>

        <!-- error msg -->
        <div id="validationServer04Feedback" class="invalid-feedback">
            Please select gender.
        </div>
        </div>
    
        <div class="col-md-6">
            <!-- file image  -->
            <label for="validationServer01" class="form-label">Upload Image</label>
            <input type="file"  name="att"  class="form-control <?php echo $errimage; ?>" id="validationServer01"  >
            
            <!-- error msg -->
            <div class="valid-feedback">
                Looks good !
            </div>
            <div class="invalid-feedback">
                Invalid !
            </div>
            <section class="text-danger"><?php echo $status3?></section>
        </div>

        <div class="col-md-5">
            <!-- Captcha -->
            <label for="validationServer01" class="form-label">Captcha <b><?php echo $val;?></b></label>
            <input type="text"  name="captcha"  class="form-control <?php echo $errcap; ?>" id="validationServer01"  >
            <input type="hidden"  name="captchasum" id="validationServer01" value="<?php echo $capsum;?>" >
            
            <!-- error msg -->
            <div class="valid-feedback">
                Looks good !
            </div>
            <div class="invalid-feedback">
                Invalid Captcha !
            </div>
        </div>

        <div class="col-12">
        <button class="btn btn-success p-2" type="submit" name="sub">Submit</button>
        <a class="btn btn-primary" href="index.php" role="button">Login</a>
        </div>
  
    </form>
    </section>
    <section class="mb-2"></section>
    <section class="container-fluid">

        <!-- include footer -->
        <?php include('f.php')?>
    </section>

    <!-- include script tags -->
    <?php include('foot.php')?>
</body>
</html>