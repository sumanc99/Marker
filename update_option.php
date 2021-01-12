<?php

session_start();
//function page
include("config/function.php");
//use to logout if username and password are empty
include("config/page_logout.php");
$sms="";
//name of classes holder
// $options = ["user", "student"];
$change = 0;
$sms2;
$classes = ["Primary1", "Primary2", "Primary3", "Primary4", "Primary5", "Primary6"];
 if(isset($_POST['submit'])){

            $option = validating_input($_POST['option']);

        if(empty($option) ){
            $sms = "select option pls!";
        }
       elseif($option=='user'){
         header("location:update_option_action.php");
         $_SESSION['option'] = validating_input($_POST['option']);
       }
       elseif($option=='student'){
         $change = 1;
         $sms2 = "Select class to update student";
      }
}

if(isset($_POST['submit2'])){

    $classes = validating_input($_POST['classes']);

        if(empty($classes ) ){
        
            $sms2 = "Select class to update student";
            $sms = "select class pls!";
            $change = 1;
            $classes = ["Primary1", "Primary2", "Primary3", "Primary4", "Primary5", "Primary6"];
        }else{
            header("location:update_option_action.php");
            $_SESSION['option'] = validating_input($_POST['classes']);
        }
        
}


?>
<html lang="en">
<?php include("templates/header.php");?>
    
<section class="section">


<div class="container row">
 <h4 class="center"><?php echo $sms2 ?? "Select option to update";?></h4> 
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" class="col l6 offset-l3" method="POST">
    
    <div class="container">
        <?php if($change < 1):?>
         <select name="option" id="">
             <option value="">--Select option--</option>
             <option value="user">User</option>
             <option value="student">Student</option>
         </select>
         <div class="right">
         <input type="submit" name="submit" value="select" class="btn">  
         <a href="adminpanel.php" class="btn" style="margin-left:20px;">Back</a>
         </div>
        <?php else:?>
            <select name="classes" id="">
             <option value="">--Select class--</option>
             <?php for($i=0; $i<count($classes); $i++){?>
                <option value="<?php echo $classes[$i];?>"><?php echo $classes[$i];?></option>
              <?php }?>
         </select>
         <div class="right">
         <input type="submit" name="submit2" value="pick" class="btn"> 
        <a href="update_option.php" class="btn" style="margin-left:20px;">Back</a>
         </div>
         
        <?php endif;?>
            <p class="red-text"><?php echo $sms;?></p>  

    
    </div>

    </form>
    
 </div>

</section>

<?php include("templates/footer.php");?>
</html>