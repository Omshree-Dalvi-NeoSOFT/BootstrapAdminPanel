<!-- welcome page showing user email id -->
<!DOCTYPE html>
<html lang="en">
<head>

  <!-- include head tags and other script/link tags -->
<?php include('head.php')?>

</head>
<body>

    <section class="container">
    <div class="jumbotron">
        <h1 class="display-4">Welcome <?php echo $_GET['mid'];?></h1>
        <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
        <hr class="my-4">
        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="index.php" role="button">Login Now</a>
        </p>
    </div>



    <!-- include script tags -->
    <?php include('foot.php')?>
</body>
</html>