<?php 
  
    if(isset($_POST['update'])){ 
        foreach($_POST['unit_quantity'] as $key => $val) { 
            if($val==0) { 
                unset($_SESSION['cart'][$key]); 
                
            } else if ($val>20) {
                $message = "Maximum for this product is 20";
                echo "<script type='text/javascript'>alert('$message');</script>";
            }
            else { 
                $_SESSION['cart'][$key]['quantity']=$val; 
            } 
        } 
       
      
    } 
    if(isset($_POST['clear'])) { 
       unset($_SESSION['cart']);
    } 
  
?> 

<?php
  
 if(!empty($_SESSION['cart'])){

?>

<form method="post" action="index.php?page=products"> 
      
    <table> 
    
        <tr> 
            <th>Name</th> 
            <th>Quantity</th> 
            <th>Price</th> 
            <th>Items Price</th> 
        </tr> 
          
        <?php
            $link = mysqli_connect("aafkbj94ufrz3u.cs8olweospx2.us-east-1.rds.amazonaws.com", "uts", "internet", "groceries") or die(mysqli_connect_error());
            $query="SELECT * FROM products WHERE product_id IN ("; 
                      
            foreach($_SESSION['cart'] as $id => $value) { 
                $query.=$id.","; 
            } 
              
            $query=substr($query, 0, -1).") ORDER BY product_name ASC"; 
            
            $result=mysqli_query($link, $query); 
            
        
            
            
            $totalprice=0; 
            while($row=mysqli_fetch_array($result)){ 
                $subtotal=$_SESSION['cart'][$row['product_id']]['quantity']*$row['unit_price']; 
                $totalprice+=$subtotal; 
            ?> 
                <tr> 
                    <td><?php echo $row['product_name'] ?> (<?php echo $row['unit_quantity'] ?>)</td> 
                    <td><input type="text" name="unit_quantity[<?php echo $row['product_id'] ?>]" size="5" value="<?php echo $_SESSION['cart'][$row['product_id']]['quantity'] ?>" /></td> 
                    <td>$<?php echo $row['unit_price'] ?></td> 
                    <td>$<?php echo $_SESSION['cart'][$row['product_id']]['quantity']*$row['unit_price'] ?></td> 
                </tr> 
            <?php 
                  
            } 
        ?> 
        <tr> 
            <td colspan="4">Total Price: $<?php echo $totalprice ?></td> 
        </tr> 
    </table> 
    <br /> 
    <button type="submit" name="update">Update Cart</button> 
    <button type="submit" name="clear">Clear Cart</button> 
    
    
    
</form> 
<br /> 
<p>To remove an item set its quantity to 0. </p>

<br />
<!--Finish checkout functionality-->
<a href="checkout.php">
  <button>Checkout</button>
</a>


<?php
} else {
    echo"<p>Cart is empty</p>";
}
?>