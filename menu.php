
<?php 
  
    if(isset($_GET['action']) && $_GET['action']=="prod"){ 
          
        $id=intval($_GET['id']); 
          
        $link = mysqli_connect("aafkbj94ufrz3u.cs8olweospx2.us-east-1.rds.amazonaws.com", "uts", "internet", "groceries") or die(mysqli_connect_error());
        $query="SELECT * FROM products WHERE product_id={$id}"; 
        $result=mysqli_query($link, $query); 
        if(mysqli_num_rows($result)!=0){ 
            $row_s=mysqli_fetch_array($result); 
              
            $_SESSION['product']=$id; 
        }else{ 
              
            $message="This product id it's invalid!"; 
              
        }  
    }
?> 

<?php 
    $frozen = array();
    $fresh = array();
    $beverage = array();
    $health = array();
    $pet = array();
    
    $link = mysqli_connect("aafkbj94ufrz3u.cs8olweospx2.us-east-1.rds.amazonaws.com", "uts", "internet", "groceries") or die(mysqli_connect_error());
    $query="SELECT * FROM products ORDER BY product_id ASC"; 
    $result=mysqli_query($link, $query); 
      
    while ($row=mysqli_fetch_array($result)) { 
        
        $first = substr($row['product_id'], 0, 1);
        if ($first == 1) {
            $frozen[$row['product_name']][$row['product_id']] = $row['unit_quantity'];
        } else if ($first == 2) {
            $health[$row['product_name']][$row['product_id']] = $row['unit_quantity'];
        } else if ($first == 3) {
            $fresh[$row['product_name']][$row['product_id']] = $row['unit_quantity'];
        } else if ($first == 4) {
            $beverage[$row['product_name']][$row['product_id']] = $row['unit_quantity'];
        } else if ($first == 5) {
            $pet[$row['product_name']][$row['product_id']] = $row['unit_quantity'];
        }
        
    ?> 
   
    <?php   
    } 
    
    
  
?> 



<link rel="stylesheet" href="css/style.css" /> 
<ul class="main-navigation">
    <li>
        <a href="#">Frozen Food</a>
        <ul>
            <?php
                foreach ($frozen as $name => $id) {
                    ?> <li> <?php
                    if (sizeof($id) > 1) {
                        ?><a><?php echo $name ?></a><?php
                        ?><ul><?php
                            foreach ($id as $key => $value) {
                                ?><li><a href="index.php?page=products&action=prod&id=<?php echo $key ?>"><?php echo $value ?></a></li><?php
                            }
                        ?></ul><?php
                    } else {
                        ?>
                        <a href="index.php?page=products&action=prod&id=<?php echo key($id) ?>"><?php echo $name ?></a>
                        <?php
                    }
                    ?> </li> <?php
                }
            ?>
        </ul>
    </li>
    <li>
        <a href="#">Fresh Food</a>
        <ul>
            <?php
                foreach ($fresh as $name => $id) {
                    ?> <li> <?php
                    if (sizeof($id) > 1) {
                        ?><a><?php echo $name ?></a><?php
                        ?><ul><?php
                            foreach ($id as $key => $value) {
                                ?><li><a href="index.php?page=products&action=prod&id=<?php echo $key ?>"><?php echo $value ?></a></li><?php
                            }
                        ?></ul><?php
                    } else {
                        ?>
                        <a href="index.php?page=products&action=prod&id=<?php echo key($id) ?>"><?php echo $name ?></a>
                        <?php
                    }
                    ?> </li> <?php
                }
            ?>
        </ul>
    </li>
    <li>
        <a href="#">Beverages</a>
        <ul>
            <?php
                foreach ($beverage as $name => $id) {
                    ?> <li> <?php
                    if (sizeof($id) > 1) {
                        ?><a><?php echo $name ?></a><?php
                        ?><ul><?php
                            foreach ($id as $key => $value) {
                                ?><li><a href="index.php?page=products&action=prod&id=<?php echo $key ?>"><?php echo $value ?></a></li><?php
                            }
                        ?></ul><?php
                    } else {
                        ?>
                        <a href="index.php?page=products&action=prod&id=<?php echo key($id) ?>"><?php echo $name ?></a>
                        <?php
                    }
                    ?> </li> <?php
                }
            ?>
        </ul>
    </li>
    <li>
        <a href="#">Home Health</a>
        <ul>
            <?php
                foreach ($health as $name => $id) {
                    ?> <li> <?php
                    if (sizeof($id) > 1) {
                        ?><a><?php echo $name ?></a><?php
                        ?><ul><?php
                            foreach ($id as $key => $value) {
                                ?><li><a href="index.php?page=products&action=prod&id=<?php echo $key ?>"><?php echo $value ?></a></li><?php
                            }
                        ?></ul><?php
                    } else {
                        ?>
                        <a href="index.php?page=products&action=prod&id=<?php echo key($id) ?>"><?php echo $name ?></a>
                        <?php
                    }
                    ?> </li> <?php
                }
            ?>
        </ul>
    </li>
    <li>
        <a href="#">Pet Food</a>
        <ul>
            <?php
                foreach ($pet as $name => $id) {
                    ?> <li> <?php
                    if (sizeof($id) > 1) {
                        ?><a><?php echo $name ?></a><?php
                        ?><ul><?php
                            foreach ($id as $key => $value) {
                                ?><li><a href="index.php?page=products&action=prod&id=<?php echo $key ?>"><?php echo $value ?></a></li><?php
                            }
                        ?></ul><?php
                    } else {
                        ?>
                        <a href="index.php?page=products&action=prod&id=<?php echo key($id) ?>"><?php echo $name ?></a>
                        <?php
                    }
                    ?> </li> <?php
                    
                }
            ?>
        </ul>
    </li>
</ul>
