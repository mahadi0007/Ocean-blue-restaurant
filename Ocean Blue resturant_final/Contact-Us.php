

<!DOCTYPE html>
<html>
 <head>
  <title>Contact Us</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <link rel="stylesheet" type="text/css" href="resources/css/header_nav.css">
     <link rel="stylesheet" type="text/css" href="resources/css/footer.css">
     
     
     
     
     <link rel="stylesheet" type="text/css" href="css/contact.css">
     
 </head>
    
    
    
    
 <body>
  
     <?php include 'head_nav.php'?>
     
     
     
     
     
     
     
     <!-------------------------------------------------- PHP LOGIC --------------------------------------->
     
     
     
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
$error1   = '';
$error2   = '';
$error3   = '';
$error4   = '';
$error5   = '';
$f_name    = $_SESSION['USER_fname'];
$l_name    = $_SESSION['USER_lname'];
$email   = $_SESSION['USER_email'];
$phone    = $_SESSION['USER_phone'];
$message = '';

function clean_text($string)
{
    $string = trim($string);
    $string = stripslashes($string);    //Removes backslahes
    $string = htmlspecialchars($string);  //keeps html <> tag
    return $string;
}

if (isset($_POST["submit"])) {
    
    
    if (empty($_POST["f_name"])) {
        $error1 .= '<p><label class="text-danger">Please Enter your First Name</label></p>';
    } else {
        $f_name = clean_text($_POST["f_name"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $f_name)) {
            $error1 .= '<p><label class="text-danger">Only letters and white space allowed</label></p>';
        }
    }
    
    
    if (empty($_POST["l_name"])) {
        $error2 .= '<p><label class="text-danger">Please Enter your Last Name</label></p>';
    } else {
        $l_name = clean_text($_POST["l_name"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $l_name)) {
            $error2 .= '<p><label class="text-danger">Only letters and white space allowed</label></p>';
        }
    }
    
    
    
    
    
    
    if (empty($_POST["email"])) {
        $error3 .= '<p><label class="text-danger">Please Enter your Email</label></p>';
    } else {
        $email = clean_text($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error3 .= '<p><label class="text-danger">Invalid email format</label></p>';
        }
    }
    
    
     if (empty($_POST["phone"])) {
        $error4 .= '<p><label class="text-danger">Please Enter your Last Name</label></p>';
    } else {
        $phone = clean_text($_POST["phone"]);
        if (preg_match("/^[0-9]$/", $phone)) {
            $error4 .= '<p><label class="text-danger">invalid phone number</label></p>';
        }
    }
    
    
    
    if (empty($_POST["message"])) {
        $error5 .= '<p><label class="text-danger">Message is required</label></p>';
    } else {
        $message = clean_text($_POST["message"]);
    }
    
    
    $name=$f_name.$l_name;
    
    
    if ($error1 == '' && $error2 == '' && $error3 == '' && $error4 == ''  && $error5 == '') {
       
        
        $sqlInsert = 'INSERT INTO message (Name, phone, email,
message) VALUES("'.$name.'","'.$phone.'","'.$email.'","'.$message.'")';

$resultInsert = mysqli_query($link, $sqlInsert) or die(mysql_error());
$lastInsertID = mysqli_insert_id($link);
        
        
        $error   = '<label class="text-success">Message Sent</label>';
        $f_name    = $_SESSION['USER_fname'];
        $l_name    = $_SESSION['USER_lname'];
        $email   = $_SESSION['USER_email'];
        $phone    = $_SESSION['USER_phone'];
        $message = '';
    }
}



mysqli_close($link);

?>
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
   
     
     
      <div class="container-fluid backI">
          
        
     
    <div class="row">
   
  
   <div class="col-md-4 reg_form" style="margin: auto; float:none;">
      
  

        <h2 align="center">Send us a message</h2>
       <br >
  

       
       
       <form action = ""  method="post">
    
     <?php
echo $error1;
?>

     <div class="form-group">
      <label>First Name</label>
      <input type="text" name="f_name" placeholder="Enter First Name" class="form-control" value="<?php
echo $f_name;
?>" />
     </div>
       
<?php
echo $error2;
?>
       
       
     <div class="form-group">
      <label>Last Name</label>
      <input type="text" name="l_name" placeholder="Enter Last Name" class="form-control" value="<?php
echo $l_name;
?>" />
     </div>
       
<?php
echo $error3;
?>      
       
       
     <div class="form-group">
      <label>Email</label>
      <input type="email" name="email" class="form-control" placeholder="Enter Email" value="<?php
echo $email;
?>" />
     </div>

<?php
echo $error4;
?>
       
    
            
     <div class="form-group">
      <label>Phone Number</label>
      <input type="text" name="phone" class="form-control" placeholder="Enter Phone Number" value="<?php
echo $phone;
?>" />
     </div>
       
       
<?php
echo $error5;
?>
       
       
       
     <div class="form-group">
      <label>Enter Message</label>
      <textarea name="message" class="form-control" placeholder="Enter Message"><?php
echo $message;
?></textarea>
     </div>
       
       
       
       
       
       
       
       
       
       
       
     <div class="form-group" align="center">
      <input type="submit" name="submit" class="btn btn-info" value="Send" />
         
        
         
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
  
     
     
     
     <?php include 'footer.php'?>
     
    
 </body>
</html>


