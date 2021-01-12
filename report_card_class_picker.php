<?php

session_start();
//function page
include("config/function.php");
//use to logout if username and password are empty
include("config/page_logout.php");
$sms='';
$change = 0;
//class holders
$classes = ["Primary1", "Primary2", "Primary3", "Primary4", "Primary5", "Primary6"];
$class_suffix = ['A', 'B', 'C', 'D', 'E'];

if(isset($_POST['submit'])){

    $_SESSION['class_pick'] = validating_input($_POST['classpicker']);

        if(empty($_SESSION['class_pick']) ){
            $sms = "pick a class  pls!";
        }else{ $change = 1; $sms2 = "Select subclass to view result_sheet"; }

}

if(isset($_POST['submit2'])){

    $_SESSION['class'] = validating_input($_POST['class']);

    if(empty($_SESSION['class']) ){
        $sms = "pick a subclass  pls!";
        $change = 1;
        $sms2 = "Select subclass to view reportcard"; 
    }else{
        header("location:reportcard_all.php");
    }

}


if(isset($_POST['submit3'])){


    $_SESSION['class'] = validating_input($_POST['class']);

    if(empty($_SESSION['class']) ){
        $sms = "pick a subclass  pls!";
        $change = 1;
        $sms2 = "Select subclass to view reportcard"; 
    }else{
        header("location:reportcard_single.php");
    }
    
}


?>
<html lang="en">
<?php include("templates/header.php");?>


<section class="section">


<div class="container row">
 <h4 class="center"><?php echo $sms2 ??"Pick Class to print student reportcard";?></h4> 
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" class="col l7 offset-l3" method="POST">
    
    <div class="container">
    <?php if($change < 1):?>
                    <select name="classpicker">
                        <option value="">--Select Class--</option>
                        <?php for($i=0; $i<count($classes); $i++){?>
                            <option value="<?php echo $classes[$i];?>"><?php echo $classes[$i];?></optio>
                        <?php }?>
                        </select>
                        <p class="red-text"><?php echo $sms;?></p>  
                <div class="right">
                <input type="submit" name="submit" value="pick" class="btn"> 
                <a href="adminpanel.php" class="btn" style="margin-left:20px;">Back</a>
                </div>
        <?php else:?>
                <select name="class">
                        <option value="">--Select subClass--</option>
                        <?php for($i=0; $i<count($class_suffix); $i++){?>
                            <option value="<?php echo  $_SESSION['class_pick'].$class_suffix[$i];?>"><?php echo  $_SESSION['class_pick'].$class_suffix[$i];?></optio>
                        <?php }?>
                        </select>
                        <p class="red-text"><?php echo $sms;?></p>  
                        
                <div class="right">
                <input type="submit" name="submit2" value="All Student" class="btn"> 
                <input type="submit" name="submit3" value="single student" class="btn">
                <a href="report_card_class_picker.php" class="btn" style="margin-left:20px;">Back</a>
              
                </div>  
               
               
        <?php endif;?>
    </div>

    </form>
    
 </div>

</section>


<?php include("templates/footer.php");?>
</html>