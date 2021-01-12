<?php
session_start();
//db connection
include("config/db_connect.php");
//function page
include("config/function.php");
//use to logout if username and password are empty
include("config/page_logout.php");

//it hold what the function return which is list of staffs
$staffs=staffs();

$_SESSION['class']=$sms="";
$change = 0;
//class holders
$classes = ["Primary1", "Primary2", "Primary3", "Primary4", "Primary5", "Primary6"];
$class_suffix = ['A', 'B', 'C', 'D', 'E'];

if(isset($_POST['submit'])){

    $_SESSION['class_pick'] = validating_input($_POST['classpicker']);

        if(empty($_SESSION['class_pick']) ){
            $sms = "pick a class  pls!";
        }else{ $change = 1; $sms2 = "Select subclass to update student"; }

}
if(isset($_POST['submit2'])){

    $_SESSION['class'] = validating_input($_POST['class']);

    if(empty($_SESSION['class']) ){
        $sms = "pick a subclass  pls!";
        $change = 1;
        $sms2 = "Select subclass to see student list"; 
    }else{
        header("location:students_list_view.php");
    }

}




?>
<html lang="en">
<?php include("templates/header.php");?>

<div class="row">

 
  
  
  <div class="container ">
      <div class="col l10 offset-l1">

        <div class="section">
         <h4 class="center"><?php echo $sms2 ?? "Select Class to see student list";?></h4>
                <form action="<?php echo $_SERVER['PHP_SELF'];?>"  method="POST">
            
            <div class="container" style="width:50%;">

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
                        <option value="">--Select Class--</option>
                        <?php for($i=0; $i<count($class_suffix); $i++){?>
                            <option value="<?php echo  $_SESSION['class_pick'].$class_suffix[$i];?>"><?php echo  $_SESSION['class_pick'].$class_suffix[$i];?></optio>
                        <?php }?>
                        </select>
                        <p class="red-text"><?php echo $sms;?></p>  
              <div class="right">
              <input type="submit" name="submit2" value="All Student List" class="btn"> 
                <a href="students.php" class="btn" style="margin-left:20px;">Back</a>
              </div>
               
            <?php endif;?>
            </div>

            </form>
<h5 style="content=''; display:block; clear:both; padding:5px;"> </h5>
         <ul class="collection with-header">
             <li class="collection-header center"><h5>Class Lists and number of students</h5></li>
             <?php  foreach($classes as $class){?>
              <?php 
                echo "
                <b class=><li class=collection-item><h6 class=center>
                $class Number of Students: ".num_class_stud($class)."</b></h6></li>" ;
                
                ?>
             <?php }?>
         </ul>
        </div>
      </div>
  </div>
  
</div>


<?php include("templates/footer.php");?>
</html>