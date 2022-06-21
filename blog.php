<?php
include "logic.php";
session_start();


if (isset($_SESSION['login'])) {

    $fname = $_SESSION['fname'];
    $lname = $_SESSION['lname'];
    //print_r($_SESSION);

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ultimas noticias - Wolrd News</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

</head>

<body>

    <div class="brand">World News</div>
    <!-- Navigation -->
    <?php require_once 'nav.php'; ?>

    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="text-center">Bienvenido <?php echo $fname; echo " "; echo $lname; echo $type;?> - <a href="logout.php">Logout</a></h2>
                    <h2 class="intro-text text-center">World News
                        <strong></strong>
                    </h2>
                    <hr>
                </div>
                <div class="container mt-5">

<!-- Info -->
<?php if(isset($_REQUEST['info'])){ ?>
    <?php if($_REQUEST['info'] == "added"){?>
        <div class="alert alert-success" role="alert">
            Post creado satisfactoriamente
        </div>
    <?php }?>
<?php } ?>

<!-- Display posts from database -->

<?php if(isset($_SESSION['login'])){ ?>
    <?php if($_SESSION['login'] == "4"){?>
        <div class="row">
    <?php foreach($query as $q){ ?>
        <div class="col-12 col-lg-4 d-flex justify-content-center">
            <div class="card text-white bg-dark mt-5" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $q['title'];?></h5>
                    <p class="card-text"><?php echo substr($q['content'], 0, 50);?>...</p>
                    <a href="view.php?id=<?php echo $q['id']?>" class="btn btn-light">Leer mas <span class="text-danger">&rarr;</span></a>
                </div>
            </div>
        </div>
        
    <?php }?>

</div>
    <?php }?>
    <?php }?>


<div class="text-center">
    <a href="create.php" class="btn btn-outline-dark">+ Nuevo post</a>
</div>



</div>
<?php foreach($query as $q){ ?>
    <div class="col-lg-12 text-center">
              
                    <img class="img-responsive img-border img-full" src="img/slide-1.jpg" alt="">
                    <h2><?php echo $q['title'];?>
                    </h2>
                    <p class="card-text"><?php echo substr($q['content'], 0, 50);?>...</p>
                    <a href="view.php?id=<?php echo $q['id']?>" class="btn btn-light">Leer mas <span class="text-danger">&rarr;</span></a>

                    <button type=“button” class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Modal</button>
                    <hr>
                </div>           
    <?php }?>
        
                <div class="col-lg-12 text-center">
                    <ul class="pager">
                        <li class="previous"><a href="#">&larr; Viejos</a>
                        </li>
                        <li class="next"><a href="#">Nuevos &rarr;</a>
                        </li>
                    </ul>
                </div>
                </div>

    
    <!-- /.container -->
</div>
</div>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Copyright &copy; World News 2022</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>

<?php

} else {
    header("location:login.php ");
}
?>
