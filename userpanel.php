<?php
session_start();
//connecting db 
include("config/db_connect.php");
//functionpage connection
include("config/function.php");
//use to logout if username and password are empty
include("config/page_logout.php");
// //the check if not user then logout
// check_if_not_user_then_out($_SESSION['username']);
//function use to give fullname of a user
$fullname = fullname($_SESSION['username']);
//func use to give firstletter of firstname & lastname
$shortname = namelogo($_SESSION['username']);

//logout func
if(isset($_POST['logout'])){
    logout($_POST['logout']);
}

$_SESSION['class']=$sms="";
//name of classes holder
$classes = ["Primary1", "Primary2", "Primary3", "Primary4", "Primary5", "Primary6"];

 if(isset($_POST['submit'])){

            $_SESSION['class'] = validating_input($_POST['classpicker']);

        if(empty($_SESSION['class']) ){
            $sms = "pick a class to start marking";
        }else{
            for($i=0; $i<count($classes); $i++){

                if($classes[$i]==$_SESSION['class']){
                    header("location:subjectpicker.php");
                   
              
                }else{
                    $sms="Invalid Class";
                }
            }
            
        }
}

if(isset($_POST['submit2'])){

  $result = continue_marking($_SESSION['username']);
   
    if(mysqli_num_rows($result) > 0){
        $subject = mysqli_fetch_assoc($result);
       $_SESSION['subject'] = $subject['subject'];
       $_SESSION['class_letter'] = $subject['class'];
       header("location:markingpage.php");
    }else{
      $sms = "You have no subject to continue marking";
    }
    
    


}
?>
<html lang="en">

<?php include("templates/header.php");?>

    <div class="logocontainer center">

        <div class="row">
           <div class="col l12">
           <div class="btn-floating btn-large indigo darken-4 z-depth-0  logoUser">
              <?php echo $shortname;?>
            </div>
            <h5 class="fullname"><?php echo $fullname?></h5>

           <p>
            <a href="#" class="btn btn-large userOption z-depth-2">Update username</a>
            <a href="userpanel_search_class_picker.php" class="btn btn-large userOption z-depth-2">Search Student</a>
            <a href="#" class="btn btn-large userOption z-depth-2">Remark Student</a>
               <a href="mark_details.php" class="btn btn-large userOption z-depth-2">Marking Details</a>
           </p>
           </div>
        </div>
</div>
   
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">

      <div class="row">

      <div class="input-field col l8 offset-l4">

           <h5 class="selectClass">Select Class To Mark</h5>

           <div style="width:400px">

           <input list="class"  name="classpicker" placeholder="Select  Class" value="<?php echo $_SESSION['class'];?>"/>
          <datalist id="class">
              <?php for($i=0; $i<count($classes); $i++){?>
                <option value="<?php echo $classes[$i];?>">
              <?php }?>
              </datalist>
            <p class="red-text"><?php echo $sms;?></p> 

            <div class="right">
            <input type="submit" name="submit" value="Start" class="btn green darken-1">
            <!-- <input type="submit" name="submit2" value="create" class="btn green darken-1"> -->
             <input type="submit" name="submit2" value="continue marking" class="btn green darken-1" style="margin-left:20px;">
            <button name="logout" class="btn  red darken-1 z-depth-0" style="margin-left:20px;">Logout</button> 
            </div>

           </div> 
           
           
         </div>
         
      </div>
 
          
     </form>

 </div>

</div>
<?php include("templates/footer.php");?>

</html>


