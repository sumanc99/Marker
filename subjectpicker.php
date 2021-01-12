<?php session_start();
if(empty($_SESSION["class"]) ){
        header("location:userpanel.php");
    }
//db connection
include("config/db_connect.php");
//use to logout if username and password are empty
include("config/page_logout.php");
//function page
include("config/function.php");
//empty sms && subject
$sms="";
$class_suffix = ['A', 'B', 'C', 'D', 'E'];

 if(isset($_POST['submit'])){

    //fun that tell if user status is making
    $user_status = user_status_on_making($_SESSION['username']);

        $_SESSION['subject'] = validating_input($_POST['subjectpicker']);

        $_SESSION['class_letter'] = validating_input($_POST['class_suffix']);

         //the function will check if the subject exist in the class or not
         $subject_exist = subject_exist($_SESSION['class_letter'],$_SESSION['subject']);

         
            if(empty($_SESSION['subject']) OR empty($_SESSION['class_letter'])){
                $sms = "pick a class and subject to start marking";
            }else{
                if($subject_exist < 1){
                    $sms = "the subject you enter does not exist in ".$_SESSION['class'];
                }else{
                //query to check for subject if is available
                 $sql = "SELECT * FROM users WHERE class = '{$_SESSION['class_letter']}' AND subject = '{$_SESSION['subject']}' ";
                 $sql_query = mysqli_query($conn, $sql);
                
                 if(mysqli_num_rows($sql_query)>0){
                
                     if($user_status > 0){
                
                             $subject_making = user_subject_making($_SESSION['username'], $_SESSION['subject']);
                
                             if($subject_making > 0){
                                 header("location:markingpage.php");
                             }else{
                                 $sms = "Subject is in use ";
                             }
                     }else{
                         $sms = "Subject is in use ";
                     }
                
                 }else{
                    
                        if($user_status > 0){
                           $sms = "you have subject in action";
                         }else{
                
                           //fun that give a user subject to make the subject in use to him
                           $subjectpicked = subjectpicked($_SESSION['class_letter'], $_SESSION['subject'], $_SESSION['username']);
                
                             if($subjectpicked){
                                 header("location:markingpage.php");
                             }else{
                                 $sms = "fail";
                             }
                         }
                
                 }
                    
             }//end of else the subject exist in the class
    
    
  }//end of else if the field is not empty
       
}//end of if(isset)

// if($_SESSION["class"]=="primary1"){
//     echo "them dkndfkb" ;
// }
 
?>
<html lang="en">
<?php include("templates/header.php");?>

  

    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
      <div class="section">

        <div class="row">

            <div class="col l12  b">
                    <!-- <h1>welcome</h1> -->
                  
                    <h5>
                        <?php echo"Your In"." ".$_SESSION["class"];?>
                    </h5>
                    
                    <h6>
                       <a href="userpanel.php" class="btn yellow darken-4 white-text z-depth-0">Change Class</a>
                    </h6>
                   
            </div>
                   
        </div>
     </div>
        <div class="row">
                <div class="col l8 offset-l4">

                    <h5 class="selectClass">Select class and Subject To Mark</h5>

                    <div style="width:400px">

                        
                            <select name="class_suffix" id="">
                            <option value="">--select subclass--</option>
                            <?php for($i=0; $i<count($class_suffix); $i++){?>
                        <option value="<?php echo $_SESSION['class'].$class_suffix[$i];?>"><?php echo $_SESSION['class'].$class_suffix[$i];?></option>
                            <?php }?>
                            </select>
                            
                            <select name="subjectpicker" id="">
                                <option value="">--select subject--</option>
                                <option value="eng">English</option>
                                <option value="math">Mathematics</option>
                                <option value="hel">Health Education</option>
                                <option value="home">Home Economics</option>
                                <option value="social">Social Studies</option>
                                <option value="agric">Agricultural Science</option>
                                <option value="art">Art</option>
                                <option value="rel">Religion</option>
                                <option value="comp">Computer Studies</option>
                                <option value="basic">Basic Science</option>
                                <option value="hau">Hausa</option>
                                <option value="civic">Civic Education</option>
                                <option value="phe">PHE</option>
                            </select>

                            <p class="red-text"><?php echo $sms;?></p> 
                            
                            <div class="right">
                            <input type="submit" name="submit" value="Start" class="btn green darken-1">
                            </div>
                    </div> 
                    
                   
                

                </div>
        
        </div>

</form>

<?php include("templates/footer.php");?>
</html>