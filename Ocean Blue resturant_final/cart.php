
<!DOCTYPE html>
<html>
	<head>
		<title>Cart</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        
         
        <link rel="stylesheet" type="text/css" href="resources/css/header_nav.css">
        
        
        
        <link rel="stylesheet" type="text/css" href="css/cart.css">
        
        <link rel="stylesheet" type="text/css" href="resources/css/footer.css">
	</head>
    
    
    
    
    
	<body>
        
        
           <?php include 'head_nav.php'?>
        
        
        
        
        <?php 

$connect = mysqli_connect("localhost", "root", "", "ocean_blue_restaurant");



if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["item_id"] == $_GET["id"])
			{
				unset($_SESSION["shopping_cart"][$keys]);
                
                
                ?>

				<script>alert("Item Removed")</script>
                    
                  <?php 
                
                
				echo '<script>window.location="cart.php"</script>';
			}
		}
	}
}
        
    
        
        
        
        
        // ---------------------------------------- Database Insert-----------------------------------
        
        
        
        
        
      
        $user_id =  $_SESSION['USERID'];
       
        
        if (isset($_POST["submit"])) {
            
            
        if($_SESSION['USERID']!='N'){
        
        if(!empty($_SESSION["shopping_cart"]))
					{
						$total = 0;
						foreach($_SESSION["shopping_cart"] as $keys => $values)
						{
					
					       $item_name = $values["item_name"];
                           $item_quantity= $values["item_quantity"];
                           $item_price = $values["item_price"];
                           $total_price = number_format($values["item_quantity"] * $values["item_price"], 2);
                               
                            
                            
                            
                            $sqlInsert = 'INSERT INTO orderlist (user_id, item_name,
                             quantity, price, total_price) VALUES("'.$user_id.'","'.$item_name.'","'.$item_quantity.'","'.$item_price.'","'.$total_price.'")';
                            
						      
                            $resultInsert = mysqli_query($connect, $sqlInsert) or die(mysql_error());
                            $lastInsertID = mysqli_insert_id($connect);
						
						
						
                        
                        
						
					
        
        
					
					
					}
        
        
        
        
        
     
        
    


        
    
}
            ?>

				<script>alert("Your Order Has Been Submitted")</script>
                    
                  <?php 
            
            
        }
        else
        {
           ?>

				<script>alert("You have to login first!")</script>
                    
                  <?php 
               
        }
        
        
        
        }
        

        
        
        
        
        
        
       
        
        
        

?>

        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
   
        
		<br />
        
		<div class="container-fluid table_container" >
			
			
			<div style="clear:both"></div>
			<br />
            
            
            
            
            
            
            
            
			<h3 class="text-center">Order Details</h3>
            <br />
            <br />
            
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr>
						<th width="40%">Item Name</th>
						<th width="10%">Quantity</th>
						<th width="20%">Price</th>
						<th width="15%">Total</th>
						<th width="5%">Action</th>
					</tr>
					<?php
					if(!empty($_SESSION["shopping_cart"]))
					{
						$total = 0;
						foreach($_SESSION["shopping_cart"] as $keys => $values)
						{
					?>
					<tr>
						<td><?php echo $values["item_name"]; ?></td>
						<td><?php echo $values["item_quantity"]; ?></td>
						<td>BDT <?php echo $values["item_price"]; ?></td>
						<td>BDT <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
                        
                        
						<td><a href="cart.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
					</tr>
					<?php
							$total = $total + ($values["item_quantity"] * $values["item_price"]);
						}
					?>
					<tr>
						<td colspan="3" align="right">Total</td>
						<td align="right">BDT <?php echo number_format($total, 2); ?></td>
						<td></td>
					</tr>
					<?php
					}
					?>
						
				</table>
			</div>
		
	</div>
	<br />
        
         <form action = ""  method="post">
        
          <div class="form-group" align="center">
      <input type="submit" name="submit" class="btn btn-info" value="Check out" />
         
        
         
     </div>
    
        </form>
        
            
    <?php include 'footer.php'?>
        
	</body>
</html>

<?php




?>