<?php session_start();


//empty fields && error holders
$sms=$sms2=$name=$score=""; $error= [];

//db connection
include("config/db_connect.php");
//use to logout if username and password are empty
include("config/page_logout.php");
//function page
include("config/function.php");
$subject = fullsubject_name($_SESSION['subject']);
$number_of_student_unmark = class_unmark_num($_SESSION['class_letter'], $_SESSION['subject']);

$students = stud_marking_list($_SESSION['class_letter'], $_SESSION['subject']);



if(isset($_POST['submit'])){

	$name = validating_input($_POST["studentList"]);
    $score1 = validating_input($_POST["score1"]);
    $score2 = validating_input($_POST["score2"]);
    $score3 = validating_input($_POST["score3"]);
    $score4 = validating_input($_POST["score4"]);

            
            if(empty($name)){
                $error["name"] = "<h6 class=red-text>Provide StudentName </h6>";
            }else{
                if(!preg_match('/^[a-zA-Z\s]+$/', $name) ){
                    $error["name"] = "<h6 class=red-text>StudentName Must be a letter</h6>";
                }
            }
           if (array_filter($error)) {
                    # code...
           }else{
                    
                  //query to check if student exist
                  $stud_sql = "SELECT name FROM {$_SESSION['class_letter']} WHERE  name='$name' ";
                  $query = mysqli_query($conn, $stud_sql);
                  if(mysqli_num_rows($query)>0){

                    //student_name validation on subject
                    // $stud_sql = "SELECT name FROM {$_SESSION['class_letter']} WHERE  name='$name' AND {$_SESSION['subject']} = '0' ";
                    // $query = mysqli_query($conn, $stud_sql);
                    $query = validate_studentname_bofore_making($_SESSION['class_letter'],$_SESSION['subject'], $name);
                        if(mysqli_num_rows($query)>0){
            
                            //student score update 
                                $query = score_update($_SESSION['class_letter'],$_SESSION['subject'],$score1,$score2,$score3, $score4,$name);
                                if($query){
                                $sms ="<h6 class=green-text>Pupil Marked</h6>";
                                $score="";

                                //list of student left for making that are in datalist
                                $students = stud_marking_list($_SESSION['class_letter'], $_SESSION['subject']);

                                //number of student left
                                $number_of_student_unmark = class_unmark_num($_SESSION['class_letter'], $_SESSION['subject']);
                                }else{
                                $sms ="Not updated".mysqli_error($conn);
                                }
                        }else{ $sms ="Student has already been mark";}

                  }else{
                    $sms ="Invalid StudentName";
                  }  
                }
        }

if(isset($_POST['dropsubject'])){
    //use to drop subject for user if he / she wish to
    $drop = drop($_SESSION['username']);
   if($drop){
    header("location:subjectpicker.php");
    unset($_SESSIO['subject']);
   }else{
       echo "problem".$drop.mysqli_error($conn);
   }
}

if(isset($_POST['donemaking'])){
// use to drop subject but if the whole class has been marked
    $number_of_student_unmark = class_unmark_num($_SESSION['class_letter'], $_SESSION['subject']);

    if($number_of_student_unmark > 0){
      $sms2 = "you are not done making";
    }else{
        
        $drop = drop($_SESSION['username']);
        if($drop){
            header("location:subjectpicker.php");
            unset($_SESSIO['subject']);
           }else{
               echo "problem".$drop.mysqli_error($conn);
           }
    }
   
}



?>
<html lang="en">
<?php include("templates/header.php");?>


      <div class="section">

        <div class="row">

            <div class="col l12  b">
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                    <!-- <h1>welcome</h1> -->
                    <h5>
                        <?php echo"Your In"." ".$_SESSION["class_letter"]." "."Marking"." ".$subject;?>
                      
                    </h5>
                    
                    <h6>
                       <a href="userpanel.php" class="btn red darken-2 white-text z-depth- right" style="margin-right:20px;">
                       Logout to userpanel
                       </a>

                       
                        <button name="dropsubject" class="btn green darken-1 white-text z-depth- " style="margin-left:20px;">
                            Drop Subject
                        </button>

                        <button name="donemaking" class="btn blue darken-1 white-text z-depth- " style="margin-left:20px;">
                            Done marking
                        </button> <h5 class="red-text center" style="margin-left:30px;"><?php echo $sms2;?></h5>

                        <!-- <h4><?php //echo $sms;?></h4> -->

                      
                    </h6>
            </form>
                   
            </div>
                   
        </div>
     </div>
     <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
        <div class="row">
                <div class="col l8 offset-l3">

                    <h5 class="selectClass"><?php echo "Pupil: "." ".$name;?></h5>

                    <div style="width:1000px">

                        <input list="studentList"  name="studentList" placeholder="Student Name"value="" style="width:300px"/>

                        <datalist id="studentList">
                           
                        <?php if($number_of_student_unmark>0): ?>

                             <?php foreach($students as $student):?>

                             <option value="<?php echo $student["name"];?>">

                             <?php endforeach?>

                            <?php else:?>
                                <option value="<?php echo "No Student left for marking";?>">
                            <?php endif;?>


                            </datalist>

                             <input type="number" name="score1" placeholder="CA1" value="" class="red-text"style="width:100px">
                             <input type="number" name="score2" placeholder="CA2" value="" class="red-text"style="width:100px">
                             <input type="number" name="score3" placeholder="CA3" value="" class="red-text"style="width:100px">
                             <input type="number" name="score4" placeholder="EXAM" value="" class="red-text"style="width:100px">

                            <p class="red-text"><?php echo $error["name"]?? "";?><?php echo $error["score"]?? "";?></p>  
                            <p class="red-text"><?php echo $sms;?></p>
                           
                            <div class="right" style="width:350px;">
                            <input type="submit" name="submit" value="Mark" class="btn green darken-1">
                            </div>
                    </div> 
                    
                   
                    <br>
                        <h4 class=''><?php echo "Student left for marking are : ".$number_of_student_unmark;?></h4>


                </div>
        
        </div>

        
    </form>
<?php include("templates/footer.php");?>
</html>