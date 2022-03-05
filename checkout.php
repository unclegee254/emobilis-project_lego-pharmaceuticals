<?php

@include "config.php";



if(isset($_POST["order_btn"])){

    $name=$_POST["name"];
    $number=$_POST["number"];
    $email=$_POST["email"];
    $method=$_POST["method"];
    $delivery_address=$_POST["delivery_address"];
    $county=$_POST["county"];

    $cart_query = mysqli_query($conn, "SELECT * FROM `cart`");
    $price_total = 0;
    if(mysqli_num_rows($cart_query) > 0){
        while($product_item=mysqli_fetch_assoc($cart_query)){
            $product_name[]=$product_item["name"] .'('.$product_item["quantity"] .')';
            $product_price =number_format((int)$product_item["price"] * (int)$product_item["quantity"]);
            $price_total += $product_price;
        };
    };

    $total_products = implode(',',$product_name);
    $detail_query = mysqli_query($conn,"INSERT INTO `order`(`name`, `number`, `email`, `method`, `delivery_address`, `county`, `total_products`, `total_price`) VALUES ('$name','$number','$email','$method','$delivery_address','$county','$total_products','$price_total')") or die("query failed");
    if($cart_query && $detail_query){
        echo "
        <div class='order-message-container'>
        <div class='message-container'>
            <h3>Thank you for making your order.</h3>
            <div class='order-detail'>
               <span>".$total_products."</span>
               <span class='total'>total: Kshs ".$price_total."/- </span>
            </div>
            <div class='customer-details'>
                <p>Your name:  <span>".$name."</span></p>
                <p>Your number:  <span>".$number."</span></p>
                <p>Your email:  <span>".$email."</span></p>
                <p>Payment method:  <span>".$method."</span></p>
                <p>Your delivery address:  <span></span>".$delivery_address.", ".$county."</p>
            </div>
                <a href='index.php' class='btn'>continue shopping</a>
           </div>
        </div>
        ";
    }
}

?>



<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lego-Checkout</title>

<!--font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<!--custom css-->
    <link rel="stylesheet" href="styles.css">

</head>
<body>

      <div class="container">
      <section class="checkout-form">

          <h1 class="heading">Complete your order</h1>

        <form action=""method="post">

            <div class="dispay-order">
                <?php
                $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
                $total = 0;
                $grand_total=0;
                if (mysqli_num_rows($select_cart) > 0){
                    while($fetch_cart=mysqli_fetch_assoc($select_cart)){
                        $total_price= number_format((int)$fetch_cart["price"]* (int)$fetch_cart["quantity"]);
                        $grand_total= $total += $total_price;
                        ?>
                        <span><?= $fetch_cart["name"]; ?>(<?= $fetch_cart["quantity"]; ?>)</span>
                <?php
                    }
                }else{
                    echo "<div class='display-order'><span>Your cart is empty!</span></div>>";
                }
                ?>
                <span class="grand_total">Grand total : <?=$grand_total; ?></span>
            </div>


            <div class="flex">
                <div class="inputBox">
                    <span>Your name</span>
                    <input type="text" placeholder="Enter your name" name="name" required>
                </div>
                <div class="inputBox">
                    <span>Your number</span>
                    <input type="number" placeholder="Enter your phone number" name="number" required>
                </div>
                <div class="inputBox">
                    <span>Your email address</span>
                    <input type="email" placeholder="Enter your email" name="email">
                </div>
                <div class="inputBox">
                    <span>Your payment method</span>
                    <select name="method">
                        <option value="cash on delivery" selected>Cash on delivery</option>
                        <option value="credit card">Credit card</option>
                        <option value="mpesa on delivery">Mpesa on delivery</option>
                    </select>
                </div>
                <div class="inputBox">
                    <span>Delivery address</span>
                    <input type="text" placeholder="pick up location" name="delivery_address" required>
                </div>
                <div class="inputBox">
                    <span>Your county</span>
                    <input type="text" placeholder="County of delivery" name="county" required>
                </div>
            </div>
            <input type="submit" value="Order now" name="order_btn" class="btn">
        </form>
      </section>
      </div>




</body>
</html>
