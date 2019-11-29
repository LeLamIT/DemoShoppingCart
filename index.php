<?php
    include('layouts/header.php');
    include('config/dbConfig.php');

    $sql = "SELECT * FROM sanpham";
    $result = mysqli_query($con, $sql);
?>

<!-- Page Content -->
<div class="container">

    <!-- Jumbotron Header -->
    <header class="jumbotron my-4">
        <h4>Shopping - Cart</h4>
    </header>

    <!-- Page Features -->
    <div class="row text-center">
    <?php
        while($row = mysqli_fetch_array($result)){
    ?>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card h-100">
                <img class="card-img-top" src="public/img/<?php echo $row['anh'] ?>" alt="">
                <div class="card-body">
                    <h4 class="card-title"><?php echo $row['ten'] ?></h4>
                    <p class="card-text"><?php echo number_format($row['gia'],0,",",".")."đ" ?></p>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" onclick="addCart(<?php echo $row['id'] ?>)">Thêm Vào Giỏ</button>
                </div>
            </div>
        </div>
    <?php } ?>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<?php
    include('layouts/footer.php');
?>