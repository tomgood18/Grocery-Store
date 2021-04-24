<?php 
  
    if(isset($_GET['action']) && $_GET['action']=="add"){ 
          
        $id=intval($_GET['id']); 
          
        if(isset($_SESSION['cart'][$id])){ 
            if ($_SESSION['cart'][$id]['quantity'] <= 19){
                $_SESSION['cart'][$id]['quantity']++; 
            } else {
                $message = "Maximum for this product is 20";
                echo "<script type='text/javascript'>alert('$message');</script>";
            }
            
              
        }else{ 
            $link = mysqli_connect("aafkbj94ufrz3u.cs8olweospx2.us-east-1.rds.amazonaws.com", "uts", "internet", "groceries") or die(mysqli_connect_error());
            $query="SELECT * FROM products WHERE product_id={$id}"; 
            $result=mysqli_query($link, $query); 
            if(mysqli_num_rows($result)!=0){ 
                $row_s=mysqli_fetch_array($result); 
                  
                $_SESSION['cart'][$row_s['product_id']]=array( 
                        "quantity" => 1, 
                        "price" => $row_s['unit_price'] 
                    ); 
            }else{ 
                  
                $message="This product id it's invalid!"; 
                  
            } 
              
        } 
          
    } 
  
 if(!empty($_SESSION['product'])){


    $link = mysqli_connect("aafkbj94ufrz3u.cs8olweospx2.us-east-1.rds.amazonaws.com", "uts", "internet", "groceries") or die(mysqli_connect_error());
    
    $query="SELECT * FROM products WHERE product_id={$_SESSION['product']}";
    
    $result=mysqli_query($link, $query); 
    
    $row=mysqli_fetch_array($result)
    ?> 
    
    <br />

    <h2>Name: <?php echo $row['product_name'] ?></h3>
    <br />
    <h2>Price: $<?php echo $row['unit_price'] ?></h3>
    <br />
    <h2>Volume: <?php echo $row['unit_quantity'] ?></h3>
    <br />
    <h2>Stock: <?php echo $row['in_stock'] ?></h3>
    <br />


<br />
<td><a href="index.php?page=product&action=add&id=<?php echo $_SESSION['product'] ?>">Add to Cart</a></td> 

<?php
} else {
    echo"<p>Please select an item from the list</p>";
}
?>