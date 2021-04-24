<?php 
session_start();
  
    if(isset($_POST['purchase'])){ 
        
        $message;

        if (empty($_POST['name'])) {
            $message = "Please enter your name";
            echo "<script type='text/javascript'>alert('$message');</script>";
        } else if (empty($_POST['address'])) {
            $message = "Please enter your address";
            echo "<script type='text/javascript'>alert('$message');</script>";
        } else if (empty($_POST['suburb'])) {
            $message = "Please enter your suburb";
            echo "<script type='text/javascript'>alert('$message');</script>";
        } else if (empty($_POST['state'])) {
            $message = "Please enter your state";
            echo "<script type='text/javascript'>alert('$message');</script>";
        } else if (empty($_POST['country'])) {
            $message = "Please enter your country";
            echo "<script type='text/javascript'>alert('$message');</script>";
        } else if (empty($_POST['email'])) {
            $message = "Please enter your email";
            echo "<script type='text/javascript'>alert('$message');</script>";
        } else {
            $message = "Purchase Complete!";
            echo "<script type='text/javascript'>alert('$message');</script>";
            unset($_SESSION['cart']);
            unset($_SESSION['product']);
            header("Location: index.php");
        }
        
        
      
    } else if(isset($_POST['back'])){ 
        header("Location: index.php");
    }
    
  
?> 

<html>
     <link rel="stylesheet" href="css/style.css" /> 
    <head><title>Checkout</title>
    </head>
    <body>
        <center>
            <table>
                <form action="" method="post">
                    <h2>Checkout</h2>
                    
                    <tr>
                        <td>
                            <span style="color:red">*</span>Name
                        </td>
                        <td>
                            <input type="text" name="name" width="20"><br>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>
                            <span style="color:red">*</span>Address
                        </td>
                        <td>
                            <input type="text" name="address" width="20"><br>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>
                            <span style="color:red">*</span>Suburb
                        </td>
                        <td>
                            <input type="text" name="suburb" width="20"><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span style="color:red">*</span>State
                        </td>
                        <td>
                            <input type="text" name="state" width="20"><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span style="color:red">*</span>Country
                        </td>
                        <td>
                            <input type="text" name="country" width="20"><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span style="color:red">*</span>Email Address
                        </td>
                        <td>
                            <input type="email" name="email" width="20"><br>
                        </td>
                    </tr>
                        
                        
                    <tr>
                        
                        <td colspan="2" align="center">
                            <input type="submit" name="back" value="Back to cart">
                            <input type="submit" name="purchase" value="Complete Purchase">
                        </td>
                    </tr>
                    
                </form>
            </table>
        </center>
    </body>
</html>