<?php 
 session_start();
 $sid=$_SESSION['sid'];
 if(empty($sid)){
   header("location:index.php");
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
            <!-- Including head tags and other scripting files. -->
<?php include('head.php')?>     
</head>
<body>
    <?php include('navbar.php')?>
    <section class="mb-3"></section>
    <section class="container-fluid">

    <section class="row">
        <section class="col-md-3 ">
            <?php include('sidebar.php') ?>
        </section>
        <section class="col-md-9 ">
           <?php 
            switch(@$_GET['con']){
                case 'changeimage':
                    include('changeimage.php');
                    break;
                case 'home':
                    include('home.php');
                    break;
                case 'changepass':
                    include('changepass.php');
                    break;
                default:
                    include('home.php');      
            }
           
           
           ?> 
        </section>
    </section>

    </section>
    
    <section class="container-fluid">
        <!-- include footer file, for page footer -->
        <?php include('footer.php')?>
    </section>
    
    <?php include('foot.php')?>
</body>
</html>