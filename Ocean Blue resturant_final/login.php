<?php
$host= 'localhost';
$user='root';
$password= '';
$db = 'ocean_blue_restaurant';

$link = mysqli_connect($host,$user,$password,$db);


//index.php



// BLANK VALUES
$allnull = '<p><label class="text-danger">Please Fillup the Form</label></p>';
$error   = '';
$error3   = '';
$email   = '';
$password ='';

function clean_text($string)
{
    $string = trim($string);
    $string = stripslashes($string);    //Removes backslahes
    $string = htmlspecialchars($string);  //keeps html <> tag
    return $string;
}

if (isset($_POST["submit"])) {
   
    
    if (empty($_POST["email"])) {
        $error3 .= '<p><label class="text-danger">Please Enter your Email</label></p>';
    } else {
        $email = clean_text($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error3 .= '<p><label class="text-danger">Invalid email format</label></p>';
        }
    }
    
   // $password = $_POST["password"];
    $password = clean_text(MD5($_POST["password"]));
    

    
    
    
    if ($error3 == '') {
        

        
        
         
        $sqlInsert = 'SELECT * FROM USER WHERE email ="'.$email.'" AND user_password="'.$password.'"';

$resultInsert = mysqli_query($link, $sqlInsert) or die(mysql_error());
$lastInsertID = mysqli_insert_id($link);
       
        
        
        
        
         $row = mysqli_fetch_array($resultInsert);
        
        if($row['email']==$email)
        {
            $error   = 'success';
            
            session_start();
        
        $_SESSION['USERID']=$row['user_id'];
        $_SESSION['USER_fname']=$row['first_name'];
        $_SESSION['USER_lname']=$row['last_name'];
        $_SESSION['USER_email']=$row['email'];
        $_SESSION['USER_phone']=$row['phone'];
        $_SESSION['USER_address']=$row['address'];
            
            
            
         echo "<script>location.href='index.php'</script>";
            
            
            
        }
        else
        {
            $error   = 'invalid username or password';
            
           
            
            
            
        }
        
        
        
        
        
        
        
        
        
        

        
            
        
       

        
$email   = '';
$password ='';


        
    }
}











mysqli_close($link);

?>














<!DOCTYPE html>
<html>
 <head>
  <title>login</title>
  <link rel="stylesheet" href="vendors/bootstrap/css/bootstrap.min.css">
     
     <link rel="stylesheet" type="text/css" href="resources/css/footer.css">
     
     <link rel="stylesheet" type="text/css" href="css/login.css">
     
     <link rel="stylesheet" type="text/css" href="resources/css/header_nav.css">
     
     
 </head>
    
    
    
   
 <body>
     
     <?php include 'head_nav.php'?> 
     
  
  <div class="container-fluid backI">
      <br >
       <br >
      
    <div class="row justify-content-center">
   
  
   <div class="col-md-4 reg_form">
       <p class="text-center form_head">Sign in to your account</p>
       <br >
  
   <form action = ""  method="post">
    

       

       
<?php
echo $error3;
?>      
       
       
     <div class="form-group">
      <label>Email</label>
      <input type="email" name="email" class="form-control" placeholder="Enter Email" value="<?php
echo $email;
?>" />
     </div>


   
       
  <div class="form-group">
      <label>Password</label>
      <input type="password" name="password" class="form-control" placeholder="Enter Password" value="<?php
echo $password;
?>" />
     </div>
       

       
       
       
     <div class="form-group" align="center">
      <input type="submit" name="submit" class="btn btn-info" value="Sign in" />
         
        
         
     </div>
       
       
       
			<a class="nav-link text-center" href="registration.php">I don't have any account</a>
        
       
       
    <div class="form-group" align="center">
        
         <?php
            echo $error;
         ?>
         
     </div>
       
       
       
    </form>

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

