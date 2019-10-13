
 

<!DOCTYPE html>
<html>
 <head>
  <title>profile</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     
     
     
     <link rel="stylesheet" type="text/css" href="resources/css/footer.css">
     
     <link rel="stylesheet" type="text/css" href="css/profile.css">
     
     <link rel="stylesheet" type="text/css" href="resources/css/header_nav.css">
     
 </head>
    
  
    
    
 <body>
     
     <?php include 'head_nav.php'?> 
     
     
  
     
 <!-- ------------------------------------------------------------- Php starts from here ------------------------------------------------->    
     
     
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
$address = $_SESSION['USER_address'];
$password ='';

$userID=  $_SESSION['USERID'];

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
    
    $password = clean_text(MD5($_POST["password"]));
    
    
     if (empty($_POST["phone"])) {
        $error4 .= '<p><label class="text-danger">Please Enter your Phone Number</label></p>';
    } else {
        $phone = clean_text($_POST["phone"]);
        if (preg_match("/^[0-9]$/", $phone)) {
            $error4 .= '<p><label class="text-danger">invalid phone number</label></p>';
        }
    }
    
    
    
    if (empty($_POST["address"])) {
        $error5 .= '<p><label class="text-danger">Address is required</label></p>';
    } else {
        $address = clean_text($_POST["address"]);
    }
    
    
    if ($error1 == '' && $error2 == '' && $error3 == '' && $error4 == ''  && $error5 == '') {
        
      /*  
        $sqlInsert = 'INSERT INTO user (first_name, last_name, email,
user_password, phone, address) VALUES("'.$f_name.'","'.$l_name.'","'.$email.'","'.$password.'","'.$phone.'","'.$address.'")';*/
        
        
       $sqlInsert= 'UPDATE user set first_name ="'.$f_name.'" , last_name="'.$l_name.'" , email="'.$email.'" , user_password="'.$password.'" , phone="'.$phone.'" , address="'.$address.'" where user_id="'.$userID.'" ';

$resultInsert = mysqli_query($link, $sqlInsert) or die(mysql_error());
$lastInsertID = mysqli_insert_id($link);
       

        
         $_SESSION['USER_fname']=$f_name;
        $_SESSION['USER_lname']=$l_name;
        $_SESSION['USER_email']=$email;
        $_SESSION['USER_phone']=$phone;
        $_SESSION['USER_address']=$address;
        
        
$error   = 'Updated Successfully!';
        

     

        
    }
}











mysqli_close($link);

?>


     
     
     
     
     
     
     
     
      <!-- ------------------------------------------------------------- Php ends from here ------------------------------------------------->    
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
      
     
  
  <div class="container_f bg">
     
      <br >
       <br >
      
    <div class="row">
   
  
   <div class="col-md-8 reg_form" style="margin: auto; float:none;">
       
       <div class="col-md-4">
           
            <img class="card-img-top text-center" src="img/avatar.png" alt="Card image cap">
           <br>
           <br>
           
            <div class="card-body">
                         <label><?php echo 'Name: '.$_SESSION['USER_fname'].' '.$_SESSION['USER_lname']; ?></label> <br>
                         <label><?php echo 'User ID: '.$_SESSION['USERID'];?></label><br>
                         <label><?php echo 'Email: '.$_SESSION['USER_email'];?></label>
                         <label><?php echo 'Phone: '.$_SESSION['USER_phone'];?></label>
                <br>
                         <label><?php echo 'Address: '.$_SESSION['USER_address'];?></label>
                
                    </div>
          
           
           
      
       </div>
     
     <div class="col-md-9 .edit_profile" style="margin: auto;  padding-left: 250px; float:none;">
         
           <h3 align="center">Update your profile</h3>
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


   
       
  <div class="form-group">
      <label>Password</label>
      <input type="password" name="password" class="form-control" placeholder="Enter Password" value="<?php
echo $password;
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
      <label>Address</label>
      <textarea name="address" class="form-control" placeholder="Enter Address"><?php
echo $address;
?></textarea>
     </div>
       
       
       
     <div class="form-group" align="center">
      <input type="submit" name="submit" class="btn btn-info" value="Update" />
         
        
         
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
  </div>

     <?php include 'footer.php'?>
 </body>
</html>
 
