<?php
//db connection
include('config/db_connect.php');

//functions page
include('config/function.php');

// error displayers && holders
$errors = [];

//empty holders
$fname=$lname=$user=$pass=$prove=$schoolname=$schoolmotor='';

if(isset($_POST['submit'])){

   $fname = validating_input($_POST['fname']);
   $lname = validating_input($_POST['lname']);
   $user = validating_input($_POST['username']);
   $pass = validating_input($_POST['password']);
   $gender = validating_input($_POST['gender']);
   $schoolname = validating_input($_POST['schoolname']);
   $schoolmotor = validating_input($_POST['schoolmotor']);

   //firstname check point
   if(empty($fname)){
       $errors['fname'] = '<span class=red-text>Provide Firstname</span>';
   }else{
     if(!preg_match('/^[a-zA-Z\s]+$/', $fname)){
         $errors['fname'] = '<span class=red-text>Firstname Must Be Letters Only</span>';
     }
   }
   
   // lastname checkpoint
   if(empty($lname) || $lname==''){
       $errors['lname'] = '<span class=red-text>Provide Lastname';
   }else{
       if(!preg_match('/^[a-zA-Z\s]+$/', $lname)){
           $errors['lname'] = '<span class=red-text>Lastname Must Be Letters Only</span>';
       }
   }

   //Username checkpoint
   if(empty($user) || $user==''){
       $errors['username'] = '<span class=red-text>Provide Username</span>';
   }else{
       if(!preg_match('/^[a-zA-Z\s]+$/', $user)){
         $errors['username'] = '<span class=red-text>Username Must Be Letters Only</span>';
       }
   }

   //password checkpoint
   if(empty($pass) || $pass==''){
       $errors['password'] = '<span class=red-text>Provide Password</span>';
   }else{
       if(!preg_match('@[0-9]@', $pass)){
           $errors['password'] = '<span class=red-text>Password Must be Numbers</span>';
       }else{
           $len = strlen($pass);
           $prove = $_POST['copassword'];
           if($len>4){
               $errors['password'] = '<span class=red-text>Password Must Be 4-Digit long</span>';
           }else{
               if($pass !== $prove){
                   $errors['prove'] ='<span class=red-text>Confirm-Password Must Be Equal to Password</span>';
               }
           }
       }
   }
   
   //gender checkpoint
    //schoolname checkpoint
    if(empty($gender) || $gender=='--select gender--'){
        $errors['gender'] = '<span class=red-text>Select Gender </span>';
      }

   //schoolname checkpoint
   if(empty($schoolname) || $schoolname==''){
     $errors['schoolname'] = '<span class=red-text>Provide Schoolname </span>';
   }else{
       if(!preg_match('/^[a-zA-Z\s]+$/', $schoolname)){
           $errors['schoolname'] = '<span class=red-text>Schoolname Must Be Letters </span>';
       }
   }

   //schoolmotor checkpoint
   if(empty($schoolmotor) || $schoolmotor==''){
    $errors['schoolmotor'] = '<span class=red-text>Provide Schoolmotor </span>';
  }else{
      if(!preg_match('/^[a-zA-Z\s]+$/', $schoolmotor)){
          $errors['schoolmotor'] = '<span class=red-text>Schoolmotor Must Be Letters </span>';
      }
  }

  if(array_filter($errors)){
     #return
  }else{
     $sql_username_checker = "SELECT * FROM admin WHERE username='$user'";
     $query = mysqli_query($conn, $sql_username_checker);
     if(mysqli_num_rows($query)>0){
        $errors['username'] = '<span class=red-text>username already exist</span>';
        $helper['username'] ="";
     }
     else{
        $sql_admin_reg = "INSERT INTO admin(firstname, lastname, username, password, schoolname, schoolmotor, gender) VALUE('$fname', '$lname', '$user', '$pass', '$schoolname', '$schoolmotor', '$gender')";
        if(mysqli_query($conn, $sql_admin_reg)){
         header('location:index.php');
        }
        else{
            echo"connection".mysqli_error($conn);
        }
     }
  
  }
 
}//end of post



?>
<html lang="en">
<?php include("templates/header.php");?>

<div class="container center">


<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">

<div class="row">
     <section class="border ">
     <div class="col s12 l6 ">
     <h4> Admin Registration Form</h4>
        <div class="row">

             <div class="input-field col s12 l10">
                <input type="text" name='fname' id='fname' value='<?php echo $fname;?>'>
                 <div class="grey-text text-darken-2"><?php echo $errors['fname'] ?? "Should Required letters and White space";?></div>
                <label for="fname" >FirstName</label>
             </div>

             <div class="input-field col s12 l10">
                <input type="text" name='lname' id="lname" value='<?php echo $lname;?>'>
                 <div class="grey-text text-darken-2"><?php echo $errors['lname'] ?? "Should Required letters and White space";?></div>
                <label for="lname">Lastname</label>
             </div>

             <div class="input-field col s12 l6">
                <input type="text" name='username' id="username" value="<?php echo $user;?>">
                  <div class="grey-text text-darken-2"><?php echo $errors['username'] ?? "Should Required letters only";?></div>
                <label for="username">Username</label>
             </div>

             <div class="input-field col s12 l6">
                <input type="password" name='password' id="password" value='<?php echo $pass;?>'>
                 <div class="grey-text text-darken-2"><?php echo $errors['password'] ?? "4-Digit Password";?></div>
                <label for="password">Password</label>
             </div>

             <div class="input-field col s12 l6">
                <input type="password" name='copassword' id="copassword" value='<?php echo $prove;?>'>
                  <div class="grey-text text-darken-2"><?php echo $errors['prove'] ?? "4-Digit Required for confirmation";?></div>
                <label for="copassword">Confirm-password</label>
             </div>

             <div class="input-field col s12 l6">
               <select name="gender" id="gender">
                   <option value="" >--select gender--</option>
                   <option value="male">Male</option>
                   <option value="female">Female</option>
               </select>
                <label for="">Gender</label>
                 <div class="grey-text text-darken-2"><?php echo $errors['gender'] ?? "";?></div>
             </div>

             <div class="input-field col s12 l12">
                <input type="text" name='schoolname' id="schoolname" value="<?php echo $schoolname?>">
                  <div class="grey-text text-darken-2"><?php echo $errors['schoolname'] ?? "Should Required letters only";?></div>
                <label for="schoolname">Schoolname</label>
             </div>

             <div class="input-field col s12 l12">
                <input type="text" name='schoolmotor' id="schoolmotor"  value="<?php echo $schoolmotor?>">
                  <div class="grey-text text-darken-2"><?php echo $errors['schoolmotor'] ?? "Should Required letters only";?></div>
                <label for="schoolmotor">schoolmotor</label>
             </div>

        </div> 
        <input type="submit" name="submit" value="REG_ADMIN" class="btn blue darken-2">
     </div>
    
     <div class="col l6 hide-on-med-and-down right-align ">
       
     <div class='infor'>
      
     </div>
        
     </div>
     
     </section>
    
</div>

</form>
</div>

<?php include("templates/footer.php");?>    
</body>
</html>