<?php
    ob_start();
    session_start();
    include('config/dbConfig.php');
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Shopping - Cart</title>

        <!-- Bootstrap core CSS -->
        <link href="public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="public/css/heroic-features.css" rel="stylesheet">
        <link href="public/style.css" rel="stylesheet">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>

    <body>

        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="#">Shopping-Cart</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="/cart">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>

                        <!-- ---------------------------------------------------------------------------------------------------- -->

                        <li class="nav-item">
                            <a class="nav-link" href="giohang.php" class="btn btn-light">
                                <?php
                                    $soluong = 0;
                                    $tonggia = 0;
                                    if(isset($_SESSION["cart"])){
                                        $cart = $_SESSION["cart"];
                                        foreach($cart as $value){
                                            $soluong += (int)$value["soluong"];
                                            $tonggia += (int)$value["soluong"] * (int)$value["gia"];
                                        }
                                    }
                                ?>
                                <i style="color:#fff; font-size:20px" class="fa fa-shopping-cart" aria-hidden="true"> <b id="soluong"><?php echo $soluong ?></b></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>