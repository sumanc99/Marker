<?php
session_start();
//function page
include("config/db_connect.php");
//function page
include("config/function.php");
//use to logout if username and password are empty
include("config/page_logout.php");

//use to hold the subclasses eg primary1a - primary1e
$class_suffix = ['A', 'B', 'C', 'D', 'E'];
$user_name =  $user_newpassword = $sms ="";

$user_error = [];

if(isset($_POST['user_update'])){

    $user_name = validating_input($_POST['user_name']);
    $user_newpassword = validating_input($_POST['user_newpassword']);

    if(empty($user_name) || $user_name==' '){
       $user_error['user_name'] = "provide user";
    }else{
        if(!preg_match('/^[a-zA-Z\s]+$/', $user_name)){
            $user_error['user_name'] = 'Username Must Be Letters Only';
          }
    }

    if(empty($user_newpassword) || $user_newpassword==' '){
        $user_error['user_newpassword'] = "provide user newpassword";
    }else{
        if(!preg_match('@[0-9]@', $user_newpassword)){
            $user_error['user_newpassword']  = 'Password Must be Numbers';
        }else{
            $len = strlen($user_newpassword);
            if($len>4 || $len<4){
                $user_error['user_newpassword']  = 'Password Must Be 4-Digit long';
            }
        }
    }

    if(array_filter($user_error)){
      #code..;
    }else{
       $sql_username_checker = "SELECT username FROM users WHERE username ='$user_name'";
       $sql_username_checker_query = mysqli_query($conn, $sql_username_checker);
       if(mysqli_num_rows($sql_username_checker_query)>0){
           $user_update = "UPDATE users SET password='$user_newpassword' WHERE username ='$user_name'";
           $user_update_query = mysqli_query($conn, $user_update);
           if($user_update_query){
            $sms = '<span class=green-text>password is updated</span>';
            $user_name =  $user_newpassword ="";
           }else{
             $sms="not updated".mysqli_error($conn);
           }

       }else{
           $sms = "no such username";
       }
    }
}

$student_error = [];

if(isset($_POST['student_update'])){

    $student_name = validating_input($_POST['student_oldname']);
    $student_newname = validating_input($_POST['student_newname']);
    $class = validating_input($_POST['class']);

    if(empty($student_name) || $student_name==' '){
       $student_error['student_oldname'] = "provide student_oldname";
    }else{
        if(!preg_match('/^[a-zA-Z\s]+$/', $student_name)){
            $student_error['student_oldname']= 'student_oldname Must Be Letters Only';
          }
    }
    if(empty($student_newname) || $student_newname==' '){
        $student_error['student_newname'] = "provide student_newname";
     }else{
         if(!preg_match('/^[a-zA-Z\s]+$/', $student_name)){
            $student_error['student_newname']= 'student_newname Must Be Letters Only';
           }
     }

    if(empty($class)){
        $student_error['class'] = "select class";
    }else{  }

    if(array_filter($student_error)){
      #code..;
    }else{
       $sql_student_checker = "SELECT name FROM $class WHERE name ='$student_name'";
       $sql_student_checker_query = mysqli_query($conn, $sql_student_checker);

       if(mysqli_num_rows($sql_student_checker_query)>0){
           $user_update = "UPDATE  $class  SET name='$student_newname' WHERE name ='$student_name'";
           $user_update_query = mysqli_query($conn, $user_update);
           if($user_update_query){
            $sms = '<span class=green-text>Student_name is updated</span>';
           }else{
             $sms="not updated".mysqli_error($conn);
           }

       }else{
           $sms = "no such student in $class";
       }
    }
}
?>
<html lang="en">
<?php include("templates/header.php");?>

<?php if($_SESSION['option']=='user'):?>
  <section class="section">


        <div class="container row">
        <h4 class="center">update user</h4> 
        <p class="center red-text"><?php echo $sms;?></p> 
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" class="col l6 offset-l3" method="POST">
            
            <div class="container">

                <input type="text"  name="user_name" placeholder="type username" value='<?php echo $user_name?>'/>
                <p class="red-text"><?php echo $user_error['user_name'] ?? ' ';?></p> 
                <input type="text"  name="user_newpassword" placeholder="type user newpassword" value='<?php echo $user_newpassword?>'/>
                <p class="red-text"><?php echo $user_error['user_newpassword'] ?? '<b class=black-text>Password Must Be 4-Digit long</b>';?></p> 
                  

           
            <div class="right">
            <input type="submit" name="user_update" value="update" class="btn"> 
            <a href="update_option.php" class="btn" style="margin-left:20px;">Back</a>
            </div>
            </div>

            </form>
            
        </div>

  </section>
<?php else:?>
    <section class="section">


<div class="container row">
<h4 class="center">update student</h4> 
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" class="col l6 offset-l3" method="POST">
    
    <div class="container">

        <input type="text"  name="student_oldname" placeholder="type student oldname" />
        <p class="red-text"><?php echo $student_error['student_oldname'] ?? ' ';?></p> 
        <input type="text"  name="student_newname" placeholder="type student newname" />
        <p class="red-text"><?php echo $student_error['student_newname'] ?? ' ';?></p> 
        <select name="class" id="">
          <option value="">--Select SubClass--</option>
          <?php for($i=0; $i<count($class_suffix); $i++){?>
                <option value="<?php echo $_SESSION['option'].$class_suffix[$i];?>"><?php echo $_SESSION['option'].$class_suffix[$i];?></option>
              <?php }?>
        </select>
        <p class="red-text"><?php echo $student_error['class'] ?? ' ';?></p> 
            <p class="red-text"><?php echo $sms;?></p>  

  
    <div class="right">
    <input type="submit" name="student_update" value="update" class="btn"> 
    <a href="update_option.php" class="btn" style="margin-left:20px;">Back</a>
    </div>

    </div>

    </form>
    
</div>

</section>
<?php endif;?>



<?php include("templates/footer.php");?>
</html>