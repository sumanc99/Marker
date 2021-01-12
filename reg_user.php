<?php
session_start();
//db connection
include("config/db_connect.php");
//function page
include("config/function.php");
//use to logout if username and password are empty
include("config/page_logout.php");

//empty error displayers && holders
$errors = [];

//empty holders
$fname=$lname=$user=$pass=$prove=$schoolname=$schoolmotor='';

// logout function
if(isset($_POST['logout'])){
    logout( $_POST["logout"]);
}
//function use to give fullname of a user
$fullname = fullname($_SESSION['username']);
//func use to give firstletter of firstname & lastname
$shortname = namelogo($_SESSION['username']);


if(isset($_POST['submit'])){

    $fname = validating_input($_POST['fname']);
    $lname = validating_input($_POST['lname']);
    $user = validating_input($_POST['username']);
    $pass = validating_input($_POST['password']);
    $gender = validating_input($_POST['gender']);

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
        if($len>4 || $len<4){
            $errors['password'] = '<span class=red-text>Password Must Be 4-Digit long</span>';
        }else{
            if($pass !== $prove){
                $errors['prove'] ='<span class=red-text>Confirm-Password Must Be Equal to Password</span>';
            }
        }
    }
}

//gender checkpoint
 if(empty($gender) || $gender=='--select gender--'){
     $errors['gender'] = '<span class=red-text>Select Gender </span>';
   }


   if(array_filter($errors)){
    #return
 }else{
    $sql_username_checker = "SELECT * FROM users WHERE username='$user'";
    $query = mysqli_query($conn, $sql_username_checker);
    if(mysqli_num_rows($query)>0){
       $errors['username'] = '<span class=red-text>username already exist</span>';
    //    $helper['username'] ="";
    }
    else{
       $sql_admin_reg = "INSERT INTO users(firstname, lastname, username, password,gender) VALUE('$fname', '$lname', '$user', '$pass', '$gender')";
       if(mysqli_query($conn, $sql_admin_reg)){
        header('location:index.php');
       }
       else{
           echo"connection".mysqli_error($conn);
       }
    }
 
 }




} //end of if


?>

<html lang="en">

<?php include("templates/header.php");?>

<div class="row">

 <div class=" col l2 hide-on-med-and-down">
    <div class="mylinks">

            <div class="center">
            
            <div class="btn-floating btn-large indigo darken-4 z-depth-0  logoUser">
              <?php echo $shortname;?>
            </div>
            <h6 class="fullname"><?php echo $fullname?></h6>
            
            </div>
          
      
	 	<ul class="ul">
	 		<li><a href="adminpanel.php">AdminPanel</a></li>
	 		<li><a href="#">Session / Term</a></li>
	 		<li><a href="#">Activate / Remove</a></li>
	 		<li><a href="#">Block User</a></li>
         </ul>
         <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
         <button class="btn red lighten-2 z-depth-0" name="logout">Logout</button>
         </form>
	 </div>
     
	 
     
  </div>

  <div class="col s12 l6 offset-l1">

  <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
     <h4> User Registration Form</h4>
        <div class="row">

        <div class="input-field col s12 l9">
                <input type="text" name='fname' id='fname' value='<?php echo $fname;?>'>
                 <div class="grey-text text-darken-2"><?php echo $errors['fname'] ?? "Should Required letters and White space";?></div>
                <label for="fname" >FirstName</label>
             </div>

             <div class="input-field col s12 l9">
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

           
            
        </div> 
         
        <div class="input-field right">
             <button name="submit"  class="btn blue darken-2 z-depth-0 waves-effect waves-light">REG_USER</button>
             <a href="adminpanel.php" class="btn" style="margin-left:20px;">back</a>
            </div>
       
      </form>

     </div>
    




</div>

<?php include("templates/footer.php")?>

</html>