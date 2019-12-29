<?php
// Start the session
session_start();
require_once ('template/database.php');
$database= new Database();
if( isset($_POST) && !empty($_POST)){
    if(isset($_POST["action"])){
        switch ($_POST["action"]){
            case 'add' :
                if(isset($_POST['quanity']) && isset($_POST['product_id'])){
                    $sql="SELECT * FROM productss WHERE id=".(int) $_POST["product_id"];
                    $product=$database->runQuery($sql);
                    $product= current($product);
                    echo "<pre>";
                    print_r($product);
                    echo "</pre>";
                    $product_id= $product['id'];
                    if ( isset($_SESSION['cart_item'])&&!empty($_SESSION['cart_item'])){
                        if (isset($_SESSION['cart_item'][$product_id])){
                            $exist_cart_item=$_SESSION['cart_item'][$product_id];
                            $exist_quanity=$exist_cart_item['quanity'];
                            $cart_item=array();
                            $cart_item['id']=$product['id'];
                            $cart_item['product_name']=$product['product_name'];
                            $cart_item['product_images']=$product['product_images'];
                            $cart_item['price']=$product['price'];
                            $cart_item['price']=$product['price'];
                            $cart_item['quanity']=  $exist_quanity + $_POST['quanity'];
                            $_SESSION['cart_item'][$product_id]=$cart_item;

                        }
                        else{
                            $cart_item=array();
                            $cart_item['id']=$product['id'];
                            $cart_item['product_name']=$product['product_name'];
                            $cart_item['product_images']=$product['product_images'];
                            $cart_item['price']=$product['price'];
                            $cart_item['price']=$product['price'];
                            $cart_item['quanity']=$_POST['quanity'];
                            $_SESSION['cart_item'][$product_id]=$cart_item;
                        }
//                        foreach ($_SESSION['cart_item'] as $key_id=>$value_id){
//                            echo'<br>'. ' Begin Duyệt mảng';
//                            echo "<pre>";
//                            print_r($key_id);
//                            echo "</pre>";
//                            echo "<pre>";
//                            print_r($value_id);
//                            echo "</pre>";
//
//                            echo'<br>'. ' End Duyệt mảng';
//                        }
                    }
                    else{
                        $_SESSION['cart_item']= array();
                        $product_id= $product['id'];
                        $cart_item=array();
                        $cart_item['id']=$product['id'];
                        $cart_item['product_name']=$product['product_name'];
                        $cart_item['product_images']=$product['product_images'];
                        $cart_item['price']=$product['price'];
                        $cart_item['price']=$product['price'];
                        $cart_item['quanity']=$_POST['quanity'];
                        $_SESSION['cart_item'][$product_id]=$cart_item;
                    }
                }
                break;
                case 'remove':
                     echo '<br>'.$_POST;
                    echo'<pre>';
                    print_r($_POST);
                    echo'</pre>';
                    echo 'remove';
                    if (isset($_POST['product_id'])){
                    $product_id=$_POST['product_id'];
                    if (isset($_SESSION['cart_item'][$product_id])){
                        unset($_SESSION['cart_item'][$product_id]);
                    }
                    }

                break;
            default:
                echo " action không tồn tại";

                die();
        }
    }
    echo '<br> $_POST';
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    echo '<br> $_SESSION';
    echo "<pre>";
    print_r($_SESSION);
    echo "</pre>";
    echo '<br> $_SESSION cart item';
    echo "<pre>";
    print_r($_SESSION['cart_item']);
    echo "</pre>";
}

//$sql="SELECT * FROM productss";
//$products=$database->runQuery($sql);
header("Location: http://localhost/simplephpcarts/template/index.php");
die();
