<?php
    ob_start();
    session_start();
    include('config/dbConfig.php');

    if(isset($_POST["id"]) && isset($_POST["num"])){
        $id = $_POST["id"];
        if (isset($_SESSION["cart"])) {
            $cart = $_SESSION["cart"];
            if(array_key_exists($id, $cart)){
                if($_POST["num"]){
                    $cart[$id] = array(
                        'ten' => $cart[$id]["ten"],
                        'anh' => $cart[$id]["anh"],
                        'gia' => $cart[$id]["gia"],
                        'soluong' => $_POST["num"]
                    );
                }
                else{
                    unset($cart[$id]);
                }
                $_SESSION["cart"] = $cart;
            }
        }
    }
?>