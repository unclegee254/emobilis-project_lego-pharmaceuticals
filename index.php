<?php

include "config.php";
session_start();
$user_id = $_SESSION["user_id"];

if(!isset($user_id)){
    header("location:login.php");
};

if(isset($_GET["logout"])){
    unset($user_id);
    session_destroy();
    header("location:login.php");
}

if(isset($_GET["Proceed to Check Out"])){
    header("location:checkout.php");

}

if(isset($_POST["add_to_cart"])){

    $product_name=$_POST["product_name"];
    $product_price=$_POST["product_price"];
    $product_image=$_POST["product_image"];
    $product_quantity=$_POST["product_quantity"];

    $select_cart=mysqli_query($conn, "SELECT * FROM `cart` WHERE name='$product_name' AND user_id='$user_id'") or die("query failed");

    if(mysqli_num_rows($select_cart) > 0){
        $message[]= "Product already added to cart";
    }else{
        mysqli_query($conn, "INSERT INTO `cart`(`user_id`, `name`, `price`, `image`, `quantity`) VALUES ('$user_id','$product_name','$product_price','$product_image','$product_quantity')") or die("query failed");
        $message[]= "Product added to cart";
    }

};

if(isset($_POST["update_cart"])){
    $update_quantity = $_POST["cart_quantity"];
    $update_id = $_POST["cart_id"];
    mysqli_query($conn, "UPDATE `cart` SET `quantity`='$update_quantity' WHERE id=$update_id") or die ("query failed");
    $message[]= "Quantity updated";
}

if(isset($_GET["remove"])){
    $remove_id = $_GET["remove"];
    mysqli_query($conn, "DELETE FROM `cart` WHERE id='$remove_id'") or die("query failed");
    header("location:index.php");
}

if(isset($_GET["delete_all"])){
    mysqli_query($conn, "DELETE FROM `cart` WHERE user_id='$user_id'") or die("query failed");
    header("location:index.php");
}

?>



<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Drug shop</title>

    <!--    Custom css -->
    <link rel="stylesheet" href="styles.css">

</head>
<body>

<?php
if(isset($message)){
    foreach ($message as $message){
        echo "<div class='message' onclick='this.remove();'>".$message."</div>>";
    }
}


?>

<div class="container">
<div class="user-profile">
    <?php
        $select_user=mysqli_query($conn,"SELECT * FROM `user_form` WHERE id=$user_id") or die("query failed");
        if(mysqli_num_rows($select_user) > 0){
            $fetch_user=mysqli_fetch_assoc($select_user);
        };
   ?>

   <p> Username: <span><?php echo $fetch_user["name"]; ?></span> </p>
   <p> Email: <span><?php echo $fetch_user["email"]; ?></span> </p>
   <div class="flex">
      <a href="login.php" class="btn">login</a>
      <a href="register.php" class="option-btn">Register</a>
      <a href="index.php?logout=<?php echo "$user_id"; ?>" onclick="return confirm('Do you want to exit?');" class="delete-btn">log out</a>
   </div>

</div>

   <div class="products">

       <h1 class="heading">In stock</h1>

    <div class="box-container">

       <?php
           $select_product=mysqli_query($conn,"SELECT * FROM `products` WHERE 1") or die("query failed");
           if(mysqli_num_rows($select_product) > 0){
               while($fetch_product=mysqli_fetch_assoc($select_product)){
      ?>
           <form method="post" class="box" action="">
               <img src="image_database/<?php echo $fetch_product['image']; ?>" alt="">
               <div class="name"><?php echo $fetch_product['name']; ?></div>
               <div class="price">Kshs <?php echo $fetch_product['price']; ?></div>
               <input type="number" min="1" name="product_quantity" value="1">
               <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
               <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
               <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
               <input type="submit" value="Add to cart" name="add_to_cart" class="btn">
           </form>
     <?php
            };
     };
     ?>
    </div>

</div>

<div class="shopping-cart">
    <h1 class="heading">Order cart</h1>

    <table>
        <thead>
           <th>image</th>
           <th>name</th>
           <th>price</th>
           <th>quantity</th>
           <th>total amount</th>
           <th>action</th>
        </thead>
        <tbody>
        <?php
           $grand_total = 0;
           $cart_query=mysqli_query($conn,"SELECT * FROM `cart` WHERE user_id='$user_id'") or die("query failed");
           if(mysqli_num_rows($cart_query) > 0){
              while($fetch_cart=mysqli_fetch_assoc($cart_query)){
       ?>
           <tr>
               <td><img src="image_database/<?php echo $fetch_cart["image"]; ?>" height="100" alt=""></td>
               <td><?php echo $fetch_cart["name"]; ?></td>
               <td>Ksh<?php echo $fetch_cart["price"]; ?></td>
               <td>
                   <form action="" method="post">
                       <input type="hidden" name="cart_id" value="<?php echo $fetch_cart["id"]; ?>">
                       <input type="number" min="1" name="cart_quantity" value="<?php echo $fetch_cart["quantity"]; ?>">
                       <input type="submit" name="update_cart" value="update" class="option-btn">
                   </form>
               </td>
               <td>Ksh<?php echo $sub_total = number_format((int)$fetch_cart["price"] * (int)$fetch_cart["quantity"]); ?>/-</td>
               <td><a href="index.php?remove=<?php echo $fetch_cart["id"]; ?>" class="delete-btn" onclick="return confirm('Remove item from cart?');">Remove</a></td>
           </tr>
       <?php
           $grand_total += $sub_total;
              };
           }else{
               echo '<tr><td style="padding:20px" colspan="6">No item added to cart</td></tr>';
           }
       ?>
       <tr class="table-bottom">
           <td colspan="4">grand total :</td>
           <td>Ksh<?php echo $grand_total; ?>/-</td>
           <td><a href="index.php?delete_all"onclick="return confirm('Delete all from cart?');" class="delete-btn <?php echo($grand_total > 1)?'':'disabled'; ?>">Delete all</a></td>
       </tr>
    </tbody>
    </table>

    <div class="cart-btn">
        <a href="#" <?php echo($grand_total > 1)?'':'disabled'; ?>"></a>
        <a href="checkout.php" class="btn">Proceed to Check Out</a>
    </div>


</div>

</div>

</body>
</html>
