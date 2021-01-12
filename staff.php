<?php
session_start();
//db connection
include("config/db_connect.php");
//function page
include("config/function.php");
//use to logout if username and password are empty
include("config/page_logout.php");

if(isset($_POST['logout'])){
    logout( $_POST["logout"]);
}


//function use to give fullname of a user
$fullname = fullname($_SESSION['username']);
//func use to give firstletter of firstname & lastname
$shortname = namelogo($_SESSION['username']);

//it hold what the function return which is list of staffs
$staffs=staffs();
?>

<html lang="en">
<?php include("templates/header.php");?>

<div class="row">

 
  
  
  <div class="container ">
      <div class="col l10 offset-l1">
        <div class="section">
        <a href="adminpanel.php" class="btn" style="margin:20px;">Back</a>
         <ul class="collection with-header">
             <li class="collection-header"><h5>Staff list</h5></li>
             <?php  foreach($staffs as $staff){?>
              <?php echo "<li class=collection-item><h6>{$staff['firstname']} {$staff['lastname']}</h6></li>" ;?>
             <?php }?>
         </ul>
        </div>
      </div>
  </div>
  
</div>



<?php include("templates/footer.php");?>
</html>