<?php 
    session_start(); 
    require("includes/connection.php"); 
    if(isset($_GET['page'])){ 
          
        $pages=array("menu", "cart"); 
          
        if(in_array($_GET['page'], $pages)) { 
              
            $_page=$_GET['page']; 
              
        }else{ 
              
            $_page="menu"; 
              
        } 
          
    }else{ 
          
        $_page="menu"; 
          
    } 
    
  
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
      
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <link rel="stylesheet" href="css/reset.css" /> 
    <link rel="stylesheet" href="css/style.css" /> 
      
  
    <title>Shopping Cart</title> 
  
  
</head> 
    <body> 
        <?php require($_page.".php"); ?> 
        
        <div id="rightframe">
            <div id="product"> <!--Product Info-->
                <h1>Product Details</h1>
                <?php require("product.php");  ?>
            </div><!--End of Product Info-->
            
            <div id="cart"> <!--Cart-->
                <h1>Cart</h1> 
                <?php require("cart.php");  ?>
            </div><!--end of Cart--> 
        </div>

        
            
    </body> 
</html>
