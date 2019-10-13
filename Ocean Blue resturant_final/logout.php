
<?php
session_start();

?>

    <?php
   
    if($_SESSION['USERID']!='N'){
    //session_destroy();
        
       session_destroy();
        
        
         echo "<script>location.href='index.php'</script>";
}
    
   
     ?> 

    