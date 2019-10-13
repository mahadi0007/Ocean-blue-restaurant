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
            
            
            
         echo "<script>location.href='profile.php'</script>";
            
            echo $_SESSION['USERID'];
            
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     <link rel="stylesheet" type="text/css" href="css/login.css">
 </head>
    
    
    
    
 <body>
     
     
     
  
  <div class="container_f bg">
      <br >
       <br >
      
    <div class="row">
   
  
   <div class="col-md-4 reg_form" style="margin: auto; float:none;">
       <h2 align="center">Sign in to your account</h2>
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
       
       
    <div class="form-group" align="center">
        
         <?php
            echo $error;
         ?>
         
     </div>
       
       
       
    </form>

   </div>
        

      </div>
  </div>
 </body>
</html>