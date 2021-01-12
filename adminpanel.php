<?php
session_start();
//db connection
include("config/db_connect.php");
//function page
include("config/function.php");

//use to logout if username and password are empty
include("config/page_logout.php");

if(isset($_POST['logout2'])){
    logout( $_POST["logout2"]);
}


//function use to give fullname of a user
$fullname = fullname($_SESSION['username']);

//func use to give firstletter of firstname & lastname
$shortname = namelogo($_SESSION['username']);

// $classes = ["Primary1", "Primary2", "Primary3", "Primary4", "Primary5", "Primary6"];

// the function check if is not admin then logout
// check_if_not_admin_then_out($_SESSION['username']);

// if(isset($_POST['submit'])){

//   $_SESSION['class'] = $_POST['class'];

//   if(empty($_SESSION['class'])){
    
//   }else{
//     header("location:reg_student.php");
//   }
// }


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
	 		<li><a href="#">Session/Term</a></li>
	 		<li><a href="#">Remove User</a></li>
	 		<li><a href="#">Block User</a></li>
         </ul>
         <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
         <button class="btn red lighten-2 z-depth-0" name="logout2">Logout</button>
         </form>
	 </div>
     
	 
     
  </div>
  
  <div class="container ">
   <div class="col s12  l10 offset-l1 box">
 
   <div class="row">
       
   <div class="col s12 m6 l4">
         
         <a href="reg_user.php" class=' grey-text'>
         <div class="card">
             <div class="card-content">
                 <p class='center'><i class="fa fa-user fa-5x grey-text text-darken-3"></i></p>
                 <p class="flow-text center">Register User</p>
             </div>
         </div>
       </div>
         </a>
         

         <a href="reg_class.php" class=' grey-text'>
       <div class="col s12 m6 l4">
         <div class="card">
             <div class="card-content">
                 <p class='center'><i class="fa fa-user fa-5x grey-text text-darken-3"></i></p>
                 <p class="flow-text center">Register Student</p>
             </div>
         </div>
       </div>
        </a>

       <a href="report_card_class_picker.php" class='brand-more grey-text'>
       <div class="col s12 m6 l4">
         <div class="card">
             <div class="card-content">
                 <p class='center'><i class="fa fa-address-book fa-5x grey-text text-darken-3"></i></p>
                 <p class="flow-text center">Report card</p>
             </div>
         </div>
       </div>
      </a>
       
      <a href="update_option.php" class=' grey-text'>
       <div class="col s12 m6 l4">
         <div class="card">
             <div class="card-content">
                 <p class='center'><i class="fa  fa-edit fa-5x grey-text text-darken-3"></i></p>
                 <p class="flow-text center">Update</p>
             </div>
         </div>
       </div>  
       </a>

       <a href="staff.php" class=' grey-text'>
       <div class="col s12 m6 l4">
         <div class="card">
             <div class="card-content">
                 <p class='center'><i class="fa fa-clipboard fa-5x grey-text text-darken-3"></i></p>
                 <p class="flow-text center">Staff</p>
             </div>
         </div>
       </div>
       </a>

       <a href="students.php" class=' grey-text'>
       <div class="col s12 m6 l4">
         <div class="card">
             <div class="card-content">
                 <p class='center'><i class="fa fa-users fa-5x grey-text text-darken-3"></i></p>
                 <p class="flow-text center">Students</p>
             </div>
         </div>
       </div>
        </a>

        <a href="search_class_picker.php" class=' grey-text'>
        <div class="col s12 m6 l4">
         <div class="card">
             <div class="card-content">
                 <p class='center'><i class="fa fa-address-book fa-5x grey-text text-darken-3"></i></p>
                 <p class="flow-text center">Search Student</p>
             </div>
         </div>
       </div>
       </a>

       <a href="result_sheet_class_picker.php" class=' grey-text'>
       <div class="col s12 m6 l4">
         <div class="card">
             <div class="card-content">
             <p class='center'><i class="fa fa-clipboard fa-5x grey-text text-darken-3"></i></p>
                 <p class="flow-text center">result sheet</p>
             </div>
         </div>
      </div>
      </a>

      <a href="#" class=' grey-text'> 
      <div class="col s12 m6 l4">
         <div class="card">
             <div class="card-content">
                 <p class='center'><i class="fa fa-address-book fa-5x red-text "></i></p>
                 <p class="flow-text center red-text">Delete Student</p>
             </div>
         </div>
       </div>
       </a>
       

        
     </div>
        
 </div>

  </div>
 
  
</div>



<?php include("templates/footer.php");?>
</html>
