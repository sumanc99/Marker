<?php 
session_start();
//db connection
include("config/db_connect.php");

//functions page
include('config/function.php');

//check for admin
$sql_admin = "SELECT * FROM admin";
$result_admin = mysqli_query($conn, $sql_admin);

//assco to store error in the form
$sms=["username"=>"", "password"=>""];

//emptying the form field vars
$_SESSION['username']=$_SESSION['pass'] ='';

//not valid admin or user empty var
$prob ='';

if(isset($_POST['submit'])){

   $_SESSION['username'] = validating_input($_POST['username']);
   $_SESSION['pass'] = validating_input($_POST['password']);

       //username check point
       if(empty($_SESSION['username']) ){
           $sms['username'] = "Provide Username";
       }else{
           if(!preg_match('/^[a-zA-Z\s]+$/', $_SESSION['username'])){
               $sms['username'] = 'Username Must Be a letter';
           }
       }
       //password checkpoint
       if(empty($_SESSION['pass']) ){
           $sms['password'] = 'Provide Password';
       }else{
           if(!preg_match('@[0-9]@', $_SESSION['pass'])){
               $sms['password'] = 'Password Must Be a Number';
           }
       }
       if(array_filter($sms)){
        #code...
      }else{
           //Admin validator
           $admin_validator = "SELECT username, password FROM admin WHERE username='{$_SESSION['username']}' AND password='{$_SESSION['pass']}'";
           $admin_result = mysqli_query($conn, $admin_validator);
           if(mysqli_num_rows($admin_result)>0){
            header("location:adminpanel.php");
           }else{
               //Normal user validator
               $user_validator= "SELECT * FROM users WHERE username='{$_SESSION['username']}' AND password='{$_SESSION['pass']}'";
               $user_result = mysqli_query($conn, $user_validator);
               if(mysqli_num_rows($user_result)>0){
                   header('location:userpanel.php');
               }else{
                   $prob = "No such user Exists". mysqli_error($conn);
               }
           }
        
      }



}//end of post

?>
<html lang="en">
<?php include('templates/header.php');?>


 <div class="container" id='login-container'>

   <?php if(mysqli_num_rows($result_admin)<1):?>
     <div class="grey lighten-2 center section z-depth-2">
         <h4><a href="admin_reg.php" class="btn-large blue darken-3 z-depth-0">
             Provide Admin<i class="material-icons left">person</i>
            </a></h4>
     </div>
   <?php else:?>
     
     <div class="row">
     <div class="col l5 hide-on-med-and-down">
       <img src="img/logo.png" alt="" class="icon-index">
     </div>

     <div class="col s12 l5 m10 offset-7">

     <form action="<?php echo $_SERVER['PHP_SELF'];?>" method='POST'>
     <?php echo "<center class='red-text'> $prob</center>";?>
     <div class="input-field blue-text">
        <i class="material-icons prefix">person</i>
        <input type="text" name='username' id="UserName" value="<?php echo htmlspecialchars($_SESSION['username']);?>">
        <div class='red-text center'><?php echo $sms['username'];?></div>
        <label for='UserName'>Username</label>
      
     </div>

    <div class="input-field blue-text">
        <i class="material-icons prefix">password</i>
        <input type="password" name='password' id="password" value="<?php echo htmlspecialchars($_SESSION['pass']);?>">
        <div class='red-text center'><?php echo $sms['password'];?></div>
        <label for='password'>Password</label>
       
    </div>

    <div class="input-field">
        <input type="submit" name="submit" value="Login" class="btn right blue darken-2 z-depth-0">
    </div>

    </form>
    
     </div>


</div>
<?php endif?>
 </div>
<?php include('templates/footer.php');?>
</html>