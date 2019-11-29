<?php
    include('layouts/header.php');
?>

<!-- Page Content -->
<div class="container">

    <!-- Jumbotron Header -->
    <header class="jumbotron my-4">
        <h4>Shopping - Cart</h4>
    </header>

    <!-- Page Features -->
    <div class="row text-center">
        <table class="table" id="listCart">
            <thead>
                <tr class="bg-primary text-light">
                    <th>Ảnh Sản Phẩm</th>
                    <th>Tên</th>
                    <th>Số Lượng</th>
                    <th>Giá</th>
                    <th>Tổng Giá</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php
                $soluong = 0;
                $tonggia = 0;
                $tonggiohang = 0;
                if(isset($_SESSION["cart"])){
                    $cart = $_SESSION["cart"];
                    foreach($cart as $key=>$value){
                        // $soluong = (int)$value["soluong"];
                        
            ?>
                <tr>
                    <td><img src="public/img/<?php echo $value["anh"] ?>" width="120px" alt=""></td>
                    <td><?php echo $value["ten"] ?></td>
                    <td><input style="width: 80px" class="form-control mx-sm-3" type="number" id="num_<?php echo $key ?>" onclick="editCart(<?php echo $key ?>)" value="<?php echo $value["soluong"] ?>"></td>
                    <td>
                        <?php
                            $gia = (int)$value["gia"];
                            echo number_format($gia,0,",",".")."đ";
                        ?>
                    </td>
                    <td>
                        <?php
                            $tonggia = (int)$value["soluong"] * (int)$value["gia"];
                            echo number_format($tonggia,0,",",".")."đ";

                            $tonggiohang += $tonggia;
                        ?>                        
                    </td>
                    <td><i onclick="deleteCart(<?php echo $key ?>)" class="fa fa-times" aria-hidden="true"></i></td>
                </tr>
                <?php }} ?>
            </tbody>
            <tbody>
                <tr>
                    <th colspan="6" style="text-align:right">Tổng Giá: <b><?php echo number_format($tonggiohang,0,",",".")."đ"; ?></b></th>
                </tr>
                <tr>
                    <th colspan="6" style="text-align:right"><a class="btn btn-primary" href="">Thanh Toán</a></th>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<?php
    include('layouts/footer.php');
?>