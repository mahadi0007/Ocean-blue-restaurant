
<?php
session_start();
if(!isset($_SESSION['USERID'])){
    $_SESSION['USERID']='N';
}
?>



<!DOCTYPE html>
<html lang="en">

    <head>
    
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link href="https://fonts.googleapis.com/css?family=Lato:100,300,300i,400&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="vendors/css/ionicons.min.css">
        
        
        <title>header_nav</title>
        <link rel="stylesheet" type="text/css" href="resources/css/header_nav.css">
        
        <link rel="stylesheet" href="vendors/bootstrap/css/bootstrap.min.css">
        
        
        <link rel="shortcut icon" href="img/logo.png">
        
        
    
    </head>
    

<body>
    
    <nav class="navbar navbar-expand-lg  my-nav fixed-top navbar-dark head_nav">
     
        
	  <a class="navbar-brand" style="margin-top:-1px;" href="index.php"><img src="img/logo.png" alt="Smiley face" height="60" width="60"></a>
	  
        
       
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        
	  <div class="collapse navbar-collapse navbar-light" id="navbarSupportedContent">
		<ul class="navbar-nav ml-auto">
		  <li class="nav-item active">
			<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
		  </li>
		  
		  <li class="nav-item order_now">
			<a class="nav-link" href="food.php">Food Menu
			</a>
		  </li>
            
            <li class="nav-item">
			<a class="nav-link" href="special.php"  onclick="make(event)">Special Menu
			</a>
		  </li>
            
            
		  <li class="nav-item">
			<a class="nav-link" href="cart.php">View Cart
			</a>
		  </li>
		  
		  <li class="nav-item">
			<a class="nav-link" href="Contact-Us.php"  onclick="make(event)">Contact Us</a>
		  </li>
            <li class="nav-item">
			<a class="nav-link " href="about_us.php">About us</a>
         </li>
         <li class="nav-item">
			<a class="nav-link " href="profile.php"  onclick="make(event)">Profile</a>
         </li>
            
		   
             
            
		  <li class="nav-item">
              <?php
              if($_SESSION['USERID']!='N'){ 
              ?> 
             <a class="nav-link " href="logout.php">Logout</a>
              
              <?php
              }else
              {
              ?> 
                     
                    <a class="nav-link " href="login.php">Login</a>
               <?php
              }
              
              ?> 
              
                  

              
              
           

              
              
			
		  </li>
		</ul>
	  </div>
	</nav>
    
    
    

<script type="text/javascript">
    
function make(e){
  
    
 <?php   
 if($_SESSION['USERID']=='N'){
   ?>    
     
  alert("Please login first!");
 
   
    e.preventDefault();
     <?php  
 }
  
 ?>    

    // return true or false, depending on whether you want to allow 
    // the`href` property to follow through or not
 }
</script>
    
    

    
    
    
    
    
<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    
    <script src="vendors/bootstrap/js/bootstrap.min.js">
    </script>
    <script src="vendors/bootstrap/js/jquery.min.js"></script>
    <script src="vendors/bootstrap/js/popper.min.js"></script>
</body>

</html>




