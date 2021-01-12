<?php
session_start();
//function page
include("config/function.php");
//use to logout if username and password are empty
include("config/page_logout.php");

$_SESSION['class']=$sms="";
//name of classes holder
$classes = ["Primary1", "Primary2", "Primary3", "Primary4", "Primary5", "Primary6"];
 if(isset($_POST['submit'])){

       $_SESSION['class'] = validating_input($_POST['class']);

        if(empty( $_SESSION['class'] ) ){
            $sms = "pick a class!";
        }else{
          header("location:search_stud.php");
        }
}

?>
<html lang="en">
<?php include("templates/header.php");?>

<section class="section">


<div class="container row">
 <h4 class="center"><?php echo $sub_class_info ?? "Pick Class to search student";?></h4> 
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" class="col l6 offset-l3" method="POST">
    
    <div class="container"> 
      
         <select name="class" id="">
         <option value="">--Select Class--</option>
         <?php for($i=0; $i<count($classes); $i++){?>
          <option value="<?php echo $classes[$i];?>"><?php echo $classes[$i];?></option>
         <?php }?>
         </select>
            <p class="red-text"><?php echo $sms;?></p>  
   <div class="right">
   <input type="submit" name="submit" value="pick" class="btn">
 <a href="userpanel.php" class="btn" style="margin-left:20px;">Back</a>
       
     

   </div>
   
   
    </div>

    </form>
    
 </div>

</section>

<?php include("templates/footer.php");?>
</html>