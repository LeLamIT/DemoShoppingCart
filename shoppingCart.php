<?php
    ob_start();
    session_start();
    include('config/dbConfig.php');

    if(isset($_POST["id"])){

        $id = $_POST["id"];
        $sql = "SELECT * FROM sanpham WHERE id=".$id;
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_row($result);

        if(!isset($_SESSION["cart"])){
            $cart[$id] = array(
                'ten' => $row[1],
                'anh' => $row[2],
                'gia' => $row[3],
                'soluong' => 1
            );
        }
        else{
            $cart = $_SESSION["cart"];
            if(array_key_exists($id, $cart)){
                $cart[$id] = array(
                    'ten' => $row[1],
                    'anh' => $row[2],
                    'gia' => $row[3],
                    'soluong' => (int)$cart[$id]["soluong"]+1
                );
            }
            else{
                $cart[$id] = array(
                    'ten' => $row[1],
                    'anh' => $row[2],
                    'gia' => $row[3],
                    'soluong' => 1
                );
            }
        }

        $_SESSION["cart"] = $cart;

        $soluong = 0;
        $tonggia = 0;
        foreach($cart as $value){
            $soluong += (int)$value["soluong"];
            $tonggia += (int)$value["soluong"] * (int)$value["gia"];
        }
        echo $soluong. "-" .number_format($tonggia,0,",",".")."đ";
    }
?>