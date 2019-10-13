

<!DOCTYPE html>
<html lang="en">

    <head>
    
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link href="https://fonts.googleapis.com/css?family=Lato:100,300,300i,400&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="vendors/css/ionicons.min.css">
        
        
        <title>Product page</title>
        
        
        <link rel="stylesheet" type="text/css" href="resources/css/header_nav.css">
        
        
        
        
        
        <link rel="stylesheet" type="text/css" href="resources/css/footer.css">
        
        <link rel="stylesheet" type="text/css" href="resources/css/special.css">
        
        <link rel="stylesheet" href="vendors/bootstrap/css/bootstrap.min.css">
        
        
    
    </head>
    

<body>
    
    <?php include 'head_nav.php'?>
    
    
    
    
    <?php 

$connect = mysqli_connect("localhost", "root", "", "ocean_blue_restaurant");

if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if(!in_array($_GET["id"], $item_array_id))
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'item_id'			=>	$_GET["id"],
				'item_name'			=>	$_POST["hidden_name"],
				'item_price'		=>	$_POST["hidden_price"],
				'item_quantity'		=>	$_POST["quantity"]
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
            
            
            ?>
    
    
             <script type="text/javascript">
                alert("Item Added")
                 </script
                 
  

    
    <?php 
            
            
            
		}
		else
		{
            
			echo '<script>alert("Item Already Added")</script>';
		}
	}
	else
	{
		$item_array = array(
			'item_id'			=>	$_GET["id"],
			'item_name'			=>	$_POST["hidden_name"],
			'item_price'		=>	$_POST["hidden_price"],
			'item_quantity'		=>	$_POST["quantity"]
		);
		$_SESSION["shopping_cart"][0] = $item_array;
        echo '<script>alert("Item Added")</script>';
	}
}



?>

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    <div class="container-fluid product_page">
        
        <div class="row justify-content-center product_1_text">
            <p>GET YOUR SPECIAL FOOD ITEMS</p>
        </div>
        
        <div class="row justify-content-center product_2_text">
            <p>Exclusively For You</p>
        </div>
    
    
    </div>
    
    
    
    
    
    <div class="card-segment">
        <div class="container-fluid">
            <div class="row">
        
     
			<?php
				$query = "SELECT * FROM specialfood ORDER BY food_id ASC";
				$result = mysqli_query($connect, $query);
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
				?>
        
        
    
    
       <div class="col-md-4">
                    <div class="card">
                         <div class="row justify-content-center">
                        
                        <div class="card-body">
                            
                            
                            
                          <form method="post" action="special.php?action=add&id=<?php echo $row["food_id"]; ?>">
                            
                            <img src="img/<?php echo $row["food_image"]; ?>"  class="img-responsive" style=" align-content: center; " height="auto" width="100%" /><br />

						<h4 class="text-info text-center" style="margin-top: 20px;"><?php echo $row["food_title"]; ?></h4>

						<h4 class="text-danger text-center">BDT <?php echo $row["price"]; ?></h4>
                               <div class="row justify-content-center">
						<input type="text" name="quantity" class="text-center" value="1" class="form-control" /> <br>
                                   
                                </div>  
						<input type="hidden" name="hidden_name" class="text-center" value="<?php echo $row["food_title"]; ?>" />
                            
                              
                             
						<input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />
                           
                            
                              
                              <div class="row justify-content-center">
                              
						<input type="submit" name="add_to_cart"  style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />

                            
                           </div> 
                            
                            </form>
                        </div>
                    </div>
                         </div>
                </div>
        <?php
					}
				}
			?>
                
            
            
            
            
    </div>
        </div>
    </div>

            
            
           

		
		
    
    
            
    
    
    
    
    
   
   
    
    <?php include 'footer.php'?>
        
		  
          
  
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    
    <script src="vendors/bootstrap/js/bootstrap.min.js">
    </script>
    <script src="vendors/bootstrap/js/jquery.min.js"></script>
    <script src="vendors/bootstrap/js/popper.min.js"></script>
</body>

</html>