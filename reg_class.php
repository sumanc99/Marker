<?php
session_start();
//function page
include("config/function.php");
//use to logout if username and password are empty
include("config/page_logout.php");

$_SESSION['class']=$sms="";
//name of classes holder
$classes = ["Primary1", "Primary2", "Primary3", "Primary4", "Primary5", "Primary6"];
$class_suffix = ['A', 'B', 'C', 'D', 'E'];
$change = 1;
 if(isset($_POST['submit'])){

       $_SESSION['class_hold'] = validating_input($_POST['class']);

        if(empty($_SESSION['class_hold']) ){
            $sms = "pick a class!";
            $change = 1;
        }else{$change = 0;  $sub_class_info = "Pick subclass to start registering student";}
}
if(isset($_POST['submit2'])){

    $_SESSION['class'] = validating_input($_POST['sub_class']);

     if(empty($_SESSION['class']) ){
        $change = 0;
        $sub_class_info = "Pick subclass to start registering student";
        $sms = "pick a subclass to start registering";
        
     }else{
       header("location:reg_student.php");
     }
}

?>
<html lang="en">
<?php include("templates/header.php");?>

<section class="section">


<div class="container row">
 <h4 class="center"><?php echo $sub_class_info ?? "Pick Class to register student";?></h4> 
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" class="col l6 offset-l3" method="POST">
    
    <div class="container"> 
       <?php if($change > 0):?>
         <select name="class" id="">
         <option value="">--Select Class--</option>
         <?php for($i=0; $i<count($classes); $i++){?>
          <option value="<?php echo $classes[$i];?>"><?php echo $classes[$i];?></option>
         <?php }?>
         </select>
            <p class="red-text"><?php echo $sms;?></p>  
    <div class="right">
    <input type="submit" name="submit" value="pick" class="btn"> 
    <a href="adminpanel.php" class="btn" style="margin-left:20px;">Back</a>
    </div>
    

    <?php else:?>
         <select  name="sub_class">
          <option value=''>--Select subclass--</option>
          <?php for($i=0; $i<count($class_suffix); $i++){?>

          <option value="<?php echo $_SESSION['class_hold'].$class_suffix[$i];?>"><?php echo $_SESSION['class_hold'].$class_suffix[$i];?></option>

         <?php }?>

         </select>
         <p class="red-text"><?php echo $sms;?></p>  
         <div class="right">
         <input type="submit" name="submit2" value="start" class="btn">
        <a href="reg_class.php" class="btn" style="margin-left:20px;">Back</a>
        </div>

        
    <?php endif;?>
    </div>

    </form>
    
 </div>

</section>

 

<?php include("templates/footer.php");?>
</html>